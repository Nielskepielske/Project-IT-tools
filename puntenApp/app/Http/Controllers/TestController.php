<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Vak;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $testen = Test::all();

        foreach ($testen as $test) {
            print_r($test);
        }
    }

    public function showRadarGraph()
    {
        // Voorbeeldgegevens, je moet deze variabelen instellen op de juiste waarden
        $vak = 'Vaknaam';
        $resultaten = [80, 70, 90, 85, 95]; // Voorbeeldresultaten

        $data = [
            'labels' => [$vak],
            'data' => $resultaten,
        ];

        return view('radar-chart', compact('data'));
    }
}
