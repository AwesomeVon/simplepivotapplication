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

class Item extends Model
{

	public static function getAllItemName()
    {
        return DB::table('item_sold')
            ->select('item_name')
            ->distinct()
            ->get();
    }

    public static function getallItemSold()
    {
        $a = DB::table('item_sold')
            ->select('*')
            ->get();
        return $a;
    }
}