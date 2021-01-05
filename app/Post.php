<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{

    protected $table = 'posts';
    

    protected $fillable = ['title', 'body','category_id'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function getUrlAttribute()
    {
        //return route("questions.show", $this->id);
        return route("questions.show", $this->slug);

        
    }
    public function getCreatedDateAttribute()
    {
        //return $this->created_at->diffForHumans();
        return Carbon\Carbon::parse( $this->created_at)->diffForHumans();

    }

    public function categories() {
        return $this->belongsTo('App\Category','category_id')->withDefault();
    }
}
