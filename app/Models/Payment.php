<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Payment extends Model
{
    //<?php
 
    protected $fillable = [
        'payable_id',
        'payable_type',
        'payment_type',
        'meta',
        'status',
        'reference',
        'owner_id','redirect_to'
    ];


    /**
     * Get the user that owns this model.
     */
    public function owner()//: BelongsTo
    {
        return $this->belongsTo(User::class,'owner_id');
    }

    public function getOwnerAttribute(){
        try {
            $m=$this->meta??[];
            $f=isset($m['user_id'])?$m['user_id']:1;
            return User::where('id',$f)->select('name','id')->first();
        } catch (Exception $e) {
            \Log::info('d',[$e->getMessage()]);
        }
        return collect();
    }


    protected $casts = [
        'meta' => 'array',
        'redirect_to' => 'array',
    ];

    /**
     * Polymorphic parent.
     */
    public function payable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Scope for online payments
     */
    public function scopeOnline($query)
    {
        return $query->where('payment_type', 'online');
    }

    /**
     * Scope for bank payments
     */
    public function scopeBank($query)
    {
        return $query->where('payment_type', 'bank');
    }

    /**
     * Check if payment is completed / successful
     */
    public function isSuccessful(): bool
    {
        return $this->status === 'completed';
    }
}
