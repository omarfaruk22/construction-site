<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Client;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientmanage=Client::orderby('id','asc')->paginate(15);
        return view('backend.pages.client.manage_client', compact('clientmanage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.client.add_client');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client=new Client();
        $request->validate([
         'name'=>'required',
         'opinion'=>'required',
         'profession'=>'required',
         'pic'=>'required',
         'status'=>'required',
      ]);
        $client->name = $request->name;
        $client->profession = $request->profession;
        $client->opinion = $request->opinion;
        $client->status = $request->status;
        if ($request->pic) {
         $image = $request->file('pic');
         $imageName = time() . '.' . $image->getClientOriginalExtension();
         $location = public_path('backend/clientimage/' . $imageName);
         Image::make($image)->save($location);
         $client->pic = $imageName;
     }
     $client->save();
     session()->flash('message', 'successfully added a Client');
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
        $editclient=Client::find($id);
        return view('backend.pages.client.edit_client', compact('editclient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clientupdate=Client::find($id);
        $clientupdate->name=$request->name;
        $clientupdate->profession = $request->profession;
        $clientupdate->opinion=$request->opinion;
        if(!empty($request->pic)){
            if(File::exists('backend/clientimage/'.$clientupdate->pic)){
                File::delete('backend/clientimage/'.$clientupdate->pic);
            }
            $image = $request->file('pic');
            $nameCustom=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('backend/clientimage/'.$nameCustom);
            $check=Image::make($image)->save($location);
            $clientupdate->pic=$nameCustom;
        }
        $clientupdate->status=$request->status;
        $clientupdate->update();
        return redirect()->route('clientmanage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deleteclient=Client::find($id);
        File::delete('backend/clientimage/'.$deleteclient->pic);
        $deleteclient->delete();
        return redirect()->route('clientmanage');
    }
}
