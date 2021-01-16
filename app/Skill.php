<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Skill extends Model
{
    protected $table = 'skills';

    protected $fillable = ['title', 'slug','choose_platform','expertise_level'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function getCreatedDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();

    }
}
