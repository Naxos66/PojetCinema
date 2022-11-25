<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friandise extends Model
{
    use HasFactory;

    public function salles(){
        return $this->belongsTo(Salle::class);
    }
    public function cinemas(){
        return $this->belongsToMany(Cinema::class);
    }
    public function reservations(){
        return $this->belongsToMany(Reservation::class);
    }
}
