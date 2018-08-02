<?php

namespace App;

use Carbon\Carbon;
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

    public function saleValueOverLifetime()
    {
        return $this->sales->sum('sale_price');
    }

    public function saleValueThisMonth()
    {
        $now = Carbon::now();

        return $this->sales()->whereBetween('created_at', [
            $now->startOfMonth(),
            $now->copy()->endOfMonth()
        ])->get()->sum('sale_price');
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function hasRole($role)
    {
        if (!$this->roles->contains('name', $role)) {
            return false;
        }

        return true;
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isTheSameAs(User $user)
    {
        return $this->id === $user->id;
    }
}
