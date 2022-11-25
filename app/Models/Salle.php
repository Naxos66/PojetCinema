<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'places',
        'cinema_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cinema_id' => 'integer',
    ];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
}
