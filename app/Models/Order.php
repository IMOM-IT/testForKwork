<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id', 'name', 'total_amount', 'delivery_address'];

    public function users()
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products');
    }
}
