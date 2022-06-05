<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        "product_id",
        "price",
        "qty",
        "total",
        "status",
        "store_id",
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
