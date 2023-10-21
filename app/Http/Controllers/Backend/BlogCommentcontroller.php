<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Blogcomment;

class BlogCommentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bgmanagecomment=Blogcomment::orderby('id','desc')->with('bgblogs')->paginate(15);
        return view('backend.pages.bgcomment.bgmanage_comment',compact('bgmanagecomment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blogcomment=new Blogcomment();
        $blogcomment->blog_id= $request->blog_id;
        $blogcomment->name= $request->name;
        $blogcomment->email= $request->email;
        $blogcomment->comment= $request->comment;
        $blogcomment->save();
        session()->flash('message', 'successfully add a Comment');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bgeditcomment=Blogcomment::find($id);
        return view('backend.pages.bgcomment.bgedit_comment',compact('bgeditcomment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bgcommentupdate=Blogcomment::find($id);
        
        $bgcommentupdate->status = $request->status;
        $bgcommentupdate->update();
        return redirect()->route('bgcommentmanage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bgcommentdelete=Blogcomment::find($id);
        $bgcommentdelete->delete();
        return redirect()->route('bgcommentmanage');
    }
}
