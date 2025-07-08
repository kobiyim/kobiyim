<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitSet extends Model
{
    use HasFactory;

    protected $table = 'unit_sets';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
        'active',
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
