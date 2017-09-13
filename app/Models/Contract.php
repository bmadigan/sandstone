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
     * Always eager load the contracts buyer and user relationships
     */
    protected $with = ['buyer', 'user'];

    /**
     * Get the buyer for this contract.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function buyer()
    {
        return $this->belongsTo(Company::class, 'buyer_id');
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

    /**
     * Scope the contracts to only include contracts of a Given status
     * For eg:  Contract::ofStatus('Closed')->get();
     *
     */
    public function scopeOfStatus($query, $status)
    {
        return $query->where('status', strtoupper($status));
    }

    /**
     * Scope the contracts to only include by given Search term
     */
    public function scopeBySearch($query, $like = null)
    {
        if ($like) {
            $query->where(function ($query) use ($like) {
                $query->where('contract_number', 'like', $search = "%{$like}%")
                      ->orWhere('contract_name', 'like', $search);
            });
        }
    }
}
