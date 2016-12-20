<?php

namespace App\Http\Controllers;

use App\Resource;
use App\ResourceCategory;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    protected $resource;

    /**
     * Construct controller with Resource model
     *
     * @param Resource $resource
     */
    public function __construct(Resource $resource)
    {
        $this->middleware('auth')->except('index');

        $this->resource = $resource;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ResourceCategory $category)
    {
        $categories = $category->with('resource')->get();

        return view('resource.index', compact('categories'));
//        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(ResourceCategory $category)
    {
        $categories = $category->all();

        return view('resource.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'url' => 'required|max:255',
        ]);

        return $this->resource->storeResource($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, ResourceCategory $category)
    {
        $resources = $this->resource->find($id);

        $categories = $category->all();

        return view('resource.edit', compact(['resources', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'bail|required|max:255',
            'url' => 'required|max:255'
        ]);

        $resource = $this->resource->find($id);

        return $this->resource->updateResource($request, $resource);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = $this->resource->find($id);

        return $this->resource->deleteResource($input, $id);
    }
}
