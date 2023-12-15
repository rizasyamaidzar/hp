<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\HP;
use Illuminate\Http\Request;

class RangkingController extends Controller
{   
    // Mengambil Bobot
    public function callBobot()
    {
        $bobot = Bobot::all();
        return view("bobot",["bobot"=> $bobot]);
    }

    // Mengambil Alternatif
    public function callAlternatif()
    {
        $alternative = HP::all();
        return view("alternatif",["alternatif"=> $alternative]);
    }

    // Menghitung Max
    public function calculateMax(alternatif $alternatif, jmlKriteria $jmlKriteria, bobot $bobot) {
        $atributMax = [];
        $max = [];
        $k = 0;
        for ($i=0; $i < count($alternatif) && $k < $jmlKriteria; $i++) { 
            $name = $bobot[$k]->name;
            for ($j=0; $j < count($alternatif) ; $j++) { 
                if ($i == $jmlKriteria) {
                    break;
                }
                $atributMax[$j] = $alternatif[$j]->$name;
            }
            $max[$i] = max($atributMax);
            $k++;
        }
        return $max;
    }

    // Menghitung Min
    public function calculateMin(alternatif $alternatif, jmlKriteria $jmlKriteria, bobot $bobot) {
        $atributMin = [];
        $min = [];
        $k = 0;
        for ($i=0; $i < count($alternatif) && $k < $jmlKriteria; $i++) { 
            $name = $bobot[$k]->name;
            for ($j=0; $j < count($alternatif) ; $j++) { 
                if ($i == $jmlKriteria) {
                    break;
                }
                $atributMin[$j] = $alternatif[$j]->$name;
            }
            $min[$i] = min($atributMin);
            $k++;
        }
        return $min;
    }

    // Menghitung normalisasi
    public function calculateNormalisasi(alternatif $alternatif, jmlKriteria $jmlKriteria, bobot $bobot, max $max, $min) {
        $l = 0;
        for ($i=0; $i < count($alternatif) && $l < $jmlKriteria; $i++) { 
            $name = $bobot[$l]->name;
            for ($j=0; $j < count($alternatif) ; $j++) { 
                if ($i == $jmlKriteria) {
                    break;
                }
                $alternatif[$j]->$name = ($alternatif[$j]->$name - $min[$i])/($max[$i] - $min[$i]);
            }
            $l++;
        }
        return $alternatif;
    }

    // Menghitung nilai * beban
    public function calculateWeight(alternatif $alternatif, jmlKriteria $jmlKriteria, bobot $bobot) {
        $o = 0;
        for ($i=0; $i < count($alternatif) && $o < $jmlKriteria; $i++) { 
            $name = $bobot[$o]->name;
            for ($j=0; $j < count($alternatif) ; $j++) { 
                if ($i == $jmlKriteria) {
                    break;
                }
                $alternatif[$j]->$name = $alternatif[$j]->$name * ($bobot[$i]->bobot / 100);
            }
            $o++;
        }
            return $alternatif;
    }

    // Menghitung total nilai
    public function calculateTotal(alternatif $alternatif, jmlKriteria $jmlKriteria, bobot $bobot) {
        $total = [];
        for ($i=0; $i < count($alternatif); $i++) {
            $jumlah = 0;
            for ($j=0; $j < count($alternatif) ; $j++) { 
                if ($j == $jmlKriteria) {
                    break;
                }
                $name = $bobot[$j]->name;
                $jumlah += $alternatif[$i]->$name;
            }
            $total[$i] = $jumlah;
        }
            return $total;
    }

    // Menentukan perangkingan
    public function calculateRangking(totalNilai $totalNilai) {
        $totalSementara = rsort($totalNilai);
        $rangking = [];
        for ($i= 0; $i < count($totalSementara); $i++) {
            for ($j= 0; $j < count($totalSementara[$i]); $j++) {
                if ($totalNilai[$i] == $totalSementara[$j]) {
                    $rangking[] = $j + 1;
                    break;
                }
            }
        }
            return $rangking;
    }
}

