<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resultaten extends Model
{
    use HasFactory;

    public function testen(){
        return $this->belongsTo(Testen::class);
    }
    public function student(){
        return $this->belongsTo(student::class);
    }
}
