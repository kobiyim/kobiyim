<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BankFiche extends Model
{
    protected $table = 'bank_fiches';

    protected $fillable = [
        'date_',
        'fiche_no',
        'transaction',
        'sign',
        'total',
        'description',
    ];

    protected $casts = [
        'date_' => 'date',
        'total' => 'float',
    ];

    public $timestamps = false;

    public function lines(): HasMany
    {
        return $this->hasMany(BankFicheLine::class, 'bank_fiche_id');
    }

    protected function casts(): array
    {
        return [
            'date_' => 'date',
        ];
    }
}
