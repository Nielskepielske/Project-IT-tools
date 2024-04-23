<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Vak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index()
    {
        $testen = Test::all();

        foreach ($testen as $test) {
            print_r($test);
        }
    }

    public function showRadarGraph(Request $vak)
    {
        $user = Auth::user();
        $vak = $vak->get('naam');
        $vak = Vak::query()->where('naam', $vak)->first();

        //toon enkel de resultaten van de ingelogde gebruiker
        $testen = $user->testen->where('vak_id', $vak->id);
        $testen = $testen->unique();
        $testen = $testen->each(function ($test) use ($user) {
            $test->naam = $test->naam;
            $test->average = $test->getAverage($user->id);
        });

        $labels = $testen->pluck('naam');
        $data = $testen->pluck('average');
        $data = [
            'labels' => $labels,
            'data' => $data
            'clickable' => 0,
        ];

        return view('radar-chart', compact('data'));
    }
}
