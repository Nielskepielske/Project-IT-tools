<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Vak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function showRadarGraph(Request $vak)
    {
        //ophalen van de ingelogde gebruiker en het vak
        $user = Auth::user();
        $vak = $vak->get('naam');
        $vak = Vak::query()->where('naam', $vak)->first();

        //toon enkel de resultaten van de ingelogde gebruiker
        $testen = $user->testen->where('vak_id', $vak->id); //ophalen van de juiste testen
        $testen = $testen->unique();
        $testen = $testen->each(function ($test) use ($user) {
            $test->naam = $test->naam;
            $test->average = $test->getAverage($user->id);
        });

        //labels en data voor de grafiek
        $labels = $testen->pluck('naam');
        $data = $testen->pluck('average');
        $data = [
            'labels' => $labels,
            'data' => $data,
            'clickable' => 0 //Met deze variabele stellen we in of we verder kunnen klikken of niet
        ];


        /**
         * De view radar-chart.blade.php wordt opgeroepen en de data wordt meegegeven
         * De data wordt in de view gebruikt om de grafiek te tekenen
         * De grafiek wordt getekend met de data die we hier meegeven
         * 
         * compact('data') is hetzelfde als ['data' => $data]
         * 
         */
        return view('radar-chart', compact('data'));
    }
}
