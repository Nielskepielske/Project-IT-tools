<?php

namespace App\Http\Controllers;
use App\Models\Test;

use Illuminate\Http\Request;


class TestController extends Controller
{
    public function index(){
        $testen = Test::all();

        foreach($testen as $test){
            print_r($test);
        }
    }
    public function showRadarGraph()
    {
            // Example data
            $data = [
                'labels' => ['Wiskunde', 'Fysica', 'Chemie', 'Label 4', 'Label 5'],
                'data' => [30, 70, 90, 85, 95]
            ];
    
            return view('Main', compact('data'));

    }

}
