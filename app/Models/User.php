<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_distribuidor',
        'is_comercial',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function distribuidor(){
        return $this->hasOne(Distribuidor::class, 'DIS_user_id');
    }

    public function comercial(){
        return $this->hasOne(Comercial::class, 'COM_user_id');
    }




    public function tarifasEmisor(){
        return $this->hasMany(Tarifa::class, 'TAR_emisor_id');
    }
    public function tarifasReceptor(){
        return $this->hasMany(Tarifa::class, 'TAR_receptor_id');
    }




}
