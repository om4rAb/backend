<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\seance;

class Task extends Model
{
    //
    protected $table="task";
    protected $primaryKey="idTask";
    protected $fillable=["nomTask","Gr_mesculaire_cibles","description"];

    public function task_seance(){
        return $this->belongsToMany(Seance::class,"seance_task","idSeance","idTask")->withPivot("numbre_serie","numbre_Repetition","objectif");
    }

}

