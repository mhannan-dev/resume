<?php

namespace App;

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;



class Post extends Model
{
    


    protected $table = 'posts';

    protected $fillable = ['title', 'body', 'category_id','tag_id'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function getCreatedDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }


    public function category() {
        return $this->belongsTo('App\Category','category_id')->withDefault();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag');  
    }

}
