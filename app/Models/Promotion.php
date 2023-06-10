<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pack;

class Promotion extends Model
{
    //
    protected $table="promotion";
    protected $primaryKey="idProm";
    protected $fillable=["porcentageProm","dateDubutProm","dateFinProm"];


    public function promotion_pack(){
        return $this->belongsToMany(pack::class,"promo_pack","idPack","idProm");
    }
}

