<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'manufacturer_id',
        'name',
        'description',
        'image',
        'is_active'
    ];

    // Vehicle model belongs to a manufacturer
    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }
}
