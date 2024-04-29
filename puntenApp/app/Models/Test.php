<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    /**
     * ophalen van het vak van de test
     */
    public function vak(){
        return $this->belongsTo(Vak::class);
    }
    /**
     * ophalen van de resultaten van de test
     */
    public function resultaten(){
        return $this->hasMany(Resultaat::class);
    }
    /**
     * ophalen van de gemiddelde score van de test
     */
    public function getAverage($userid){
        $total = 0;
        $maxtotal = 0;
        foreach($this->resultaten as $resultaat){
            if($resultaat->user_id != $userid){
                continue;
            }
            $total += $resultaat->resultaat; 
            $maxtotal += $resultaat->max_score;
        }
        // dd($maxtotal);
        if($maxtotal == 0){
            dd($this->resultaten);
        }
        return $total * 100 / $maxtotal;
    }
    protected $table = "testen";
}
