<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_dokum extends Model
{
    protected $table = "detail_dokum";
    protected $primaryKey =  "id";
    protected $fillable = ['id_dokum','id_paket','harga'];
    public $incrementing = false;

    public function item_dokum(){
        return $this->belongsTo(item_dokum::class,'id_item');
    }
    public function paket(){
        return $this->belongsTo(paket::class,'id_paket');
    }

}
