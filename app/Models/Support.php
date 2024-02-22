<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model //pra ser um model tem que extender de model
{
    use HasFactory;         //para trabalharmos com factorys (testes e etc) }

    protected $fillable = [
        'subject',
        'body',
        'status'
    ];
}
