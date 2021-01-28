<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tools_Software extends Model
{
    protected $table = 'tools__software';
    
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
}
