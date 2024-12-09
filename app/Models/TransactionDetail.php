<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable = [
        'transaction_header_id',
        'qty',
        'item_name',
        'item_price',
    ];
    public function transactionHeader()
    {
        return $this->belongsTo(TransactionHeader::class);
    }

    use HasFactory;
}
