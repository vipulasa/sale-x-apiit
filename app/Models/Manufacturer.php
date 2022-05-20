<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'is_active'
    ];

    // Manufacturer has many vehicle models
    public function vehicleModels(){
        return $this->hasMany(VehicleModel::class, 'manufacturer_id');
    }

    // Manufacturer has many vehicles
    public function vehicles(){
        return $this->hasMany(Product::class, 'manufacturer_id');
    }
}
