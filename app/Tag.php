<?php

namespace App;

date_default_timezone_set('Asia/Jakarta');

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['slug', 'name'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getNameAttribute($name)
    {
        return ucfirst($name);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
