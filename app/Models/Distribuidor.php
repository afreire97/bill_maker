<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribuidor extends Model
{
    use HasFactory;

    protected $table = 'distribuidores';
    protected $primaryKey = 'DIS_id';

    protected $fillable = [
        'DIS_nombre',
        'DIS_direccion',
        'DIS_telefono',
        'DIS_cif',
        'DIS_logo',
        'DIS_user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'DIS_user_id');
    }


public function clientes(){
    return $this->hasMany(Cliente::class, 'CLI_distribuidor_id');
}


public function comerciales(){

    return $this->hasMany(Comercial::class, 'COM_distribuidor_id');


}
public function tarifas(){

    return $this->hasMany(Tarifa::class, 'TAR_distribuidor_id');


}

}
