<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The database table name
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * Dates variable
     *
     * @var array
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'category_id',
        'user_id',
        'title',
        'content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',

    ];

    /**
     * Set the name of the Post Slug
     *
     * @param $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (! $this->exists) {

            $this->attributes['slug'] = str_slug(date('Y-m-d') .'-'. $value);
        }
    }

    /**
     * Get User details for blog post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Get Category details for blog post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\PostCategory', 'category_id', 'id');
    }

    /**
     * Get Tags for Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }


    /**
     * Store new Blog Post
     *
     * @param $input
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storePost($input)
    {
        if($input['title'] != NULL && $input['content'] != NULL)
        {
            $array = [
                'user_id' => Auth::id(),
                'title' => $input['title'],
                'content' => $input['content']
            ];

            $this->create($array);

            $record = $this->latest()->first();

            foreach($input['tags'] as $tag)
            {

                $record->tags()->attach($tag);
            }

            flash('The blog entry posted successfully!', 'success');

            return redirect('/blog');
        }
    }


    /**
     * Update the Post Table
     *
     * @param $input
     * @param $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updatePost($input, $post)
    {
        if($input['title'] != NULL && $input['content'] != NULL)
        {
            $tags = [];

            foreach($input['tags'] as $tag)
            {
                array_push($tags, $tag);
            }

            $post->user_id = Auth::id();
            $post->title = $input['title'];
            $post->content = $input['content'];

            $post->tags()->sync($tags);

            $post->save();

            flash('The blog entry was updated successfully!', 'success');

            return redirect('/blog/' . $post->slug);
        }
    }

    /**
     * Delete From The Post Table
     *
     * @param $input
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deletePost($post, $id)
    {
        if($post != NULL)
        {
            $name = $post->slug;

            $post->tags()->detach();

            $post->delete();

            if($this->find($id) == NULL)
            {
                flash('The blog entry, '. $name .' was deleted successfully!', 'success');

                return redirect('/blog');
            }

            flash('There was a problem deleting blog entry, '. $name .' Please try again.', 'danger');

            return redirect(Route::current());
        }

        flash('The blog entry does not exist', 'warning');

        return redirect('/blog');
    }

}
