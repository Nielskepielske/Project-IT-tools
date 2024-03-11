<?php

namespace App\Http\Controllers;

use App\Models\Vak;
use App\Models\Test;
use App\Models\Resultaat;
use App\Models\User;
use Illuminate\Http\Request;
use LDAP\Result;

class VakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user)
    {
        // $vakken = Vak::all();

        // foreach($vakken as $vak){
        //     echo $vak->naam;
        // }

        // $vakken = Vak::all()->load("testen");
        // $values = $vakken->values;
        // $vakken->toJson();
        // $vakken->dump();
        // print_r($values);
        // dd($user);
        // dd(User::find($user));
        $user = User::find($user);
        $testen = Resultaat::where("leerling_id", $user->id)->get();
        dd($testen);
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
