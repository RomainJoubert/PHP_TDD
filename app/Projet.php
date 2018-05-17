<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'projectName', 'descriptive', 'authorName', 'created_at'
    ];
}
