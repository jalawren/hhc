<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResourceCategory extends Model
{
    /**
     * The database table name
     *
     * @var string
     */
    protected $table = 'resource_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
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
     * Get the resources for the specified category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Resource()
    {
        return $this->hasMany('App\Resource');
    }
}
