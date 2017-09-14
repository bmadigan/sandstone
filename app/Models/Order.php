<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public static function findByOrderNumber($orderNumber)
    {
        return self::where('order_number', $orderNumber)
                    ->with('items')
                    ->with('customer')
                    ->first();
    }

    public static function generateOrderNumber($length = 24)
    {
        return substr(str_shuffle(str_repeat($x='023456789abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
}
