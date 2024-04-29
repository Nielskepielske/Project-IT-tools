<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultaat extends Model
{
    use HasFactory;

    /**
     * ophalen van de test van het resultaat
     */
    public function testen(){
        return $this->belongsTo(Test::class);
    }
    /**
     * ophalen van de gebruiker van het resultaat
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
    /**
     * ophalen van het vak van het resultaat
     */
    public function vak(){
        return $this->hasOneThrough(Vak::class, Test::class, 'id', 'id', 'test_id', 'vak_id');
    }

    //tabelnaam
    protected $table = "resultaten";
}
