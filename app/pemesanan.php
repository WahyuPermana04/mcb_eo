<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    protected $table = "pemesanan";
    protected $primaryKey =  "id_pesanan";
    protected $fillable = ['id_pesanan','ket_pesanan','tgl_mulai','tgl_selesai','lokasi','status','id_paket','total_harga', 'id_cust'];
    public $incrementing = false;

    public function paket(){
        return $this->belongsTo(paket::class,'id_paket');
    }
    public function User(){
        return $this->belongsTo(User::class,'id_cust');
    }
    public function pembayaran(){
        return $this->hasMany(pembayaran::class,'id_pesanan');
    }

}
