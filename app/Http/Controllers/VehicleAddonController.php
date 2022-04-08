<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleAddonRequest;
use App\Http\Requests\UpdateVehicleAddonRequest;
use App\Models\VehicleAddon;

class VehicleAddonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVehicleAddonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleAddonRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleAddon  $vehicleAddon
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleAddon $vehicleAddon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleAddon  $vehicleAddon
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleAddon $vehicleAddon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleAddonRequest  $request
     * @param  \App\Models\VehicleAddon  $vehicleAddon
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleAddonRequest $request, VehicleAddon $vehicleAddon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleAddon  $vehicleAddon
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleAddon $vehicleAddon)
    {
        //
    }
}
