<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;
    protected $fillable=['category_id','name','description','price','stock_qty','image'];

    public function category(){
        return $this->belongsTo(category::class, 'category_id');
    }
}
