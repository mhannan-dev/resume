<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['category_id', 'title', 'body', 'url','image'];

}
