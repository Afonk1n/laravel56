<?php

namespace App\Http\Controllers;
use App\Apartment;
use App\Bathroom;
use App\District;
use App\Layout;
use App\Renovation;
use App\Room;
use App\Storeynumber;
use App\Street;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('editor/apartment/index',compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        $streets = Street::all();
        $storeynumbers = Storeynumber::all();
        $layouts = Layout::all();
        $renovations = Renovation::all();
        $bathrooms = Bathroom::all();
        $districts = District::all();
        return view('editor/apartment/create',compact('rooms','streets','storeynumbers','layouts','renovations','bathrooms','districts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apartment = new Apartment();
        $apartment->area = $request->get('area');
        $apartment->number = $request->get('number');
        $apartment->storey = $request->get('storey');
        $apartment->specification = $request->get('specification');
        $apartment->additional = $request->get('additional');
        $apartment->sold = $request->get('sold');
        $apartment->room_id = $request->get('room_id');
        $apartment->street_id = $request->get('street_id');
        $apartment->storeynumber_id = $request->get('storeynumber_id');
        $apartment->layout_id = $request->get('layout_id');
        $apartment->renovation_id = $request->get('renovation_id');
        $apartment->bathroom_id = $request->get('bathroom_id');
        $apartment->district_id = $request->get('district_id');
        $apartment->save();

        return redirect('apartments')->with('Запись добавлена');
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
        $rooms = Room::all();
        $streets = Street::all();
        $storeynumbers = Storeynumber::all();
        $layouts = Layout::all();
        $renovations = Renovation::all();
        $bathrooms = Bathroom::all();
        $districts = District::all();
        $apartment = Apartment::find($id);
        return view('editor/apartment/edit',compact('apartment','id','rooms','streets','storeynumbers','layouts','renovations','bathrooms','districts'));
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
        $apartment= Apartment::find($id);
        $apartment->area = $request->get('area');
        $apartment->number = $request->get('number');
        $apartment->storey = $request->get('storey');
        $apartment->specification = $request->get('specification');
        $apartment->additional = $request->get('additional');
        $apartment->sold = $request->get('sold');
        $apartment->room_id = $request->get('room_id');
        $apartment->street_id = $request->get('street_id');
        $apartment->storeynumber_id = $request->get('storeynumber_id');
        $apartment->layout_id = $request->get('layout_id');
        $apartment->renovation_id = $request->get('renovation_id');
        $apartment->bathroom_id = $request->get('bathroom_id');
        $apartment->district_id = $request->get('district_id');
        $apartment->save();
        return redirect('apartments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apartment = Apartment::find($id);
        $apartment->delete();
        return redirect('apartments')->with('Запись удалена');
    }
}
