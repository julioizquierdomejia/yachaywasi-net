<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    //relacion con el campo de parent_id de la misma tabla
    //Para ver los colegios o directores
    /*public function director(){
        return $this->belongsTo('App\User', 'parent_id');
    }
*/
    //relacion para ver los docentes asociados al director o colegio
    public function docentes(){
        //se necesita indicar la columna parent_id ya que por convencion sería solo ID
        return $this->hasMany('App\User', 'parent_id');
    }

    //Muchos usuarios a Muchos roles
    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    //relaciona un usuario a varios cursos
    /*public function courses(){
        return $this->hasMany(Course::class);
    }*/


    /*muchos a muchos
    public function niveles(){
        return $this->hasMany(Course::class);
    }
    */


    public function levels(){
        return $this->belongsToMany('App\Level', 'course_degree_level_user');
    }

    
    public function degrees(){
        return $this->belongsToMany('App\Degree', 'course_degree_level_user');
    }

    public function courses(){
        return $this->hasMany('App\Course');
    }

    public function authorizeRoles($roles){
        
        
        if ($this->hasAnyRole($roles)) {
            return true;
        }
        abort(401,'no tienes permiso');
        
    }

    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach($roles as $role){
                if ($this->hasRole($role)) {
                    return true;
                }    
            }

        }else{
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role){
        if ($this->roles()->where('name',$role)->first()) {
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'avatar', 'status','parent_id','phone', 'school', 'classroom', 'url_zoom', 'id_zoom', 'clave_zoom', 'title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'status','parent_id',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
