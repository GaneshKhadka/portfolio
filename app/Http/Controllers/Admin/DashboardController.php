<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Contact;
use App\Project;
use App\Requestproject;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $projectCount = Project::count();
        $sliderCount = Slider::count();
        $requestprojects = Requestproject::where('status',false)->get();
        $contactCount = Contact::count();
//        return $projectCount;
        return view('admin.dashboard',compact('categoryCount','projectCount','sliderCount','requestprojects','contactCount'));
    }
}
