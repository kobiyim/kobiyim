<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankCreditCard extends Model
{
    use HasFactory;

    protected $table = 'bank_credit_cards';

    protected $fillable = ['bank_account_id', 'card_number', 'expiry_date', 'cut_off_date'];

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class);
    }
}
