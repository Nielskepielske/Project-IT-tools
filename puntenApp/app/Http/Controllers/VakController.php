<?php

namespace App\Http\Controllers;

use App\Models\Vak;
use App\Models\Test;
use App\Models\Resultaat;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LDAP\Result;

class VakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user = null)
    {
        //ophalen van de ingelogde gebruiker
        $user = Auth::user();

        //ophalen van de vakken van de ingelogde gebruiker
        $vakken = $user->resultaten->map(function($resultaat){
            return $resultaat->vak;
        });
        
        //omvormen van de vakken naar een unieke collectie
        $vakken = $vakken->unique();
        $vakken = $vakken->each(function($vak) use ($user){
            $vak->naam = $vak->naam;
            $vak->average = $vak->getAverage($user->id);
        });

        //labels en data voor de grafiek
        $labels = $vakken->pluck('naam');
        $results = $vakken->pluck('average');


        $data = [
            'labels' => $labels,
            'data' => $results,
            "clickable" => 1
        ];

        //De view radar-chart.blade.php wordt opgeroepen en de data wordt meegegeven
        return view('radar-chart', compact('data'));
    }
}
