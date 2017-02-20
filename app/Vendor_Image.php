<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_Image extends Model
{
    //
    public $table = 'vendor_image';

    protected $fillable = ['vendor_id','image_path'];
}
