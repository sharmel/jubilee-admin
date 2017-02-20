<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    //

    public function services(){

    	return $this->belongsToMany('App\Service', 'vendor_service');
    }
}
