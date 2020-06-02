<?php

namespace App\Http\Controllers;

use App\Confirmation;
use App\Customer;
use App\CustomerAccount;
use App\Journal;
use App\Transaction;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index()
    {
        $confirmation = Confirmation::orderBy('id','desc')->get();
        return view('transaksi.confirmation', ['confirmation'=>$confirmation]);
    }

    public function update(Request $request)
    {
        $conf = Confirmation::find($request->id);
        if($request->status == "verified"){
            $conf->verified_by = 1;
            $conf->verified_at = Date('Y-m-d H:i:s');
        }else if($request->status == "denied"){
            $conf->denied_by = 1;
            $conf->denied_at = Date('Y-m-d H:i:s');
        }else{
            $conf->verified_by = null;
            $conf->denied_by = null;
            $conf->verified_at = null;
            $conf->denied_at = null;
        }
        $conf->save();
        return redirect()->route('trc.confirmation');
    }

    public function json()
    {
        return datatables(Confirmation::orderBy('created_at', 'desc'))
            ->addColumn('status', function (Confirmation $confirmation){
                if($confirmation->denied_by != null){
                    return 'Denied';
                }else if($confirmation->verified_by != null){
                    return 'Verified';
                }else{
                    return 'Unverified';
                }
            })
            ->editColumn('id', function (Confirmation $confirmation){
                $transaction = Transaction::where('id', $confirmation->id_transaction)->first();
                return $transaction->id;
            })
            ->editColumn('id_user_acc', function(Confirmation $confirmation){
                $transaction = Transaction::where('id', $confirmation->id_transaction)->first();
                $user = Customer::where('id', $transaction->id_user)->first();
                return ucwords($user->name);
            })
            ->addColumn('message', function (Confirmation $confirmation){
                if($confirmation->id_journal_topup != null){
                    $journal = Journal::where('id', $confirmation->id_journal_topup)->first();
                    return ucwords($journal->journal_desc);
                }else{
                    return "";
                }

            })
            ->toJson();
    }

    public function delete(Request $request)
    {
        Confirmation::destroy($request->id);
        return redirect()->route('trc.confirmation');
    }
}
