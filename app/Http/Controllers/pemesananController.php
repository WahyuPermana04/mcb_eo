<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\item_dokum;
use App\dekor;
use App\detail_dokum;
use App\detail_dekor;
use App\paket;
use App\pemesanan;
use App\pembayaran;
use Illuminate\Database\Eloquent\Collection;
use App\User;
use Auth;

class pemesananController extends Controller
{
    // protected $dokum;
    // protected $dekor;

    public function indexFormPesan()
	{
		// memanggil view tambah
		$pesanan = DB::table('pemesanan')->get();
		$paket = DB::table('paket')->get();
		$detail_dokum = DB::table('detail_dokum')->get();
        $detail_dekor = DB::table('detail_dekor')->get();
        $dokum = DB::table('item_dokum')->get();
        $dekor = DB::table('dekor')->get();
		return view('user/pemesanan',[
            'pesanan' => $pesanan,
            'paket' => $paket,
            'detail_dokum' => $detail_dokum,
            'detail_dekor' => $detail_dekor,
            'dokum' => $dokum,
            'dekor' => $dekor
        ]);
	}

    public function indexFormPesan2()
	{
		// memanggil view tambah
		$pesanan = DB::table('pemesanan')->get();
        $user = DB::table('users')->where('role',NULL)->get();
		$paket = DB::table('paket')->get();
		$detail_dokum = DB::table('detail_dokum')->get();
        $detail_dekor = DB::table('detail_dekor')->get();
        $dokum = DB::table('item_dokum')->get();
        $dekor = DB::table('dekor')->get();
		return view('admin/pemesanan',[
            'pesanan' => $pesanan,
            'paket' => $paket,
            'detail_dokum' => $detail_dokum,
            'detail_dekor' => $detail_dekor,
            'dokum' => $dokum,
            'user' => $user,
            'dekor' => $dekor
        ]);
	}

    public function storefix(Request $request)
	{
		DB::table('pemesanan')->where('id_pesanan',$request->id_pesanan)->update([
            'status' => "3"
        ]);

        // dd($request->id_pesanan);
        $id = pembayaran::select('id_bayar')->orderBy('id_bayar','desc')->first();
        // dd($id);
        if($id == NULL){
            $id_bayar = "LN".date('ym')."01";
            // dd($id_pesanan);
        }
        else{
            $id_bayar = $id->id_bayar;
            // dd($id_pesanan);
            $id_bayar = (int)substr($id_bayar,6);
            // dd($id_pesanan);
            if($id_bayar == "99"){
                $id_bayar = "01";
                // $$id_pesanan = $id_pesanan + 1;
                $id_bayar= "LN".date('ym').($id_bayar);
            }
            else{
                if($id_bayar < 10){
                    // $id_pesanan = (int)substr($id_pesanan,1);
                    $id_bayar = $id_bayar + 1;
                    // $idn = $id_pesanan;
                    $id_bayar= "LN".date('ym')."0".($id_bayar);
                }
                else{
                    $id_bayar = $id_bayar + 1;
                    $id_bayar= "LN".date('ym').($id_bayar);
                }
                // $id_pesanan = $id_pesanan + 1;
                // dd($id_pesanan);
            } 
        }
        DB::table('pembayaran')->insert([
	        'id_bayar' => $id_bayar,
	       	'id_pesanan' => $request->id_pesanan,
            'status' => "0",
            // 'id_cust' => Auth::user()->id
	    ]);

        return redirect('/history');
	}

    public function store(Request $request)
    {
        $id = pemesanan::select('id_pesanan')->orderBy('id_pesanan','desc')->first();
        // dd($id);
        if($id == NULL){
            $id_pesanan = date('ymd')."01";
            // dd($id_pesanan);
        }
        else{
            $id_pesanan = $id->id_pesanan;
            // dd($id_pesanan);
            $id_pesanan = (int)substr($id_pesanan,6);
            // dd($id_pesanan);
            if($id_pesanan == "99"){
                $id_pesanan = "01";
                // $$id_pesanan = $id_pesanan + 1;
                $id_pesanan= date('ymd').($id_pesanan);
            }
            else{
                if($id_pesanan < 10){
                    // $id_pesanan = (int)substr($id_pesanan,1);
                    $id_pesanan = $id_pesanan + 1;
                    // $idn = $id_pesanan;
                    $id_pesanan= date('ymd')."0".($id_pesanan);
                }
                else{
                    $id_pesanan = $id_pesanan + 1;
                    $id_pesanan= date('ymd').($id_pesanan);
                }
                // $id_pesanan = $id_pesanan + 1;
                // dd($id_pesanan);
            }
            
        }
        $id_paket = $request->id_paket;
        // $id_user = Auth::user()->id;
        // dd($id_user);
        if($id_paket=="PCS"){
            $detail_dokum = DB::table('detail_dokum')->get();
            $detail_dekor = DB::table('detail_dekor')->get();
            $dokum = DB::table('item_dokum')->get();
            $dekor = DB::table('dekor')->get();
            DB::table('pemesanan')->insert([
	            'id_pesanan' => $id_pesanan,
	        	'ket_pesanan' => $request->ket_pesanan,
	        	'tgl_mulai' => $request->tgl_mulai,
	        	'tgl_selesai' => $request->tgl_selesai,
                'lokasi' => $request->lokasi,
                'id_paket' => $request->id_paket,
                'status' => "5",
                'id_cust' => Auth::user()->id
	        ]);
            $pesan = pemesanan::find($id_pesanan);
            return view('user/customPesan',[
                'detail_dokum' => $detail_dokum,
                'detail_dekor' => $detail_dekor,
                'dokum' => $dokum,
                'dekor' => $dekor,
                'pesan' => $pesan]);
        }
        else{
            // insert data ke table
            $harga = paket::find($request->id_paket);
	        DB::table('pemesanan')->insert([
	            'id_pesanan' => $id_pesanan,
	        	'ket_pesanan' => $request->ket_pesanan,
	        	'tgl_mulai' => $request->tgl_mulai,
	        	'tgl_selesai' => $request->tgl_selesai,
                'lokasi' => $request->lokasi,
                'id_paket' => $request->id_paket,
                'status' => "4",
                'total_harga' => $harga->total_harga,
                'id_cust' => Auth::user()->id
	        ]);
	        // alihkan halaman ke halaman
	        // return redirect('/formPesan');
            $rekap = pemesanan::find($id_pesanan);
            $paket = DB::table('paket')->get();
            return view('user/rekapPesan',[
                'rekap' => $rekap,
                'paket' => $paket]);

        }
    }

    public function storeCS(Request $request)
    {
        $total=0;
        $ket = null;
        if($request->dekor == null){
            for($i=0; $i<count($request->dokum);$i++){
                $dok = DB::table('detail_dokum')->where('id_item', $request->dokum[$i])->first();
                $hitung = $dok->harga;
                $total = $total + $hitung;
                $doku = DB::table('item_dokum')->where('id_item', $request->dokum[$i])->first();
                $barang = $doku->nama_item;
                $ket = $ket.', '.$barang; //buat ambil data
                // $this->dokum[$i] = $request->dokum[$i]; 
            }
        }
        elseif($request->dokum == null) {
            for($i=0; $i<count($request->dekor);$i++){
                $dek = DB::table('detail_dekor')->where('id_dekor', $request->dekor[$i])->first();
                $hitung = $dek->harga;
                $total = $total + $hitung;
                $deko = DB::table('dekor')->where('id_dekor', $request->dekor[$i])->first();
                $barang = $deko->nama_dekor;
                $ket = $ket.', '.$barang;
                // $this->dekor[$i] = $request->dekor[$i];
            } 
        }
        else{
            for($i=0; $i<count($request->dekor);$i++){
                $dek = DB::table('detail_dekor')->where('id_dekor', $request->dekor[$i])->first();
                $hitung = $dek->harga;
                $total = $total + $hitung;
                $deko = DB::table('dekor')->where('id_dekor', $request->dekor[$i])->first();
                $barang = $deko->nama_dekor;
                $ket = $ket.', '.$barang;
                // $this->dekor[$i] = $request->dekor[$i];  
            }
            for($i=0; $i<count($request->dokum);$i++){
                $dok = DB::table('detail_dokum')->where('id_item', $request->dokum[$i])->first();
                $hitung = $dok->harga;
                $total = $total + $hitung;
                $doku = DB::table('item_dokum')->where('id_item', $request->dokum[$i])->first();
                $barang = $doku->nama_item;
                $ket = $ket.', '.$barang;
                // $this->dokum[$i] = $request->dokum[$i]; 
            } 
        }
        // update data
        $tket = DB::table('pemesanan')->where('id_pesanan', $request->id_pesan)->first();
        $ket = $tket->ket_pesanan.'('.$ket.')';
	    DB::table('pemesanan')->where('id_pesanan',$request->id_pesan)->update([
		//'id_rekam_medis' => $request->id_rekam_medis,
		    'total_harga' => $total,
            'ket_pesanan' => $ket,
		    'status' => "4"
        ]);
        $rekap = pemesanan::find($request->id_pesan);
        $paket = DB::table('paket')->get();
        return view('user/rekapPesan',[
            'rekap' => $rekap,
            'paket' => $paket]);
    }

    public function storefix2(Request $request)
	{
		DB::table('pemesanan')->where('id_pesanan',$request->id_pesanan)->update([
            'status' => "3"
        ]);
        // dd($request->id_pesanan);
        $id = pembayaran::select('id_bayar')->orderBy('id_bayar','desc')->first();
        // dd($id);
        if($id == NULL){
            $id_bayar = "LN".date('ym')."01";
            // dd($id_pesanan);
        }
        else{
            $id_bayar = $id->id_bayar;
            // dd($id_pesanan);
            $id_bayar = (int)substr($id_bayar,6);
            // dd($id_pesanan);
            if($id_bayar == "99"){
                $id_bayar = "01";
                // $$id_pesanan = $id_pesanan + 1;
                $id_bayar= "LN".date('ym').($id_bayar);
            }
            else{
                if($id_bayar < 10){
                    // $id_pesanan = (int)substr($id_pesanan,1);
                    $id_bayar = $id_bayar + 1;
                    // $idn = $id_pesanan;
                    $id_bayar= "LN".date('ym')."0".($id_bayar);
                }
                else{
                    $id_bayar = $id_bayar + 1;
                    $id_bayar= "LN".date('ym').($id_bayar);
                }
                // $id_pesanan = $id_pesanan + 1;
                // dd($id_pesanan);
            } 
        }
        DB::table('pembayaran')->insert([
	        'id_bayar' => $id_bayar,
	       	'id_pesanan' => $request->id_pesanan,
            'status' => "0",
            // 'id_cust' => Auth::user()->id
	    ]);
        return redirect('/admin/pesan');
	}

    public function store2(Request $request)
    {
        $id = pemesanan::select('id_pesanan')->orderBy('id_pesanan','desc')->first();
        // dd($id);
        if($id == NULL){
            $id_pesanan = date('ymd')."01";
            // dd($id_pesanan);
        }
        else{
            $id_pesanan = $id->id_pesanan;
            // dd($id_pesanan);
            $id_pesanan = (int)substr($id_pesanan,6);
            // dd($id_pesanan);
            if($id_pesanan == "99"){
                $id_pesanan = "01";
                // $$id_pesanan = $id_pesanan + 1;
                $id_pesanan= date('ymd').($id_pesanan);
            }
            else{
                if($id_pesanan < 10){
                    // $id_pesanan = (int)substr($id_pesanan,1);
                    $id_pesanan = $id_pesanan + 1;
                    // $idn = $id_pesanan;
                    $id_pesanan= date('ymd')."0".($id_pesanan);
                }
                else{
                    $id_pesanan = $id_pesanan + 1;
                    $id_pesanan= date('ymd').($id_pesanan);
                }
                // $id_pesanan = $id_pesanan + 1;
                // dd($id_pesanan);
            }
            
        }
        $id_paket = $request->id_paket;
        // $id_user = Auth::user()->id;
        // dd($id_user);
        if($id_paket=="PCS"){
            $detail_dokum = DB::table('detail_dokum')->get();
            $detail_dekor = DB::table('detail_dekor')->get();
            $dokum = DB::table('item_dokum')->get();
            $dekor = DB::table('dekor')->get();
            DB::table('pemesanan')->insert([
	            'id_pesanan' => $id_pesanan,
	        	'ket_pesanan' => $request->ket_pesanan,
	        	'tgl_mulai' => $request->tgl_mulai,
	        	'tgl_selesai' => $request->tgl_selesai,
                'lokasi' => $request->lokasi,
                'id_paket' => $request->id_paket,
                'status' => "5",
                'id_cust' => $request->id_user
	        ]);
            $pesan = pemesanan::find($id_pesanan);
            return view('admin/customPesan',[
                'detail_dokum' => $detail_dokum,
                'detail_dekor' => $detail_dekor,
                'dokum' => $dokum,
                'dekor' => $dekor,
                'pesan' => $pesan]);
        }
        else{
            // insert data ke table
            $harga = paket::find($request->id_paket);
	        DB::table('pemesanan')->insert([
	            'id_pesanan' => $id_pesanan,
	        	'ket_pesanan' => $request->ket_pesanan,
	        	'tgl_mulai' => $request->tgl_mulai,
	        	'tgl_selesai' => $request->tgl_selesai,
                'lokasi' => $request->lokasi,
                'id_paket' => $request->id_paket,
                'status' => "4",
                'total_harga' => $harga->total_harga,
                'id_cust' => $request->id_user
	        ]);
	        // alihkan halaman ke halaman
	        // return redirect('/formPesan');
            $rekap = pemesanan::find($id_pesanan);
            $paket = DB::table('paket')->get();
            return view('admin/rekapPesan',[
                'rekap' => $rekap,
                'paket' => $paket]);

        }
    }

    public function storeCS2(Request $request)
    {
        $total=0;
        $ket = null;
        if($request->dekor == null){
            for($i=0; $i<count($request->dokum);$i++){
                $dok = DB::table('detail_dokum')->where('id_item', $request->dokum[$i])->first();
                $hitung = $dok->harga;
                $total = $total + $hitung;
                $doku = DB::table('item_dokum')->where('id_item', $request->dokum[$i])->first();
                $barang = $doku->nama_item;
                $ket = $ket.', '.$barang; //buat ambil data
                // $this->dokum[$i] = $request->dokum[$i]; 
            }
        }
        elseif($request->dokum == null) {
            for($i=0; $i<count($request->dekor);$i++){
                $dek = DB::table('detail_dekor')->where('id_dekor', $request->dekor[$i])->first();
                $hitung = $dek->harga;
                $total = $total + $hitung;
                $deko = DB::table('dekor')->where('id_dekor', $request->dekor[$i])->first();
                $barang = $deko->nama_dekor;
                $ket = $ket.', '.$barang;
                // $this->dekor[$i] = $request->dekor[$i];
            } 
        }
        else{
            for($i=0; $i<count($request->dekor);$i++){
                $dek = DB::table('detail_dekor')->where('id_dekor', $request->dekor[$i])->first();
                $hitung = $dek->harga;
                $total = $total + $hitung;
                $deko = DB::table('dekor')->where('id_dekor', $request->dekor[$i])->first();
                $barang = $deko->nama_dekor;
                $ket = $ket.', '.$barang;
                // $this->dekor[$i] = $request->dekor[$i];  
            }
            for($i=0; $i<count($request->dokum);$i++){
                $dok = DB::table('detail_dokum')->where('id_item', $request->dokum[$i])->first();
                $hitung = $dok->harga;
                $total = $total + $hitung;
                $doku = DB::table('item_dokum')->where('id_item', $request->dokum[$i])->first();
                $barang = $doku->nama_item;
                $ket = $ket.', '.$barang;
                // $this->dokum[$i] = $request->dokum[$i]; 
            } 
        }
        // update data
        $tket = DB::table('pemesanan')->where('id_pesanan', $request->id_pesan)->first();
        $ket = $tket->ket_pesanan.'('.$ket.')';
	    DB::table('pemesanan')->where('id_pesanan',$request->id_pesan)->update([
		//'id_rekam_medis' => $request->id_rekam_medis,
		    'total_harga' => $total,
            'ket_pesanan' => $ket,
		    'status' => "4"
        ]);
        $rekap = pemesanan::find($request->id_pesan);
        $paket = DB::table('paket')->get();
        return view('admin/rekapPesan',[
            'rekap' => $rekap,
            'paket' => $paket]);
    }

    public function historyPesan()
	{
        // $id_user = new Post;
        $id_user = Auth::user()->id;
        // dd($id_user);
		// $pesanan = DB::table('pemesanan')->where('id_cust', "=", $id_user, 'and', 'status', '!=', 4, 'and', 'status', '!=', 5)->orderBy('tgl_mulai', 'desc')->get();
        $pemesanan = pemesanan::where('id_cust', "=", $id_user, 'and', 'status', '!=', 4, 'and', 'status', '!=', 5)->orderBy('tgl_mulai', 'desc')->get();
        // dd($pesanan);
		$paket = paket::all();
        // $pembayaran = pembayaran::all();
        $User = User::all();
		return view('user/historyPesan',
            compact('pemesanan'),
            compact('paket'),
            compact('User'));
        
	}

    
    public function adminPesanan()
    {
        $pesanan = pemesanan::orderBy('id_pesanan','desc')->get();
        $paket = paket::all();
        $User = User::all();
        //mengirim data ke view table
        return view('admin/pesanan',
            compact('pesanan'),
            compact('paket'),
            compact('User'));
    }

    public function setujuPesanan($id_pesanan)
    {
        $pesanan = pemesanan::find($id_pesanan);
        $pesanan->status = "2";
        $pesanan->save();
        return redirect('/admin/pesan');
    }
    public function tolakPesanan($id_pesanan)
    {
        $pesanan = pemesanan::find($id_pesanan);
        $pesanan->status = "6";
        $pesanan->save();
        return redirect('/admin/pesan');
    }

}