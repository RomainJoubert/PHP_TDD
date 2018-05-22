<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'projectName', 'descriptive', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
