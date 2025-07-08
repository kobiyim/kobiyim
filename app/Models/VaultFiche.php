<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VaultFiche extends Model
{
    protected $table = 'vault_fiches';

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
        return $this->hasMany(VaultFicheLine::class, 'vault_fiche_id');
    }
}
