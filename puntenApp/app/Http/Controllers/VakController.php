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
        $user = Auth::user();
        // $vakken = $user->testen->each(function($test){
        //     return $test->vak;
        // });

        $vakken = $user->resultaten->map(function($resultaat){
            return $resultaat->vak;
        });
        // $resultaten = $user->resultaten;

        // $labels = $vakken->map(function($vak){
        //     $vak->naam = $vak->naam;
        //     $vak->average = $vak->getAverage();
        // });
        
        $vakken = $vakken->unique();
        $vakken = $vakken->each(function($vak) use ($user){
            $vak->naam = $vak->naam;
            $vak->average = $vak->getAverage($user->id);
        });

        $labels = $vakken->pluck('naam');
        $results = $vakken->pluck('average');
        $ids = $vakken->pluck('id');


        $data = [
            'labels' => $labels,
            'data' => $results,
            "ids" => $ids,
            "clickable" => 1
        ];
        return view('radar-chart', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vak $vak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vak $vak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vak $vak)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vak $vak)
    {
        //
    }
}
