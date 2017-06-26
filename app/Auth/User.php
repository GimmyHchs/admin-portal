<?php

namespace App\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Messages\MailMessage;
use Hash;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'reset_token',
        'update_by',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permission', 'user_id', 'permission_id');
    }

    public function hasPermission($name)
    {
        return (bool) $this->permissions()->where('name', $name)->first();
    }

    public function resetPassword()
    {
        $token = Hash::make($this->name.$this->email);
        $this->reset_token = $token;
        $this->save();

        return $token;
    }
}
