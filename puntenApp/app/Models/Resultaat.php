<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultaat extends Model
{
    use HasFactory;

    public function testen(){
        return $this->belongsTo(Test::class);
    }
    public function student(){
        return $this->belongsTo(student::class);
    }
    protected $table = "resultaten";
}
