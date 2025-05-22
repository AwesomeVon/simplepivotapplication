<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Connection;
use Validator;
use Response;
use Storage;
use DB;
use Auth;

class SalesPerson extends Model
{
    

    public static function getSalesPerson()
    {
        $a = DB::table('sales_person')
            ->select(
                '*'
            )
            ->get();
        return $a;
    }

    public static function store($x)
    {
		$y  = DB::table('sales_person')
            ->insert(
                array(
                    'name'  => $x['fullname'],
                )
            );

        $id = DB::getPdo()->lastInsertId();
        if($y == 1 || $y == true){

            foreach ($x['item_name'] as $key => $value) {
                $b = DB::table('item_sold')
                            ->insert(
                                array(
                                    'sales_person_id' => $id,
                                    'item_name'       => $x['item_name'][$key],
                                    'amount'          => $x['amount'][$key],
                                )
                            );
            }

        }
        return $y;
    }

    public static function fetch($x)
    {
        $a  = DB::table('sales_person')
            ->where('id', $x['id'])
            ->get()
            ->map(function($item){          
                $item->{'items_sold'} = DB::table('item_sold')
                ->where('item_sold.sales_person_id',$item->id)
                ->select('*')
                ->get(); 
            return $item;
            });
        return $a;
    }

    public static function updateSalesPerson($x)
    {
       
         $a  = DB::table('sales_person')
            ->where('id', $x['id'])
            ->update(
                array(
                    'name'   => $x['u_fullname'],
                )
            );

            $excludeIds = [];

            foreach ($x['item_sold_id'] as $key => $value) {

          
                  if($x['item_sold_id'][$key] == '' || $x['item_sold_id'][$key] == null ){

                        $c = DB::table('item_sold')
                                ->insert(
                                    array(
                                        'sales_person_id'  => $x['id'],
                                        'item_name'        => $x['u_item_name'][$key],
                                        'amount'           => $x['u_amount'][$key],
                                    )
                                );

                    }
                   else{
                        $b = DB::table('item_sold')
                                ->where('item_sold.id', $x['item_sold_id'][$key])
                                ->update(
                                    array(
                                        'item_name'     => $x['u_item_name'][$key],
                                        'amount'        => $x['u_amount'][$key],
                                    )
                                );

                        $excludeIds[] = $x['item_sold_id'][$key];

                    }

            $softdeleteitems = DB::table('item_sold')
                    ->where('item_sold.id', $x['id'])
                    ->whereNotIn('item_sold.id', $excludeIds)
                    ->get();

            foreach ($softdeleteitems as $item) {
       
                            $dc = $item->id;

                        DB::table('item_sold')
                            ->where('id', $dc)
                            ->delete();
                }

    

             }

   

        return $a;
    }


    public static function deleteSalesPerson($x)
    {
        $y  = DB::table('sales_person')
            ->where('id',$x['id'])
            ->delete();

        $b = DB::table('item_sold')
            ->where('sales_person_id',$x['id'])
            ->delete();

        
        return $y;
    }
}
