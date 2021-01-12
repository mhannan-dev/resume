<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{

    protected $table = 'categories';
    

    protected $fillable = ['title','slug'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }


    public function getCreatedDateAttribute()
    {
        return Carbon::parse( $this->created_at)->diffForHumans();

    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
