<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $primaryKey = 'CLI_id';

    protected $fillable = [
        'CLI_nombre',
        'CLI_direccion',
        'CLI_telefono',
        'CLI_email',
        'CLI_cif',
        'CLI_distribuidor_id',
        'CLI_tipo_id',
    ];

    public function tipo(){
        return $this->belongsTo(ClienteTipo::class, 'CLI_tipo_id');
    }


    public function distribuidor(){
        return $this->belongsTo(Distribuidor::class, 'CLI_distribuidor_id');
    }

    public function comercial(){
        return $this->belongsTo(Comercial::class, 'CLI_comercial_id');
    }


}
