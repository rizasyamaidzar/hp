<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\HP;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       
        $alternatifCount = HP::all()->count();
        $bobotCount = Bobot::all()->count();

        // $alternatifRoute = route('alternatif.index');
        // $bobotRoute = route('bobot.index');
        // @dd($alternatifCount);
        return view('dashboard', [
            "bobot" => $bobotCount,
            "alternatif"=> $alternatifCount
        ]
        
        );
    }
}
