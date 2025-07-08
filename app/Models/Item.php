<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    protected $table = 'items';

    protected $fillable = ['code', 'name', 'unit_set_id'];

    public $timestamps = false;

    public function unitSet(): BelongsTo
    {
        return $this->belongsTo(UnitSet::class, 'unit_set_id');
    }
}
