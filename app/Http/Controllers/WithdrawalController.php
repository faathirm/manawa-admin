<?php

namespace App\Http\Controllers;

use App\Withdraw;
use App\WithdrawStatus;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function index()
    {
        $withdraw = Withdraw::orderBy('created_at', 'desc')->get();
        return view('transaksi.withdrawal',['withdraw'=>$withdraw]);
    }

    public function new(Request $request)
    {

        $s = new WithdrawStatus();
        $s->id_withdraw = $request->id;
        $s->id_admin = 1;
        $s->status = $request->status;
        if($request->status == "Selesai"){
            $file = $request->file('photo');
            $file->move("image/withdraw/", date("ymdhis").".".$file->getClientOriginalExtension());
            $s->photo_url = url('/')."/image/withdraw/".date("ymdhis").".".$file->getClientOriginalExtension();
        }else{
            $s->photo_url = null;
        }
        $s->created_at = date('Y-m-d H:i:s');
        $s->save();

        return redirect()->route('trc.withdrawal');
    }

    public function delete(Request $request)
    {
        $deleteStatus = WithdrawStatus::where('id_withdraw',$request->id)->delete();
        Withdraw::destroy($request->id);

        return redirect()->route('trc.withdrawal');
    }
}
