<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\item_dokum;
use App\dekor;
use App\detail_dokum;
use App\detail_dekor;
use App\paket;
use App\User;
use App\pemesanan;
use Illuminate\Database\Eloquent\Collection;
// use Illuminate\Support\Facades\Storage;
// use App\Imports\customerImport;
// use Maatwebsite\Excel\Facades\Excel;

class crudController extends Controller
{
    public function kalenderAdmin(){
        $pesanan = pemesanan::where('status', '<', 3)->get();
        $User = User::all();
        //mengirim data ke view table
        return view('admin/utama',
            compact('pesanan'),
            compact('User'));
    }

    public function indexDokum(){
        //mengambil data dari tabel customer
        // $item_dokum = DB::table('item_dokum')->get();
        $item_dokum = item_dokum::all();
        // $ddok = DB::table('detail_dokum')->paginate(6);
        $ddok = detail_dokum::all();
        //mengirim data ke view table
        return view('admin/item_dokum',
            compact('item_dokum'),
            compact('ddok'));
    }

    public function indexDekor(){
        //mengambil data dari tabel customer
        // $dekor = DB::table('dekor')->paginate(6);
        $dekor = dekor::all();
        // $ddek = DB::table('detail_dekor')->get();
        $ddek = detail_dekor::all();
        //mengirim data ke view table
        return view('admin/dekorasi',
            compact('dekor'),
            compact('ddek'));
    }

    public function storeDekor(Request $request)
    {
	// insert data ke table
	DB::table('dekor')->insert([
		'id_dekor' => $request->id_dekor,
		'nama_dekor' => $request->nama_dekor,
		'ket_dekor' => $request->ket_dekor
	]);
    DB::table('detail_dekor')->insert([
		// 'id' => $request->id_pasien,
		'id_paket' => "PCS",
		'id_dekor' => $request->id_dekor,
        'harga' => $request->harga
	]);
	// alihkan halaman ke halaman
	return redirect('/admin/dekor');
    }

    public function storeDokum(Request $request)
    {
	// insert data ke table
	DB::table('item_dokum')->insert([
		'id_item' => $request->id_item,
		'nama_item' => $request->nama_item,
		'tersedia' => $request->tersedia
	]);
    DB::table('detail_dokum')->insert([
		// 'id' => $request->id_pasien,
		'id_paket' => "PCS",
		'id_item' => $request->id_item,
        'harga' => $request->harga
	]);
	// alihkan halaman ke halaman
	return redirect('/admin/item_dokum');
    }

}