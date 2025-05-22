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

class Account extends Model
{
    use HasFactory;
    
    public static function show($x)
    {
        $a = DB::table('employeefile')
            
            ->select(
                '*'
            )
            ->get();
        return $a;
    }

    public static function preLoader()
    {
        $arr = [];
        $a = DB::table('employeefile')
            ->select(
                DB::raw('count(employeefile.id) as number'),
            )
            ->groupBy('employeefile.isactive')
            ->get();
        foreach ($a as $key => $value) {
            array_push($arr, $value->number);
        }
        return $a;
    }

    public static function updateStatus($x)
    {
        $a = DB::table('employeefile')
            ->where('id', $x['userId'])
            ->delete();

    
        return $a;
    }

    public static function store($x)
    {

        $password   = Hash::make('123');
        $nameParts = explode(' ', trim($x['fullname']));
        if (count($nameParts) >= 2) {
            $firstLetter = strtolower(substr($nameParts[0], 0, 1));
            $firstName = strtolower($nameParts[0]); 
            $lastName = strtolower($nameParts[1]);
            $usename = $firstName . $lastName;
            $email = $firstName . $lastName . '@gmail.com';
        } else {
           
            $firstLetter = strtolower(substr($nameParts[0], 0, 1));
            $name = strtolower($nameParts[0]); 
            $usename = $firstName;
            $email = $firstName . '@gmail.com';
        }

		$a = DB::table('employeefile')
			->insert(
				array(
					'fullname' 			=> $x['fullname'],
					'address' 		    => $x['address'],
					'birthdate' 		=> $x['birthdate'],
                    'age'               => $x['age'],
					'gender'            => $x['gender'],
				    'civilstat' 	    => $x['civil_status'],
				    'contactnum' 	    => $x['contact_number'],
					'salary'        	=> $x['salary'],
                    'isactive'          => $x['status'],
				)
			);
	   

        $a = DB::table('users')
            ->insert(
                array(
                    'email'                 => $email,
                    'password'              => $password,
                    'username'              => $usename,
                    'fullname'              => $x['fullname'],
                    'created_at'            => date("Y-m-d H:i:s"),
                )
            );
		return $a;
    }

    public static function fetch($x)
    {
        $a = DB::table('employeefile')
            ->where('id', $x['userId'])
            ->get();
        return $a;
    }

    public static function updateUser($x)
    {
            $a = DB::table('employeefile')
                ->where('id', $x['id'])
                ->update(
                    array(
                        'fullname'          => $x['u_fullname'],
                        'address'           => $x['u_address'],
                        'birthdate'         => $x['u_birthdate'],
                        'age'               => $x['u_age'],
                        'gender'            => $x['u_gender'],
                        'civilstat'         => $x['u_civil_status'],
                        'contactnum'        => $x['u_contact_number'],
                        'salary'            => $x['u_salary'],
                        'isactive'          => $x['u_status'],
                    )
                );
       
        return $a;
    }
}
