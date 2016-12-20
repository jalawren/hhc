<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The database table name
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    /**
     * Set the name of the  Slug
     *
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {

            $this->attributes['slug'] = str_slug($value);
        }
    }

    /**
     * Get Posts for Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }


    /**
     * Get the posts the have the given tag.
     *
     * @param $slug
     * @return array
     */
    public function findPosts($slug)
    {
        $tags = $this
            ->with('posts.user')
            ->whereSlug($slug)
            ->first();

        $array = [];

        foreach($tags->posts as $post)
        {
            array_push($array, $post->id);
        }

        return $array;
    }
}
