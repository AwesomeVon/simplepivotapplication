<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;


class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(
            'maintenance/accounts/index'
        );
    }

    public static function preLoader()
    {
        $w = Account::preLoader(); 
        return \Response::json($w);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $x)
    {

        $w = Account::store($x); 
        return \Response::json($w);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $x)
    {
        $w = Account::show($x); 
        return \Response::json($w);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $x)
    {
        $w = Account::updateStatus($x); 
        return \Response::json($w);
    }

    public function fetch(Request $x)
    {
        $w = Account::fetch($x); 
        return \Response::json($w);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $x)
    {
    
        $w = Account::updateUser($x); 
        return \Response::json($w);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }


        public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}
