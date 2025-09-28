<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable=['coupon_id', 'customer_id', 'status', 'discount_amount', 'total_price', 'final_price', 'district_id', 'division_id', 'notes', 'address',];

    public function customer(){
        return $this->belongsTo(customer::class);
    }
    public function items(){
        return $this->hasMany(order_item::class);
    }
}
