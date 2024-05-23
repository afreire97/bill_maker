<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteTipo extends Model
{
    use HasFactory;

    protected $table = 'clientes_tipos';
    protected $primaryKey = 'CLI_TIP_id';


    public function cliente(){
        return $this->hasMany(Cliente::class, 'CLI_tipo_id');
    }
}
