<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Models\SalesPerson;
use App\Models\Item;
use Illuminate\Support\Facades\Session;
use Auth;


class SalesPersonController extends Controller
{

    public function index()
    {
        $item_list          = Item::getAllItemName();
        $sales_person_list  = SalesPerson::getSalesPerson();
        $item_sold          = Item::getallItemSold();
        $sales_data = [];
        foreach ($item_sold as $sale) {
            $sales_data[$sale->sales_person_id][$sale->item_name] = $sale->amount;
        }

        return view('sales/index', compact('item_list', 'sales_person_list', 'sales_data'));
    }

    public static function preLoader()
    {
        $w = Account::preLoader(); 
        return \Response::json($w);
    }


    public function store(Request $x)
    {

        $w = SalesPerson::store($x); 
        return \Response::json($w);
    }


    public function fetch(Request $x)
    {
        $w = SalesPerson::fetch($x); 
        return \Response::json($w);
    }

 
    public function updateSalesPerson(Request $x)
    {
    
        $w = SalesPerson::updateSalesPerson($x); 
        return \Response::json($w);
    }

   
    public function destroy(Account $account)
    {
        
    }

     public function deleteSalesPerson(Request $x)
    {
        $y = SalesPerson::deleteSalesPerson($x);
        return \Response::json($y);
    }

}
