<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $fillable = ['code', 'name', 'active'];

    public $timestamps = false;

    public function activities()
    {
        return $this->hasMany(CardActivity::class);
    }
}
