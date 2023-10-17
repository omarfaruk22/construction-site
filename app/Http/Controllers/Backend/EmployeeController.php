<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Employee;
use App\Models\Backend\Post;
use App\Models\Backend\Client;
use App\Models\Backend\Query;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;

use File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $manageemployee=Employee::orderby('id','asc')->get();
        return view('backend.pages.employee.manage_employee', compact('manageemployee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.employee.add_employee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $addemployee=new Employee();
        $request->validate([
         'name'=>'required',
         'designation'=>'required',
         'email'=>'required',
         'linkedn'=>'required',
         'status'=>'required',
      ]);
        $addemployee->name = $request->name;
        $addemployee->designation = $request->designation;
        $addemployee->emaillink = $request->email;
        $addemployee->linkdnlink = $request->linkedn;
        $addemployee->status = $request->status;
        if ($request->pic) {
         $image = $request->file('pic');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('backend/employeeimage/' . $imageName);
         Image::make($image)->save($location);
         $addemployee->pic = $imageName;
     }
     $addemployee->save();
     session()->flash('message', 'successfully added an Employee');
     return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show( )
    {
        $teamshow=Employee::orderby('id','asc')->where('status',1)->paginate(8);
        return view('frontend.page.postshow.teamshow',compact('teamshow'));
    }

    public function aboutshows(){
        $countclient1=Client::count();
        $countemployee1=Employee::count();
        $countcompleteproject1=Post::where('type',0)->where('status',1)->count();
        $countrunningproject1=Post::where('type',0)->where('status',2)->count();
        $queryshow2=Query::orderby('created_at','asc')->where('status',1)->limit(5)->get();
        $queryshow3=Query::orderby('created_at','desc')->where('status',1)->limit(5)->get();
         $aboutshows=Post::where('type',1)->where('status',1)->limit(1)->get();
         return view('frontend.page.postshow.aboutshow',compact('aboutshows','countclient1','countemployee1','countcompleteproject1',
        'countrunningproject1','queryshow2','queryshow3'));


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $employeeedit=Employee::find($id);
       return view('backend.pages.employee.edit_employee',compact('employeeedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employeupdae=Employee::find($id);
        $employeupdae->name=$request->name;
        $employeupdae->designation=$request->designation;
        if(!empty($request->pic)){
            if(File::exists('backend/employeeimage/'.$employeupdae->pic)){
                File::delete('backend/employeeimage/'.$employeupdae->pic);
            }
            $image = $request->file('pic');
            $nameCustom=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/employeeimage/'.$nameCustom);
            $check=Image::make($image)->save($location);
            $employeupdae->pic=$nameCustom;
        }
        $employeupdae->emaillink=$request->email;
        $employeupdae->linkdnlink=$request->linkedn;
        $employeupdae->status=$request->status;
        $employeupdae->update();
        return redirect()->route('employeemanage');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteemployee=Employee::find($id);
        File::delete('backend/employeeimage/'.$deleteemployee->pic);
        $deleteemployee->delete();
        return redirect()->route('employeemanage');
    }
}
