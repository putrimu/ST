<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use Illuminate\Http\Request;

class WelcomeController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function redirect(){
    	return redirect('/'.rand(1111,9999));
    }
    public function index($id){
    	$login = DB::table('login')->select('*')->where('kode_web',$id)->get();
    	$login=end(end($login));
    	$pemilih = DB::table('datawarga')->select('*')->where('id',$login->id_warga)->get();
    	$data=array();
    	$data['success']=false;
    	if(count($pemilih) > 0){
	    	$data['success']=true;
	    	$data['pemilih']=end(end($pemilih));
	    	
	    	$rt = DB::table('datart')->select('*')->where('id',$login->id_warga)->get();
	    	$rt=end(end($rt));
	    	$data['rt']=$rt;

	    	$calonrt = DB::table('datacalon_rt')->select('*')->where('id_rt',$rt->id)->get();
	    	$calonrt=end($calonrt);
	    	$data['calonrt']=$calonrt;

	    	$calonrw = DB::table('datacalon_rw')->select('*')->where('id_rw',$rt->id_rw)->get();
	    	$calonrw=end($calonrw);
	    	$data['calonrw']=$calonrw;
    	}
	    return view('welcome')
		    ->with('idweb',$id)
		    ->with('data',$data);
    }
    public function pilih(Request $request,$id){
    	$login = DB::table('login')->select('*')->where('kode_web',$id)->get();
    	$login=end(end($login));
    	$pemilih = DB::table('datawarga')->select('*')->where('id',$login->id_warga)->get();
    	$pemilih = end(end($pemilih));
    	
    	$cekMilihRT = DB::table('pemilihan_rt')->select('*')->where('signature',md5($pemilih->id))->get();
    	$cekMilihRW = DB::table('pemilihan_rw')->select('*')->where('signature',md5($pemilih->id))->get();

    	if(count($cekMilihRW) == 0 and count($cekMilihRT) == 0){		
	    	$simpanRT=array();
	    	$simpanRT['signature']=md5($pemilih->id);
	    	$simpanRT['id_calon_rT']=$request->input('calonrt');

	    	$simpanRW=array();
	    	$simpanRW['signature']=md5($pemilih->id);
	    	$simpanRW['id_calon_rw']=$request->input('calonrw');
    		
    		$cekMilihRT = DB::table('pemilihan_rw')->insert($simpanRW);
    		$cekMilihRW = DB::table('pemilihan_rt')->insert($simpanRT);

    		$login = DB::table('login')->select('*')->where('kode_web',$id)->delete();
    		return redirect('success?pesan=Anda Berhasil Memilih');
    	}
    	else {
    		return redirect('success?pesan=Anda Sudah Pernah Memilih Sebelumnya');
    	}
    }
    public function success(){
    	return view('success');
    }
}
