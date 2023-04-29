<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripcion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const ACTIVA =1;
    const INACTIVA =2;
    const PENDIENTE =3;
    const RECHAZADA =4;
    const BLOQUEADA =5;

    // relacion uno a muchos inversa
    public function user(){
        return $this->BelongsTo('App\Models\User');
    }

}
