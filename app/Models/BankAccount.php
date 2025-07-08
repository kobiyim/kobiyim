<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;

    protected $table = 'bank_accounts';

    protected $fillable = [
        'bank_id',
        'code',
        'name',
        'active',
    ];

    public $timestamps = false;

    // Banka ilişkisi
    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    // Kredi kartı ilişkisi (varsa)
    public function creditCards()
    {
        return $this->hasMany(BankCreditCard::class);
    }

    // Banka hareket fişi satırları ilişkisi
    public function bankFicheLines()
    {
        return $this->hasMany(BankFicheLine::class);
    }
}
