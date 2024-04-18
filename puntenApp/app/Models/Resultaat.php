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
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function vak(){
        return $this->hasOneThrough(Vak::class, Test::class, 'id', 'id', 'test_id', 'vak_id');
    }
    protected $table = "resultaten";
}
