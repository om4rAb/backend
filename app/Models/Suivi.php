<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pack;
use App\Models\Client;

class Suivi extends Model
{
    //
    protected $table="suivi";
    protected $primaryKey="idSuivi";
    protected $fillable=["premierPoids","actuelPoids","dateSuivi"];

    public function suivi_client(){
        return $this->belongsTo(User::class,"idCl");
    }

    public function suivi_pack(){
        return $this->belongsTo(pack::class,"idPack");
    }
}

