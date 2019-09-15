<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
	    'name', 
	    'email', 
	    'password',
	    'level',
	    'foto',
	    'status',
	    'country',
	    'phone',
	    'affiliate_code',
	    'reffered_by'
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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->groups()->detach();
             // do the rest of the cleanup...
        });

	static::created(function(User $user) {
	     $user->groups()->attach(8);
	});
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product','member')
		    ->withPivot(['plan','status','expired_at']);
    }

    public function newCommers()
    {
    	return $this->hasMany('App\User','reffered_by')->where('status','N');
    }

    public function refferals()
    {
    	return $this->hasMany('App\User','reffered_by')->where('status','A');
    }

    public function refferer()
    {
    	return $this->belongsTo('App\User','reffered_by');
    }

    public function setRefferer(User $user)
    {
	if ($this->affiliate_code !== $user->affiliate_code)
	    $this->update([
                'reffered_by' => $user->id
	    ]);
    }

    public function getNew()
    {
        return $this->where(['users.status'=>'N']);
    }

    public function getConfirmed()
    {
        return $this->where(['users.status'=>'V']);
    }
}
