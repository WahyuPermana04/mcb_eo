<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\pemesanan;
use App\item_dokum;
use App\dekor;
use App\detail_dokum;
use App\detail_dekor;
use App\paket;
// use Illuminate\Support\Facades\Storage;
// use App\Imports\customerImport;
// use Maatwebsite\Excel\Facades\Excel;

class infoController extends Controller
{
    public function indexDokum(){
        //mengambil data dari tabel customer
        // $item_dokum = DB::table('item_dokum')->get();
        $item_dokum = item_dokum::all();
        // $ddok = DB::table('detail_dokum')->paginate(6);
        $ddok = detail_dokum::all();
        //mengirim data ke view table
        return view('user/item_dokum',
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
        return view('user/dekorasi',
            compact('dekor'),
            compact('ddek'));
    }

    public function indexPaket(){
        //mengambil data dari tabel customer
        // $paket = DB::table('paket')->paginate(6);
        $paket = paket::all();
        //mengirim data ke view table
        return view('user/paket',
        compact('paket'));
    }

}