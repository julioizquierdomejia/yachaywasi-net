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
        $roles = auth()->user()->roles->first();
        $role = '';
        if ($roles) {
            $role = $roles->name;
        }
        if ($role == 'lector') {
            return $this->views()->where('user_id', auth()->id());
        } else {
            return $this->views();
        }
    }
}
