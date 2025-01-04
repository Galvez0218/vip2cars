<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suscriptores extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    protected $primaryKey = 'id_suscriptor';

    public function evento()
    {
        return $this->hasOne(Evento::class, 'id_evento');
    }
}
