<?php

namespace App\Models;
use App\Models\Client;
use App\Models\Suivi;
use App\Models\Programme;
use App\Models\Promotion;


use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    //
    protected $table="pack";
    protected $primaryKey="idPack";
    protected $fillable=["nomPack","descriptionPack","prixPack","dureePack"];

    public function pack_client(){
        return $this->belongsToMany(User::class,"planif","idCl","idPack")->withPivot("dateFin");
    }

    public function pack_suivi(){
        return $this->belongsTo(Suivi::class,"idPack");
    }

    public function pack_programme(){
        return $this->belongsToMany(Programme::class,"genreprg","idPrg","idPack")->withPivot("objectif");
    }

    public function pack_promotion(){
        return $this->belongsToMany(Promotion::class,"promo_pack","idPack","idProm");
    }

}

