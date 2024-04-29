<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vak extends Model
{
    use HasFactory;

    /**
     * ophalen van de testen van het vak
     */
    public function testen():HasMany{
        return $this->hasMany(Test::class);
    }

    /**
     * ophalen van de gemiddelde score van een vak voor een bepaalde gebruiker
     */
    public function getAverage($userid){
        $total = 0;
        $maxtotal = 0;
        foreach($this->testen as $test){
            foreach($test->resultaten as $resultaat){
                if($resultaat->user_id != $userid){
                    continue;
                }
                $total += $resultaat->resultaat;
                $maxtotal += $resultaat->max_score;
            }
        }
        return $total *100 / $maxtotal;
    }

    protected $table = 'vakken';
}
