<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Programme;
use App\Models\Task;
use App\Models\Repas;

class Seance extends Model
{
    //
    protected $table="seance";
    protected $primaryKey="idSeance";
    protected $fillable=["nomSeance"];

    public function seance_programme(){
        return $this->belongsToMany(Programme::class,"seance_programme","idPrg","idSeance")->withPivot("objectif","nbrTask","nbrRepas");
    }

    public function seance_task(){
        return $this->belongsToMany(Task::class,"seance_task","idSeance","idTask")->withPivot("numbre_serie","numbre_Repetition","objectif");
    }

    public function seance_repas(){
        return $this->belongsToMany(Repas::class,"seance_repas","idSeance","idRepas")->withPivot("quantite_Repas","objectif");
    }
}

