<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testen extends Model
{
    use HasFactory;

    public function vak(){
        return $this->belongsTo(Vak::class);
    }
    public function resultaten(){
        return $this->hasMany(Resultaten::class);
    }
}
