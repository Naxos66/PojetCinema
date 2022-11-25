<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    public function films(){
        return $this->belongsTo(Film::class);
    }
    public function salles(){
        return $this->belongsTo(Salle::class);
    }
    public function reservations(){
        return $this->belongsTo(Reservation::class);
    }
}
