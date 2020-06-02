<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Transaction;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;

class TransactionController extends Controller
{
    public function index()
    {
        $transaction = Transaction::orderBy('id','desc')->get();
        return view('transaksi.view', ['transaction'=>$transaction]);
    }

    public function json()
    {
        return datatables(Transaction::query())
            ->editColumn('total_price', 'Rp. {{format_uang($total_price)}}')
            ->editColumn('id_user', function(Transaction $transaction){
                $user = Customer::where('id',$transaction->id_user)->first();
                return ucwords($user->name);
            })
            ->toJson();
    }

    public function update(Request $request)
    {
        $transaction = Transaction::find($request->id);
        $transaction->status = $request->status;
        $transaction->total_price = preg_replace('/\D/', '', $request->total_price);
        $transaction->save();

        return redirect()->route('trc.view');
    }

    public function delete(Request $request)
    {
        Transaction::destroy($request->id);
        return $request->id;
    }
}
