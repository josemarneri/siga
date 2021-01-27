<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;
use App\Models\Funcionario;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','login', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function roles(){
    	return $this->belongsToMany(\App\Models\Role::class);
    }
    
    public function getFuncionario($iduser){
        $funcionario = Funcionario::where('user_id','=',$iduser)->get()->first();
    	return $funcionario;
    }
    
    public function hasPermission(Permission $permission){
    	return $this->hasAnyRoles($permission->roles);
    }
    
    public function hasAnyRoles($roles){
    	if(is_array($roles) || is_object($roles)){
            return !! $roles->intersect($this->roles)->count();
    	}
    	return $this->roles->contains('name',$roles);
    }
    
    public function getRoles() {
        $roles = DB::table('role_user')
                ->join('roles', function($join){
                    $join->on('role_user.role_id', '=', 'roles.id')
                            ->where('role_user.user_id','=', $this->id)
                            ->select('roles.*');
                })->get();
        return $roles;
    }
    
    public function hasPermissionByName(User $user, $permission){
        $roles = $user->roles()->get();
           foreach($roles as $role){
               $permissions = DB::select('select * from permissions, permission_role'
                   . ' where permissions.id = permission_role.permission_id '
                   . 'and permission_role.role_id = '.$role->id);
               foreach($permissions as $p){
                   if ($p->name === $permission){
                       return true;
                   }
               }
           }
       return false;
    }
}
