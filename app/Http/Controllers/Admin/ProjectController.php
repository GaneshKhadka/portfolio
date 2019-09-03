<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.project.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $this -> validate($request,[
           'category' => 'required',
           'name' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if(!file_exists('uploads/project'))
            {
                mkdir('uploads/project',0777,true);
            }
            $image->move('uploads/project',$imagename);
        }else{
            $imagename = "default.png";
        }
        $project = new Project();
        $project -> category_id = $request -> category;
        $project -> name = $request -> name;
        $project -> description = $request -> description;
        $project -> image = $imagename;
        $project -> save();
        return redirect()->route('project.index')->with('successMsg','Project name added Successfully !!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $categories = Category::all();
        return view('admin.project.edit',compact('project','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this -> validate($request,[
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $project = Project::find($id);
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();

            if(!file_exists('uploads/project'))
            {
                mkdir('uploads/project',0777,true);
            }
            unlink('uploads/project/'.$project->image);
            $image->move('uploads/project',$imagename);
        }else{
            $imagename = $project->image;
        }
        $project -> category_id = $request -> category;
        $project -> name = $request -> name;
        $project -> description = $request -> description;
        $project -> image = $imagename;
        $project -> save();
        return redirect()->route('project.index')->with('successMsg','Project name updated Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (file_exists('uploads/project/'.$project->image))
        {
            unlink('uploads/project/'.$project->image);
        }
        $project -> delete();
        return redirect()->back()->with('successMsg','Project name deleted successfully !!');
    }
}
