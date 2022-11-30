<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computador extends Model
{
    use HasFactory;

    protected $with = ['marca'];

    public function marca(){
        return $this->belongsTo(Marca::class);
    }
}
