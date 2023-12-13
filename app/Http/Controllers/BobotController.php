<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bobot;
use App\Http\Requests\StoreBobotRequest;
use App\Http\Requests\UpdateBobotRequest;

class BobotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bobot = Bobot::all();
        return view("bobot",[
            "bobot"=> $bobot
        ]);
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
        $validateDate = $request->validate([
            "name"=> "required",
            "bobot" =>"required",
            "type" =>"required"
        ]);
        Bobot::create($validateDate);
        return redirect('/bobot')->with("success","New Galery has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Bobot $bobot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bobot $bobot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBobotRequest $request, Bobot $bobot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bobot $bobot)
    {
        Bobot::destroy($bobot->id);
        return redirect('/bobot')->with("success","Category has been Deleted!");
    }
}
