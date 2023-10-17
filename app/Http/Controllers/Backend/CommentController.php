<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Comment;
use App\Models\Backend\Post;
use Carbon\Carbon;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managecomment=Comment::orderby('id','desc')->with('blogs')->get();
        return view('backend.pages.comment.manage_comment',compact('managecomment'));
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
        $comment=new Comment();
        $comment->post_id= $request->post_id;
        $comment->name= $request->name;
        $comment->email= $request->email;
        $comment->comment= $request->comment;
        $comment->save();
        session()->flash('message', 'successfully add a Comment');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $editcomment=Comment::find($id);
       return view('backend.pages.comment.edit_comment',compact('editcomment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $commentupdate=Comment::find($id);
        
        $commentupdate->status = $request->status;
        $commentupdate->update();
        return redirect()->route('commentmanage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commentdelete=Comment::find($id);
        $commentdelete->delete();
        return redirect()->route('commentmanage');
    }
}
