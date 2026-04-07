<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rendezvous extends Model
{
    // Dire à Laravel le vrai nom de la table
    protected $table = 'rendezvous';

    protected $fillable = [
        'user_id',
        'date',
        'heure',
        'type',
        'statut',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}