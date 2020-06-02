<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CRMController extends Controller
{
    public function index()
    {
        return view('crm.notification');
    }

    public function post(Request $request)
    {

        $to_name = "Isye S Adhiwinaya";
        $to_email = "faathir.muhammad@gmail.com";
        $cc = "faathir.muhammad@gmail.com";

        $detail = [
            'message'=>$request->message
        ];

        Mail::to($to_email)->send(new \App\Mail\Notification($detail));

        return "Email terkirim";
    }
}
