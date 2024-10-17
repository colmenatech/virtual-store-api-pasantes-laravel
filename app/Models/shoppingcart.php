<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shoppingcart extends Model
{
    protected $table = 'shoppingcart';

    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'quantity'
    ];
}
