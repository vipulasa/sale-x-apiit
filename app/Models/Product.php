<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'manufacturer_id',
        'vehicle_model_id',
        'name',
        'summary',
        'price',
        'description',
        'image',
        'is_active',
        'is_featured',
        'sort_order',
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }
}
