<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Blogmodel;
use App\Models\Backend\Category;
use App\Models\Backend\Blogcomment;
use Illuminate\Support\Str;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;
use File;

class blogpostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogpost=Blogmodel::orderby('id','asc')->with('blogcat')->paginate(15);
        return view('backend.pages.blogpost.manage_blogpost',compact('blogpost'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Category::where('status',1)->get();
        return view('backend.pages.blogpost.add_blogpost',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blogs=new Blogmodel();
        $request->validate([
         'cat_id'=>'required',
         'title'=>'required',
         'description'=>'required',
         'writer_name'=>'required',
         'pic'=>'required',
         'meta_tag'=>'required',
         'short_des'=>'required',
         'status'=>'required',
         
      ]);
        $blogs->cat_id = $request->cat_id;
        $blogs->title = $request->title;
        $blogs->description = $request->description;
        $blogs->writer_name = $request->writer_name;
        $blogs->meta_tag = $request->meta_tag;
        $blogs->short_des = $request->short_des;
        $blogs->status = $request->status;
        $blogs->slug = Str::slug( $request->title);
        if ($request->pic) {
         $image = $request->file('pic');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('backend/blogpostimage/' . $imageName);
         Image::make($image)->save($location);
         $blogs->pic = $imageName;
     }
     $blogs->save();
     session()->flash('message', 'successfully added Blog');
     return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function blogshow(string $cat_name){
        $categories=Category::where('name',$cat_name)->where('status',1)->first();
        $blogpost=Blogmodel::where('cat_id',$categories->id)->where('status',1)->paginate(6);
        return view('frontend.page.postshow.blogpage',compact('blogpost','categories'));



    }
    public function show(Blogmodel $blogmodel)
    {
        $blogshows=Blogmodel::where('id', $blogmodel->id)->get();
        $blogshow=Blogmodel::find($blogmodel->id);
        $bgcommentshow=Blogcomment::where('blog_id',$blogmodel->id)->where('status',0)->limit(20)->get();
        $resentbgshow=Blogmodel::orderby('id','desc')->where('status',1)->limit(10)->get();
        $bgCategoryshow=Category::where('status',1)->withCount('blognam')->get();
        
      
      
      
       

        return view('frontend.page.postshow.blogshow',compact('blogshows','blogshow','bgcommentshow','bgCategoryshow','resentbgshow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $catedit=Category::where('status',1)->get();
        $blogpostedit=Blogmodel::find($id);
        return view('backend.pages.blogpost.edit_blogpost', compact('blogpostedit','catedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blogpostupdate=Blogmodel::find($id);
        
        $blogpostupdate->cat_id = $request->cat_id;
        $blogpostupdate->title = $request->title;
        $blogpostupdate->description = $request->description;
        $blogpostupdate->writer_name = $request->writer_name;
        $blogpostupdate->meta_tag = $request->meta_tag;
        $blogpostupdate->short_des = $request->short_des;
        $blogpostupdate->status = $request->status;
        $blogpostupdate->slug = Str::slug( $request->title);
      
        if(!empty($request->pic)){
            if(File::exists('backend/blogpostimage/'.$blogpostupdate->pic)){
                File::delete('backend/blogpostimage/'.$blogpostupdate->pic);
            }
            $image = $request->file('pic');
            $nameCustom=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/blogpostimage/'.$nameCustom);
            $check=Image::make($image)->save($location);
            $blogpostupdate->pic=$nameCustom;
        }
        
        $blogpostupdate->update();
        return redirect()->route('blogpostmanage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $blogpostdelete=Blogmodel::find($id);
        File::delete('backend/blogpostimage/'.$blogpostdelete->pic);
        $blogpostdelete->delete();
        return redirect()->route('blogpostmanage');   
    }
}
