<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //

    protected $dates = ['date', 'fecha_vencimiento'];

    protected $fillable = [
        'bimester', 'unit', 'name', 'position', 'link_youtube', 'date', 'urldrive', 'urlpdf', 'homework', 'fecha_vencimiento', 'zoom',
    ];

    public function views()
    {
        return $this->hasMany('App\SubjectView', 'subject_id');
    }

    public function user_views()
    {
    	return $this->views()->where('user_id', auth()->id());
    }
}
