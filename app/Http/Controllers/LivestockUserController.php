<?php

namespace App\Http\Controllers;

use App\Livestock;
use App\LivestockReport;
use Illuminate\Http\Request;

class LivestockUserController extends Controller
{
    public function index()
    {
        $livestock = Livestock::Where('born_at','!=',null)->orderBy('created_at', 'desc')->get();
        return view('livestock.user',['livestock'=>$livestock]);
    }

    public function detail($id)
    {
        $livestock = Livestock::find($id);
        return view('livestock.user_livestock_detail',['livestock'=>$livestock]);
    }

    public function test()
    {
        $l = Livestock::find(158);
        $time = new \DateTime(substr($l->born_at, 0,10));
        $now = new \DateTime(Date("Y-m-d"));
        $interval = $now->diff($time);
        dd($interval->m);
    }

    public function add(Request $request)
    {
        $l = new LivestockReport();
        $l->id_livestock = $request->id_livestock;
        $l->berat = $request->berat;
        $l->kesehatan = $request->kesehatan;
        $l->report_desc = $request->report_desc;
        $file = $request->file('photo_url');
        $file->move("image/report/", date("ymdhis").".".$file->getClientOriginalExtension());
        $l->photo_url = url('/')."/image/report/".date("ymdhis").".".$file->getClientOriginalExtension();
        $l->thumb_url = null;
        $l->reported_by = 1;
        $l->created_at = Date("Y-m-d H:i:s");
        $l->save();

        return redirect()->route('live.user.detail',$request->id_livestock);
    }
}
