<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{

    protected $table = 'experiences';

    protected $fillable = ['company_name', 'slug','designation'];

    public function setTitleAttribute($value)
    {
        $this->attributes['company_name'] = $value;
        $this->attributes['slug'] = Str::slug($value);

    }

    public function getCreatedDateAttribute()
    {
        return Carbon::parse($this->created_at)->diffForHumans();

    }
}
