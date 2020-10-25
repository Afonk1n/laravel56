<?php

namespace App\Http\Controllers;
use App\Storeynumber;
use Illuminate\Http\Request;

class StoreynumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $storeynumbers = Storeynumber::all();
        return view('admin/storeynumber/index',compact('storeynumbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/storeynumber/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeynumber = new Storeynumber();
        $storeynumber->name = $request->get('name');
        $storeynumber->save();

        return redirect('storeynumbers')->with('Запись добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $storeynumber = Storeynumber::find($id);
        return view('admin/storeynumber/edit',compact('storeynumber','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $storeynumber= Storeynumber::find($id);
        $storeynumber->name=$request->get('name');
        $storeynumber->save();
        return redirect('storeynumbers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $storeynumber = Storeynumber::find($id);
        $storeynumber->delete();
        return redirect('storeynumbers')->with('Запись удалена');
    }
}
