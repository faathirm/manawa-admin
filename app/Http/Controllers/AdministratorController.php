<?php

namespace App\Http\Controllers;

use App\AdministatorPassword;
use App\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    public function index()
    {
        $administrator = Administrator::orderBy('id','desc')->get();
        return view('akun.administrator', ['administrator'=>$administrator]);
    }

    public function new(Request $request)
    {
        if($request->password == $request->confirmpassword){
            $admin = new Administrator();
            $admin->email = $request->email;
            $admin->name = $request->name;
            $admin->added_by = 1;
            $admin->created_at = Date('Y-m-d H:i:s');
            $admin->save();

            $admin_pass = new AdministatorPassword();
            $admin_pass->id_admin = $admin->id;
            $admin_pass->password = Hash::make($request->password);
            $admin_pass->save();

            return redirect()->route('acc.admin');
        }
    }

    public function update(Request $request)
    {
        $previouspassword = AdministatorPassword::Where('id_admin',$request->id)->first();
        if(Hash::check($request->previouspassword, $previouspassword->password)){
            if($request->confirmpassword = $request->password){
                $upd_acc = Administrator::find($request->id);
                $upd_acc->name = $request->name;
                $upd_acc->email = $request->email;
                $upd_acc->save();

                $upd_admin_pass = AdministatorPassword::Where('id_admin',$request->id)->first();
                $upd_pass = AdministatorPassword::find($upd_admin_pass->id);
                $upd_pass->password = Hash::make($request->password);
                $upd_pass->save();

                return redirect()->route('acc.admin');
            }
        }
    }

    public function delete(Request $request)
    {
        $delete = AdministatorPassword::Where('id_admin',$request->id)->delete();
        Administrator::destroy($request->id);
        return $request->id;
    }
}
