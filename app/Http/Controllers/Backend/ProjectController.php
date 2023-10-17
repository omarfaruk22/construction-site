<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Project;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;
use File;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $project=Project::orderby('id','asc')->get();
        return view('backend.pages.project.manage_project',compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.project.add_project');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $projects=new Project();
       $request->validate([
        'pname'=>'required',
        'description'=>'required',
     ]);
       $projects->name = $request->pname;
       $projects->description = $request->description;
       $projects->type = $request->ptype;
       $projects->status = $request->status;
       $projects->slug = Str::slug( $request->pname);
       if ($request->pic) {
        $image = $request->file('pic');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('backend/projectimage/' . $imageName);
        Image::make($image)->save($location);
        $projects->pic = $imageName;
    }
    $projects->save();
    session()->flash('message', 'successfully added project');
    return redirect()->back();


    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projectedit=Project::find($id);
        return view('backend.pages.project.edit_project', compact('projectedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $projectupdate=Project::find($id);
        
        $projectupdate->name = $request->pname;
        $projectupdate->slug = Str::slug( $request->pname);
        $projectupdate->description = $request->description;
      
        if(!empty($request->pic)){
            if(File::exists('backend/projectimage/'.$projectupdate->pic)){
                File::delete('backend/projectimage/'.$projectupdate->pic);
            }
            $image = $request->file('pic');
            $nameCustom=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/projectimage/'.$nameCustom);
            $check=Image::make($image)->save($location);
            $projectupdate->pic=$nameCustom;
        }
        $projectupdate->type = $request->type;
        $projectupdate->status = $request->status;
        $projectupdate->update();
        return redirect()->route('projectmanage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projectdelete=Project::find($id);
        File::delete('backend/projectimage/'.$projectdelete->pic);
        $projectdelete->delete();
        return redirect()->route('projectmanage');   
    }
}
