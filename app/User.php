<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'plan_id',
        'stripe_id',
        'card_brand',
        'card_last_four',
        'coupon_code',
        'trial_ends_at',
        'is_charged',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function plan()
    {
        return $this->belongsTo('App\Plan');
    }
    public function questionnares()
    {
        return $this->belongsToMany(Questionnare::class)->withPivot('category_id', 'is_answered','is_back_later');
    }
}
