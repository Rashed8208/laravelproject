<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    use HasFactory;
    protected $fillable=['order_id', 'item_id', 'quantity', 'unit_price', 'line_total'];
}
