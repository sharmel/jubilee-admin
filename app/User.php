<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){

        return $this->belongsTo('App\Role');
    }

    public function isAdmin(){

        if($this->role->name == 'administrator' && $this->is_active){

            return true;
        }

        return false;
    }
    public function owner(){

        return false;
    }
    public static function get_vendor_id(){
        
        $id = DB::table('vendor_contacts')
                    ->where('email', '=', $email)
                    ->get();

        return $id;

    }
}
