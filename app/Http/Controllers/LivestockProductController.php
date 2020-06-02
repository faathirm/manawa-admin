<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Farm;
use App\FarmVariety;
use App\Variety;
use Illuminate\Http\Request;

class LivestockProductController extends Controller
{
    public function index()
    {
        $animal = Animal::all();
        $variety = Variety::all();
        $farm_variety = FarmVariety::all();
        $farm = Farm::all();
        return view('livestock.product',['animal'=>$animal,'variety'=>$variety,'farm_variety'=>$farm_variety,'farm'=>$farm]);
    }

    public function animal_add(Request $request)
    {
        $ani = new Animal();
        $ani->name = $request->name;
        $ani->created_at = Date("Y-m-d H:i:s");
        $ani->save();

        return redirect()->route('live.product');
    }

    public function animal_update(Request $request)
    {
        $ani = Animal::find($request->id);
        $ani->name = $request->name;
        $ani->save();

        return redirect()->route('live.product');
    }

    public function animal_delete(Request $request)
    {
        Animal::destroy($request->id);
        return $request->id;
    }

    public function variety_add(Request $request)
    {
        $v = new Variety();
        $v->id_animal = $request->animal;
        $v->name = $request->name;
        $v->created_at = Date("Y-m-d H:i:s");
        $v->save();

        return redirect()->route('live.product');
    }

    public function variety_update(Request $request)
    {
        $v = Variety::find($request->id);
        $v->id_animal = $request->id_animal;
        $v->name = $request->name;
        $v->save();

        return redirect()->route('live.product');
    }

    public function variety_delete(Request $request)
    {
        Variety::destroy($request->id);
        return $request->id;
    }

    public function new(Request $request)
    {
        $fv = new FarmVariety();
        $fv->id_farm = $request->id_farm;
        $fv->id_variety = $request->id_variety;
        $fv->sales_type = $request->sales_type;
        $fv->price_base = preg_replace('/\D/', '', $request->price_base);
        $fv->price_monthly_incr = preg_replace('/\D/', '', $request->price_monthly_incr);
        $fv->price_insurance = preg_replace('/\D/', '', $request->price_insurance);
        $fv->price_est_sell = preg_replace('/\D/', '', $request->price_est_sell);
        $fv->variety_desc = $request->variety_desc;

        $file = $request->file('photo_url');
        $file->move("image/product/", date("ymdhis").".".$file->getClientOriginalExtension());
        $fv->photo_url = url('/')."/image/product/".date("ymdhis").".".$file->getClientOriginalExtension();
        $fv->thumbnail_url = url('/')."/image/product/".date("ymdhis").".".$file->getClientOriginalExtension();

        $fv->stock = $request->stock;
        $fv->created_at = Date('Y-m-d H:i:s');
        $fv->save();

        return redirect()->route('live.product');
    }

    public function delete(Request $request)
    {
        FarmVariety::destroy($request->id);
        return $request->id;
    }
}
