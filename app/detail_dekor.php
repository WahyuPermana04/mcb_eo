<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_dekor extends Model
{
    protected $table = "detail_dekor";
    protected $primaryKey =  "id";
    protected $fillable = ['id_dekor','id_paket','harga'];
    public $incrementing = false;

    public function dekor(){
        return $this->belongsTo(dekor::class,'id_dekor');
    }
    public function paket(){
        return $this->belongsTo(paket::class,'id_paket');
    }

}
