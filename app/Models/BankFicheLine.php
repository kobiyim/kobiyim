<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankFicheLine extends Model
{
    protected $table = 'bank_fiche_lines';

    protected $fillable = [
        'bank_id',
        'bank_account_id',
        'card_id',
        'bank_fiche_id',
        'description',
        'amount',
    ];

    protected $casts = [
        'amount' => 'float',
    ];

    public $timestamps = false;

    public function fiche(): BelongsTo
    {
        return $this->belongsTo(BankFiche::class, 'bank_fiche_id');
    }
}
