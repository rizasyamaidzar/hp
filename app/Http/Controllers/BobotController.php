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
        
        $jumlahBobot = Bobot::sum('bobot');
        $bobot = Bobot::all();
        return view("bobot",[
            "bobot"=> $bobot,
            "jumlah" => $jumlahBobot
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
        $this->authorize('admin');

        $bobot = Bobot::sum('bobot');
        $validateDate = $request->validate([
            "name"=> "required",
            "bobot" =>"required|numeric|max:100",
            "type" =>"required"
        ]);
        //mengecek apakah saat ini bobot lebih dari 100
        $jumlahBobot = $validateDate["bobot"] + $bobot ;
        if  ($jumlahBobot > 100){
        return redirect()->back()->with("error","Jumlah Bobot Melebihi dari 100");
        }
        else {
        Bobot::create($validateDate);
        return redirect('/bobot')->with("success","New Criteria has been added!");
        }
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
        $this->authorize('admin');
        return view("editBobot",[
            'bobot' => $bobot
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bobot $bobot)
    {
        $this->authorize('admin');
        $jumlah = Bobot::sum('bobot');
        $jumlah-= $bobot->bobot;
        // @dd($jumlah);
        $validateDate = $request->validate([
            "name"=> "required",
            "bobot" =>"required|numeric|max:100",
            "type" =>"required"
        ]);
        //mengecek apakah saat ini bobot lebih dari 100
        
        $jumlahBobot = $validateDate["bobot"] + $jumlah ;
        // @dd($jumlahBobot);
        if  ($jumlahBobot > 100){
        return redirect()->back()->with("error","Jumlah Bobot Melebihi dari 100");
        }
        else {
        Bobot::where("id",$bobot->id)->update($validateDate);
        return redirect('/bobot')->with("success","New Criteria has been Update!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bobot $bobot)
    {
        $this->authorize('admin');
        Bobot::destroy($bobot->id);
        return redirect('/bobot')->with("success","Category has been Deleted!");
    }
}
