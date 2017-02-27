<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;


class Contact extends Model
{
    //

    public $table = 'vendor_contacts';

    public function get_vendor_id($email){

    	$id = DB::table('vendor_contacts')
		            ->where('email', '=', $email)
		            ->value('vendor_id');

    	return $id;
    }


}
