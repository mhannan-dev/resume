<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    

    protected $fillable = ['title'];

    public function getCreatedDateAttribute()
    {
        return Carbon::parse( $this->created_at)->diffForHumans();

    }

    public function post(){
        return $this->belongsToMany('App\Post', 'post_tag');
    }
}
