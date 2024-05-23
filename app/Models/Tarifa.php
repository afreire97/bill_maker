<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    use HasFactory;


    protected $primaryKey = 'TAR_id';
    protected $table = 'tarifas';




    public function emisor(){
        return $this->belongsTo(User::class,'TAR_emisor_id');
    }
    public function receptor(){
        return $this->belongsTo(User::class,'TAR_receptor_id');
    }



}
