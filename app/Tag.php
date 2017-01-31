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
        'title',
        'slug'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'pivot',
        'posts'
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
     * Store new Tag
     *
     * @param $input
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeTag($input)
    {
        if($input['title'] != NULL)
        {
            $array = [

                'title' => $input['title'],
            ];

            $this->create($array);

        }
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


    /**
     * Get the tags for a given post
     *
     * @param $id
     * @return mixed
     */
    public function updateTags($id)
    {
        $tags = $this->findTagsByPost($id);

        $my_tags = $this->checked($tags);

        $no_tags = $this->unchecked($tags);

        $output = $this->combineTags($my_tags, $no_tags);

        return $output;
    }

    /**
     * Find tags for a given post and output to flat array
     *
     * @param $id
     * @return array
     */
    protected function findTagsByPost($id)
    {
        $tags = Post::find($id)
            ->tags()
            ->select('id')
            ->get()
            ->toArray();

        $output = [];

        foreach ($tags as $tag) {

            array_push($output, $tag['id']);
        }

        return $output;
    }

    /**
     * Combine the arrays of tags with checked attribute
     *
     * @param $my_tags
     * @param $no_tags
     * @return array
     */
    protected function combineTags($my_tags, $no_tags)
    {
        $tags = [];

        foreach($my_tags as $my)
        {
            $array = [
                'id' => $my['id'],
                'slug' => $my['slug'],
                'title' => $my['title'],
                'checked' => 'checked'
            ];

            array_push($tags, $array);
        }

        foreach($no_tags as $no)
        {
            $array = [
                'id' => $no['id'],
                'slug' => $no['slug'],
                'title' => $no['title'],
                'checked' => ''
            ];

            array_push($tags, $array);
        }

        return array_values(array_sort($tags, function ($value) {
            return $value['id'];
        }));

//        return $output;
    }

    /**
     * Find checked tags
     *
     * @param $array
     * @return mixed
     */
    protected function checked($array)
    {
        return $this
            ->whereIn('id', $array)
            ->get()
            ->toArray();
    }

    /**
     * Find unchecked tags
     *
     * @param $array
     * @return mixed
     */
    protected function unchecked($array)
    {
        return $this
            ->whereNotIn('id', $array)
            ->get()
            ->toArray();
    }
}
