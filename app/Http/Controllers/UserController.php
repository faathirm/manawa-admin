<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = Customer::orderBy('id', 'desc')->get();
        return view('akun.user',['user'=>$user]);
    }

    public function json()
    {
        return datatables(Customer::orderBy('id', 'desc'))
            ->addColumn('livestock_amount', function(Customer $customer){
                $livestock = \App\Livestock::where('id_user',$customer->id)->whereNotNull('id_journal_purchase')->get();
                return count($livestock);
            })
            ->toJson();
    }

    public function detail()
    {
        return view('akun.user_detail');
    }
}
