<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Post;
use App\Models\Backend\Comment;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post=Post::orderby('id','asc')->paginate(15);
        return view('backend.pages.post.managepost', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.pages.post.add_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $posts=new Post();
        $request->validate([
        'type'=>'required',
         'title'=>'required',
         'description'=>'required',
         'pic'=>'required',
         'meta_tag'=>'required',
         'status'=>'required',
      ]);
        $posts->title = $request->title;
        $posts->description = $request->description;
        $posts->meta_tag = $request->meta_tag;
        $posts->slug = Str::slug($request->title);
        $posts->type = $request->type;
        $posts->status = $request->status;
        if ($request->pic) {
         $image = $request->file('pic');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('backend/blogimage/' . $imageName);
         Image::make($image)->save($location);
         $posts->pic = $imageName;
     }
     $posts->save();
     session()->flash('message', 'successfully added post');
     return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
       $postshows=Post::where('id', $post->id)->get();
       $postshow=Post::find($post->id);
       $resentpost=Post::orderBy('created_at', 'desc')->where('type',3)->where('status',1)->limit(6)->get();
       $ourservice=Post::orderBy('created_at', 'desc')->where('type',2)->where('status',1)->limit(6)->get();
       $ourproject=Post::orderBy('created_at', 'desc')->where('type',0)->where('status',1)->limit(6)->get();
       $commentshow=Comment::where('post_id',$post->id)->where('status',0)->limit(20)->get();
       return view('frontend.page.postshow.postshow',compact('postshows','postshow','commentshow','resentpost','ourservice','ourproject'));
    }


  
    public function sershow(Post $post){
        $serpost=Post::orderBy('created_at', 'desc')->where('type',2)->where('status',1)->paginate(6);
        return view('frontend.page.postshow.serpage',compact('serpost'));



    }
    public function projectshow(Post $post){

        $projectshow=Post::orderby('id','desc')->where('type',0)->where('status',1)->paginate(6);
        return view('frontend.page.postshow.projectshow',compact('projectshow'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blogedit=Post::find($id);
        return view('backend.pages.post.edit_post', compact('blogedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $postupdate=Post::find($id);
        
        $postupdate->title = $request->title;
        $postupdate->description = $request->description;
        $postupdate->meta_tag = $request->meta_tag;
        $postupdate->slug = Str::slug($request->title);
      
        if(!empty($request->pic)){
            if(File::exists('backend/blogimage/'.$postupdate->pic)){
                File::delete('backend/blogimage/'.$postupdate->pic);
            }
            $image = $request->file('pic');
            $nameCustom=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/blogimage/'.$nameCustom);
            $check=Image::make($image)->save($location);
            $postupdate->pic=$nameCustom;
        }
        $postupdate->type = $request->type;
        $postupdate->status = $request->status;
        $postupdate->update();
        return redirect()->route('postmanage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postdelete=Post::find($id);
        File::delete('backend/blogimage/'.$postdelete->pic);
        $postdelete->delete();
        return redirect()->route('postmanage');
    }
}
