<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\seance;

class Repas extends Model
{
    //
    protected $table="repas";
    protected $primaryKey="idRepas";
    protected $fillable=["description","calories"];


    public function repas_seance(){
        return $this->belongsToMany(seance::class,"seance_repas","idSeance","idRepas")->withPivot("quantite_Repas","objectif");
    }
}

