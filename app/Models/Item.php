<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'brief_description',
        'full_description',
        'price',
        'picture'
    ];

    public function cart_item()
    {
        return $this->hasMany(CartItem::class);
    }
}
