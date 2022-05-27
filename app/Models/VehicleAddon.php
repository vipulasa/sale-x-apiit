<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleAddon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'manufacturer_id',
        'vehicle_model_id',
        'name',
        'description',
        'image',
        'value',
        'is_active'
    ];

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class);
    }

    public function vehicleModel(){
        return $this->belongsTo(VehicleModel::class);
    }
}
