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

class pembayaranController extends Controller
{
    // protected $dokum;
    // protected $dekor;

    public function bayarUser($id_pesanan)
	{
        $pesanan = DB::table('pemesanan')->where('id_pesanan',$id_pesanan)->get();
		// $paket = DB::table('paket')->get();
		// $detail_dokum = DB::table('detail_dokum')->get();
        // $detail_dekor = DB::table('detail_dekor')->get();
        // $dokum = DB::table('item_dokum')->get();
        // $dekor = DB::table('dekor')->get();
		return view('user/pembayaran',['pesanan' => $pesanan]);
	}

    public function bayarAdmin($id_pesanan)
	{
        $pesanan = DB::table('pemesanan')->where('id_pesanan',$id_pesanan)->get();
		// $paket = DB::table('paket')->get();
		// $detail_dokum = DB::table('detail_dokum')->get();
        // $detail_dekor = DB::table('detail_dekor')->get();
        // $dokum = DB::table('item_dokum')->get();
        // $dekor = DB::table('dekor')->get();
		return view('admin/pembayaran',['pesanan' => $pesanan]);
	}


    public function store(Request $request)
    {
        $file = $request->file('bukti_bayar');
        $nama_file = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $ukuran_file = $file->getSize();
        $destinationPath = 'bayar';
        $file->move($destinationPath,$file->getClientOriginalName());

        DB::table('pembayaran')->where('id_pesanan',$request->id_pesanan)->update([
	       	'tgl_bayar' => $request->tgl_bayar,
            'bukti_bayar' => $nama_file,
            'status' => "1",
            // 'id_cust' => Auth::user()->id
	    ]);

        DB::table('pemesanan')->where('id_pesanan',$request->id_pesanan)->update([
            'status' => "1"
        ]);
        return redirect('/history');
    }

    public function store2(Request $request)
    {
        $file = $request->file('bukti_bayar');
        $nama_file = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $ukuran_file = $file->getSize();
        $destinationPath = 'bayar';
        $file->move($destinationPath,$file->getClientOriginalName());

        DB::table('pembayaran')->where('id_pesanan',$request->id_pesanan)->update([
	       	'tgl_bayar' => $request->tgl_bayar,
            'bukti_bayar' => $nama_file,
            'status' => "1",
            // 'id_cust' => Auth::user()->id
	    ]);

        DB::table('pemesanan')->where('id_pesanan',$request->id_pesanan)->update([
            'status' => "1"
        ]);
        return redirect('/admin/historyBayar');
    }

    public function indexBayar()
	{
		// memanggil view tambah
		$pemesanan = pemesanan::all();
		$pembayaran = pembayaran::all();
        $User = User::all();
        // return redirect('/history');
		return view('admin/historyBayar',
            compact('pemesanan'),
            compact('pembayaran'),
            compact('User')
        );
        
	}

}