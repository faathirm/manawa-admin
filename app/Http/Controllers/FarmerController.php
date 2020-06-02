<?php

namespace App\Http\Controllers;

use App\Farm;
use App\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index()
    {
        $farmer = Farmer::orderBy('id', 'desc')->get();
        return view('akun.farmer', ['farmer'=>$farmer]);
    }

    public function new(Request $request)
    {
        $farm = new Farm();
        $farm->name = $request->farm_name;
        $farm->address = $request->address;
        $farm->city = $request->city;
        $farm->phone_num = $request->phone_num;
        $farm->email = $request->email;
        $farm->created_at = Date('Y-m-d H:i:s');
        $farm->save();

        $farmer = new Farmer();
        $farmer->id_farm = $farm->id;
        $farmer->email = $request->email;
        $farmer->name = $request->name;
        $farmer->phone_num = $request->phone_num;
        $farmer->save();

        return redirect()->route('acc.farmer');
    }

    public function update(Request $request)
    {
        $farmer = Farmer::where('id',$request->id)->first();

        $farm = Farm::find($farmer->id_farm);
        $farm->name = $request->farm_name;
        $farm->address = $request->address;
        $farm->city = $request->city;
        $farm->phone_num = $request->phone;
        $farm->email = $request->email;
        $farm->save();

        $farmer = Farmer::find($request->id);
        $farmer->email = $request->email;
        $farmer->name = $request->name;
        $farmer->phone_num = $request->phone;
        $farmer->save();

        return redirect()->route('acc.farmer');
    }

    public function delete(Request $request)
    {
        Farmer::destroy(($request->id));
        Farm::destroy(($request->id_farm));
        return $request->id;
    }
}
