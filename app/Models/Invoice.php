<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'card_id',
        'invoice_no',
        'date_',
        'description',
        'type',
        'sign',
        'total',
        'docode',
    ];

    public function details()
    {
        return $this->hasMany(InvoiceDetail::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    protected function casts(): array
    {
        return [
            'date_' => 'date',
        ];
    }
}
