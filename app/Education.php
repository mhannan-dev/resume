<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';
    protected $fillable = ['title','institute_name','started_at','finished_at'];

    public function getCreatedDateAttribute()
    {
        return Carbon::parse( $this->created_at)->diffForHumans();

    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }
}
