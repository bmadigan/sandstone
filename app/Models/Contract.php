<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Get the buyers for this contract.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buyers()
    {
        return $this->hasMany(Company::class, 'buyer_id');
    }

    /**
     * Get the associated user account
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
