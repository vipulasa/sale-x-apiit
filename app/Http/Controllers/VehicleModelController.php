<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleModelRequest;
use App\Http\Requests\UpdateVehicleModelRequest;
use App\Models\VehicleModel;
use Illuminate\Http\Request;

class VehicleModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vehicle-model.index', [
            'vehicle_models' => VehicleModel::paginate(),
        ]);
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
     * @param  \App\Http\Requests\StoreVehicleModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleModel $vehicleModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleModel $vehicleModel)
    {
        return view('vehicle-model.edit', [
            'vehicleModel' => $vehicleModel,
            'manufacturers' => \App\Models\Manufacturer::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleModelRequest  $request
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleModel $vehicleModel)
    {
        $validated = $request->validate([
            "manufacturer_id" => "required",
            "name" => "required",
            "description" => "required",
        ]);

        $vehicleModel->update($validated);

        // set the success message to the session
        session()->flash('success', 'Vehicle Model updated successfully');

        // redirect to user page
        return redirect()->route('vehicle-models.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleModel  $vehicleModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleModel $vehicleModel)
    {

        $vehicleModel->delete();

         // set the success message to the session
         session()->flash('success', 'Vehicle Model is deleted successfully');

         // redirect to user page
         return redirect()->route('vehicle-models.index');
    }
}
