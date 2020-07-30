<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

date_default_timezone_set('Asia/Jakarta');

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }
}
