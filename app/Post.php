<?php

namespace App;

date_default_timezone_set('Asia/Jakarta');

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'content', 'thumbnail', 'published_at', 'status', 'created_by'];

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTakeImageAttribute()
    {
        return '/storage/' . $this->thumbnail;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
