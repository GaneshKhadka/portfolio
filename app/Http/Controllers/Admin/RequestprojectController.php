<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\RequestprojectConfirmed;
use App\Requestproject;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class RequestprojectController extends Controller
{
    public function index()
    {
        $requestprojects = Requestproject::all();
        return view('admin.requestproject.index',compact('requestprojects'));
    }

    public function status($id)
    {
        $requestproject = Requestproject::find($id);
        $requestproject ->status = true;
        $requestproject->save();
//        for mail confirmation
        Notification::route('mail', $requestproject->email)
            ->notify(new RequestprojectConfirmed());

        Toastr::success('Project request successfully confirmed!','Success',["positionClass" => "toast-top-center"]);
        return redirect()->back();
    }

    public function destroy($id)
    {
       Requestproject::find($id)->delete();
       Toastr::success('Project request successfully deleted!','Success',["positionClass" => "toast-top-right"]);
       return redirect()->back();
    }
}
