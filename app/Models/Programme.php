<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pack;
use App\Models\seance;
class Programme extends Model
{
    //
    protected $table="programme";
    protected $primaryKey="idPrg";
    protected $fillable=["nomprg","poidsPrg","objectifPrg"];

    public function programme_pack(){
        return $this->belongsToMany(Pack::class,"genreprg","idPrg","idPack")->withPivot("objectif");
    }

    public function programme_seance(){
        return $this->belongsToMany(seance::class,"seance_programme","idPrg","idSeance")->withPivot("objectif","nbrTask","nbrRepas");
    }

    
}
