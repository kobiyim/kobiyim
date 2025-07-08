<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VaultFicheLine extends Model
{
    protected $table = 'vault_fiche_lines';

    protected $fillable = [
        'vault_id',
        'card_id',
        'vault_fiche_id',
        'description',
        'amount',
    ];

    protected $casts = [
        'amount' => 'float',
    ];

    public $timestamps = false;

    public function fiche(): BelongsTo
    {
        return $this->belongsTo(VaultFiche::class, 'vault_fiche_id');
    }
}
