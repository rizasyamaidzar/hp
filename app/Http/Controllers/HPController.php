<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HP;
use App\Http\Requests\StoreHPRequest;
use App\Http\Requests\UpdateHPRequest;

class HPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hP = HP::all();
        return view("alternatif",[
            "alternatif"=> $hP
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
            "nama" => "required",
            "merk" =>"required",
            "harga" =>"required",
            "ram" => "required",
            "memory" =>"required",
            "sinyal" => "required",
            "layar" => "required",
            "processor" => "required",
            "kamera" => "required"

        ]);
        HP::create($validateDate);
        return redirect('/alternatif')->with("success","New Alternatif has been added!");
    }

    /**
     * Display the specified resource.
     */
    public function show(HP $hP)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HP $hP)
    {
        return view("editAlternatif",[
            'alternatif' => $hP
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HP $hP)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'ram' => 'required|numeric',
            'memory' =>'required|numeric',
            'sinyal' => 'required|numeric',
            'layar' => 'required|numeric',
            'processor' => 'required|numeric',
            'kamera' => 'required|numeric'
        ]);
        
        if (!$alternatif) {
            return redirect()->back()->with('error', 'Alternatif not found');
        }
        else{
            HP::where("id",$hP->id)->update($validateDate);
            return redirect()->route('/alternatif')->with('success', 'Alternatif updated successfully');

        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HP $hP)
    {
        if (!$hP) {
            return redirect('/alternatif')->with("error", "Alternatif not found");
        }
    
        HP::destroy($hP->id);
        return redirect('/alternatif')->with("success", "Alternatif has been deleted!");
    }
}
