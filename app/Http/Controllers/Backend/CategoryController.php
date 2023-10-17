<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Backend\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.manage_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
            'name'=>'required',
            'status'=>'required',
           
        ]);
        
        if($validator->fails()){
            return response()->json([
                'success'=>'faild',
                "errors"=>$validator->messages()
            ]);
        }
        else{
            $cat = new Category;
            $cat->name = $request->name;
            $cat->status = $request->status;
            $cat->save();
            return response()->json([
                "msg"=>'Category Addedd Successfull'
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function catshow()
    {
        $show = Category::all();
        return response()->json([
            'data'=>$show
        ]);
    }
    public function show(string $id)
    {
        //
    }
    public function catedit($id)
    {
        $show = Category::find($id);
            return response()->json([
                'data'=>$show
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $catupdate =Category::find($id);
        $catupdate->name = $request->cname;
        $catupdate->status = $request->status;
        $catupdate->update();
        return response()->json([
            "msg"=>'Category Update Successfull'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $catdelete = Category::find($id);
        $catdelete->delete();
        return response()->json([
            "msg"=>'Category Delete Successfull'
        ]);
    }
}
