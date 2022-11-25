<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'quantity',
        'total_price',
        'date_order',
        'email',
        'phone',
        'seance_id',
        'user_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'total_price' => 'decimal:2',
        'date_order' => 'datetime',
        'seance_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function friandises()
    {
        return $this->belongsToMany(Friandise::class);
    }

    public function seance()
    {
        return $this->belongsTo(Seance::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
