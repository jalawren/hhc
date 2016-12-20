<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    /**
     * The database table name
     *
     * @var string
     */
    protected $table = 'resources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'url', 'description'
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
     * Get Category details for resource
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\ResourceCategory', 'category_id', 'id');
    }

    /* Store new Blog Post
    *
    * @param $input
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
    */
    public function storeResource($input)
    {
        if($input['name'] != NULL && $input['url'] != NULL)
        {
            $url = $input['url'];

            if(!(starts_with($input['url'], 'http'))) {

                $url = 'http://' . $input['url'];
            }

            $array = [
                'category_id' => $input['category'],
                'name' => $input['name'],
                'description' => $input['description'],
                'url' => $url
            ];

            $this->create($array);

            flash('The resource was created successfully!', 'success');

            return redirect('/resources');
        }
    }

    /**
     * Update the Resource Table
     *
     * @param $input
     * @param $resource
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function updateResource($input, $resource)
    {
        if($input['name'] != NULL && $input['description'] != NULL && $input['url'] != NULL)
        {
            $url = $input['url'];

            if(!(starts_with($input['url'], 'http'))) {

                $url = 'http://' . $input['url'];
            }

            $resource->category_id = $input['category'];
            $resource->name = $input['name'];
            $resource->description = $input['description'];
            $resource->url = $url;

            $resource->save();

            flash('The resource was updated successfully!', 'success');

            return redirect('/resources');
        }
    }

    /**
     * Delete From The Resource Table
     *
     * @param $input
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function deleteResource($input, $id)
    {
        if($input != NULL)
        {
            $name = $input->name;

            $input->delete();

            if($this->find($id) == NULL)
            {
                flash('The blog entry, '. $name .' was deleted successfully!', 'success');

                return redirect('/resources');
            }

            flash('There was a problem deleting the resource, '. $name .' Please try again.', 'danger');

            return redirect(Route::current());
        }

        flash('The resource does not exist', 'warning');

        return redirect('/resources');
    }
}
