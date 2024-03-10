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
}
