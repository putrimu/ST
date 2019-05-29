<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;

class PemilihanController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function rt(){
        $rt = DB::table('datart')->select('*')->get();
        $return='';
        foreach ($rt as $t) {
            $return.='<h3>'.$t->kode_rt.'</h3>';
            $i=1;
            $return.='<table class="table">';
                $return.='<thead>';
                    $return.='<tr>';
                        $return.='<th scope="col">#</th>';
                        $return.='<th scope="col">Nama</th>';
                        $return.='<th scope="col">Jumlah Suara</th>';
                    $return.='</tr>';
                $return.='</thead>';
                $return.='<tbody>';
                    $calonRT = DB::table('datacalon_rt')->where('id_rt',$t->id)->select('*')->get();
                    foreach ($calonRT as $ct) {
                        $jumlahSuara = DB::table('pemilihan_rt')->where('id_calon_rt',$ct->id)->select('*')->count();
                        $return.='<tr>';
                            $return.='<td scope="row">'.$i++.'</td>';
                            $return.='<td>'.$ct->nama.'</td>';
                            $return.='<td>'.$jumlahSuara.'</td>';
                        $return.='</tr>';
                    }
                $return.='</tbody>';
            $return.='</table>';
        }
        return $return;
    }
    public function rw(){
        $rw = DB::table('datarw')->select('*')->get();
        $return='';
        foreach ($rw as $w) {
            $return.='<h3>'.$w->kode_rw.'</h3>';
            $i=1;
            $return.='<table class="table">';
                $return.='<thead>';
                    $return.='<tr>';
                        $return.='<th scope="col">#</th>';
                        $return.='<th scope="col">Nama</th>';
                        $return.='<th scope="col">Jumlah Suara</th>';
                    $return.='</tr>';
                $return.='</thead>';
                $return.='<tbody>';
                    $calonRW = DB::table('datacalon_rw')->where('id_rw',$w->id)->select('*')->get();
                    foreach ($calonRW as $cw) {
                        $jumlahSuara = DB::table('pemilihan_rw')->where('id_calon_rw',$cw->id)->select('*')->count();
                        $return.='<tr>';
                            $return.='<td scope="row">'.$i++.'</td>';
                            $return.='<td>'.$cw->nama.'</td>';
                            $return.='<td>'.$jumlahSuara.'</td>';
                        $return.='</tr>';
                    }
                $return.='</tbody>';
            $return.='</table>';
        }
        return $return;    
    }
}
