<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    protected $dates = ['date'];

    protected $fillable = [
        'bimester', 'unit', 'name', 'position', 'link_youtube', 'date',
    ];
}
