<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    use HasFactory;
    protected $table = 'carts';
    protected $fillable = [
        'product_id',
        'user_id',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
