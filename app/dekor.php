<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dekor extends Model
{
    protected $table = "dekor";
    protected $primaryKey =  "id_dekor";
    protected $fillable = ['id_dekor','nama_dekor','ket_dekor'];
    public $incrementing = false;

    public function detail_dekor(){
        return $this->hasMany(detail_dekor::class,'id_dekor');
    }
}
