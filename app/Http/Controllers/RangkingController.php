<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\HP;
use Illuminate\Http\Request;

class RangkingController extends Controller
{   
    // Mengambil Bobot
    public function index()
    {
        $bobot = Bobot::all();
        $hp = HP::all();
        
        $max =[];

        // normalisasi
        foreach ($bobot as $b) {
            $columname = $b->name;
            $max[$columname] = HP::max($columname);
        }

        // Calculate min values for each criteria
        $min = [];
        foreach ($bobot as $b) {
            $columname = $b->name;
            $min[$columname] = HP::min($columname);
        }
        $normalizedData=[];
        foreach($hp as $h){
            $normalizedData[$h->nama][] = $this->normali($h, $max, $min);
        }
        // @dd($normalizedData);
        $hitungBobot=[];
        foreach($normalizedData as $u){
            // @dd($normalizedData['riza']);
            foreach($u as $k){
                // @dd($k);
                $hitungBobot[] = $this->weight($k,$bobot);
            }
        }
        // @dd($hitungBobot);
        $rankin =[];
        // $sd = array_sum($hitungBobot);
        foreach($hitungBobot as $rank){
            $sum = array_sum($rank);
            $rankin[] = $sum;
        }
        // @dd($hp[0]['nama']);
        // @dd($rankin);
        $hasil=[];
        for($i = 0; $i < count($rankin) ; $i++){

            $hasil [] =[
                'nama'=> $hp[$i]['nama'],
                'hasil'=> $rankin[$i],
            ];
        }
        
        // @dd($hasil);
        // @dd($hitungBobot[0]['harga']);
        // @dd($hasil);
        usort($hasil, function ($a, $b) {
            return $b['hasil'] <=> $a['hasil']; // Compare 'hasil' values in descending order
        });

        foreach ($hasil as $key => $value) {
            $hasil[$key]['rank'] = $key + 1; // Assign rank based on the sorted order
        }
        return view("rangking",[
            "hasil" => $hasil,
        ]);
    }
    public function normali($h,$max,$min){
        $kriteria = Bobot::all();
        $a=[];
        foreach ($kriteria as $k){
        $kr = $k->name;
        $a[$kr] = ($h->$kr-$min[$kr])/($max[$kr]-$min[$kr]);
        // $denominator = $max[$kr] - $min[$kr];
        // $a[$kr] = ($denominator != 0) ? ($h->$kr - $min[$kr]) / $denominator : 0;
        }
        return $a;
    }
   public function weight($h,$bobot){
     $az=[];
    //  @dd($h['harga']);
        foreach ($bobot as $k){
            // @dd($k->name);
            $kriterianame = $k->name;
            // @dd($kriterianame);
            $az[$kriterianame] = $h[$kriterianame]*$k->bobot/100;
        }
    //   @dd($az);
     return $az;
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

