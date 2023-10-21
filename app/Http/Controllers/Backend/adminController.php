<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $user=User::orderby('id','asc')->paginate(15);
       return view('backend.pages.admin.manage_admin', compact('user'));
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
        //
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
        $adminedit=User::find($id);
        return view('backend.pages.admin.edit_admin', compact('adminedit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $padminupdate=User::find($id);
        
        $padminupdate->role = $request->role;
        $padminupdate->update();
        return redirect()->route('adminmanage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admindelete=User::find($id);
        $admindelete->delete();
        return redirect()->route('adminmanage');  
    }
}
