<?php

namespace App\Http\Controllers;


use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;

        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->tag->all();
    }

    /**
     * Save the new resource.
     *
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail|required|max:50',
        ]);

        return $this->tag->storeTag($request);

    }
}
