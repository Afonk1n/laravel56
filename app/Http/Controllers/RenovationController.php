<?php

namespace App\Http\Controllers;
use App\Renovation;
use Illuminate\Http\Request;

class RenovationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renovations = Renovation::all();
        return view('admin/renovation/index',compact('renovations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/renovation/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $renovation = new renovation();
        $renovation->name = $request->get('name');
        $renovation->save();

        return redirect('renovations')->with('Запись добавлена');
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
        $renovation = Renovation::find($id);
        return view('admin/renovation/edit',compact('renovation','id'));
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
        $renovation= Renovation::find($id);
        $renovation->name=$request->get('name');
        $renovation->save();
        return redirect('renovations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $renovation = Renovation::find($id);
        $renovation->delete();
        return redirect('renovations')->with('Запись удалена');
    }
}
