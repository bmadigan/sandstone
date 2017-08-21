<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Company extends Model
{
    use Notifiable;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

   /**
     * The relationships to always eager-load.
     *
     * @var array
     */
    protected $with = ['user'];


    /**
     * Get a string path for the company.
     *
     * @return string
     */
    public function path()
    {
        return "/companies/{$this->id}";
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
     * Get contracts for the company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class, 'buyer_id');
    }


    /**
    * Display a simple Street Address as an example
    */
    public function displayStreetAddress()
    {
        return $this->street_address . '<br>' . $this->secondary_address;
    }

    /**
    * Display a simple contact with email as an example
    */
    public function displayContact()
    {
        return $this->contact_name . '<br>' . $this->contact_email;
    }
}
