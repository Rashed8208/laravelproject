<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable=['customer_id','status','payment_method','total,10,2','vat,10,2','discount,10,2','shipping_charge,10,2'];
}
