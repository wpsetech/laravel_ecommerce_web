<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItems extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable=[
        'order_id',
        'prod_id',
        'price',
    ];

    public function products():BelongsTo
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
