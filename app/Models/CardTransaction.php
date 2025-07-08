<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardTransaction extends Model
{
    use HasFactory;

    protected $table = 'card_transactions';

    protected $fillable = ['date_', 'fiche_no', 'transaction', 'sign', 'total', 'description'];

    public $timestamps = false;
}
