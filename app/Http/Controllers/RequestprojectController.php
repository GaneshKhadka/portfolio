<?php

namespace App\Http\Controllers;

use App\Requestproject;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RequestprojectController extends Controller
{
    public function project(Request $request)
    {
        $this -> validate($request,[
           'name' => 'required',
           'phone' => 'required',
           'email' => 'required|email',
           'dateandtime' => 'required',
           'budget' => 'required',
           'requirement' => 'required',
        ]);
        $reqproject = new Requestproject();
        $reqproject -> name = $request -> name;
        $reqproject -> phone = $request -> phone;
        $reqproject -> email = $request -> email;
        $reqproject -> expected_date = $request -> dateandtime;
        $reqproject -> budget = $request -> budget;
        $reqproject -> requirement = $request -> requirement;
        $reqproject -> status = false;
        $reqproject -> save();
        Toastr::success('Project request sent successfully. We will confirm  to you shortly within 24 hrs.Be patience!!','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
