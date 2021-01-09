<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     protected $table = 'contacts';
    

    protected $fillable = ['full_name', 'mobile_no','subject','message'];
}
