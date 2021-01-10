<?php

namespace App;

use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{

    protected $table = 'posts';

    protected $fillable = ['title', 'body', 'category_id'];

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
        return Carbon::parse($this->created_at)->diffForHumans();

    }

   

    public function category() {
        return $this->belongsTo('App\Category','category_id')->withDefault();
    }

}
