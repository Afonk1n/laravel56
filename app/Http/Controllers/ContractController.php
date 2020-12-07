<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Contract;
use App\Service;
use App\Status;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::all();
        return view('editor/contract/index',compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartments = Apartment::all();
        $services = Service::all();
        $statuses = Status::all();
        $contracts = Contract::all();
        return view('editor/contract/create',compact('contracts','services','statuses','apartments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'transaction' => 'required|integer|min:1000|max:999999999',
            'servicecost' => 'required|integer|min:100|max:999999',
            'dealarea' => 'required|integer|min:10|max:50000',
        ]);
        $contract = new Contract();
        $contract->transaction = $request->get('transaction');
        $contract->servicecost = $request->get('servicecost');
        $contract->dealdate = $request->get('dealdate');
        $contract->dealarea = $request->get('dealarea');
        $contract->service_id = $request->get('service_id');
        $contract->apartment_id = $request->get('apartment_id');
        $contract->status_id = $request->get('status_id');
        $contract->save();
        return redirect('contracts')->with('Запись добавлена');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract = Contract::find($id);
        $contract->delete();
        return redirect('contracts')->with('Запись удалена');
    }
}
