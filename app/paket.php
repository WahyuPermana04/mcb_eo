<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    protected $table = "paket";
    protected $primaryKey =  "id_paket";
    protected $fillable = ['id_paket','nama_paket','ket_paket','total_harga'];
    public $incrementing = false;

    public function detail_dokum(){
        return $this->hasMany(detail_dokum::class,'id_paket');
    }
    public function detail_dekor(){
        return $this->hasMany(detail_dekor::class,'id_paket');
    }
    public function pemesanan(){
        return $this->hasMany(pemesanan::class,'id_paket');
    }
}
