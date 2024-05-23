<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comercial extends Model
{
    use HasFactory;

    protected $table = 'comerciales';
    protected $primaryKey = 'COM_id';

    protected $fillable = [
        'COM_nombre',
        'COM_direccion',
        'COM_telefono',
        'COM_cif',
        'COM_logo',
        'COM_user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'COM_user_id');
    }


    public function distribuidor(){

        return $this->belongsTo(Distribuidor::class, 'COM_distribuidor_id');
    }


    public function clientes(){

        return $this->hasMany(Cliente::class, 'CLI_comercial_id');
    }
    public function tarifas(){

        return $this->hasMany(Tarifa::class, 'TAR_comercial_id');
    }



}
