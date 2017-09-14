<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get companies for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    /**
     * Get the contracts for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    /**
     * Get the shipments for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }

    /**
     * Get the products for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getRecentOrders()
    {
        return $this->orders()
                    ->with('items')
                    ->with('customer')
                    ->latest()
                    ->take(10)
                    ->get();
    }

    public function totalCustomers()
    {
         return rand(5, 100);
    }

    public function totalProductsSold()
    {
        return $this->products->count();
    }

    public function getTotalRevenue()
    {
        return formatAsCurrency($this->calculateTotalRevenue());
    }

    public function calculateTotalRevenue()
    {
        return rand(10000, 999999);
    }
}
