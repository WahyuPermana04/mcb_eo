<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = "pembayaran";
    protected $primaryKey =  "id_bayar";
    protected $fillable = ['id_bayar','total_bayar','tgl_bayar','bukti_bayar','id_pesanan','status'];
    public $incrementing = false;

    public function pemesanan(){
        return $this->belongsTo(pemesanan::class,'id_pesanan');
    }

}
