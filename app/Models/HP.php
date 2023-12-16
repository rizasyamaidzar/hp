<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HP extends Model
{
    use HasFactory;

    protected $fillable = ['nama','harga', 'ram', 'memory', 'sinyal', 'layar', 'processor', 'kamera'];
    
    public function getRouteKeyName(){
        return('nama');
    }
}
