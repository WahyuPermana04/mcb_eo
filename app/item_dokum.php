<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item_dokum extends Model
{
    protected $table = "item_dokum";
    protected $primaryKey =  "id_item";
    protected $fillable = ['id_item','nama_item','tersedia'];
    public $incrementing = false;

    public function detail_dokum(){
        return $this->hasMany(detail_dokum::class,'id_dokum');
    }
}
