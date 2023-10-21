<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Query;
use Illuminate\Http\Request;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query=Query::orderby('id', 'asc')->paginate(15);
        return view('backend.pages.query.manage_query', compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.pages.query.add_query');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $query= new Query();
       $request->validate([
        'question'=>'required',
        'answer'=>'required',
        'status'=>'required',
     ]);
       $query->qustion = $request->question;
       $query->answer = $request->answer;
       $query->status = $request->status;
       $query->save();
       session()->flash('message', 'successfully added Query');
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
        $editquery=Query::find($id);
        return view('backend.pages.query.edit_query', compact('editquery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $queryupdate=Query::find($id);
        
        $queryupdate->qustion = $request->question;
        $queryupdate->answer = $request->answer;
        $queryupdate->status = $request->status;
        $queryupdate->update();
        return redirect()->route('querymanage');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $querydelete=Query::find($id);
        $querydelete->delete();
        return redirect()->route('querymanage');   
    }
}
