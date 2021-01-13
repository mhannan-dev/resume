<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Tag extends Model
{
    protected $table = 'tags';
    

    protected $fillable = ['title'];

    public function getCreatedDateAttribute()
    {
        return Carbon::parse( $this->created_at)->diffForHumans();

    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function post(){
        return $this->belongsToMany('App\Post', 'post_tag');
    }
}
