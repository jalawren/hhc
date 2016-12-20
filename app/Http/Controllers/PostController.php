<?php

namespace App\Http\Controllers;


use App\PostCategory;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    protected $post;

    /**
     * Construct the controller with the Post model
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->middleware('auth')->except(['index', 'show', 'indexByTag']);

        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->post
            ->with('user', 'tags')
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));


        return view('blog.index', compact('posts'));
    }

    /**
     * Display a listing of the resource filtered by category.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexByTag($slug, Tag $tag)
    {
        $tags = $tag->findPosts($slug);

        $tag_name = $tag->where('slug', $slug)->first();

        $posts = $this->post
            ->with('user', 'tags')
            ->whereIn('id', $tags)
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('blog.tag', compact(['tag_name', 'posts']));

    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return mixed
     */
    public function show($slug)
    {
        $post = $this->post
            ->with('user', 'tags')
            ->whereSlug($slug)
            ->firstOrFail();

        return view('blog.show')->withPost($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(PostCategory $category, Tag $tag)
    {
        $categories = $category->all();

        $tags = $tag->all();

        return view('blog.create', compact(['categories', 'tags']));
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'title' => 'bail|required|max:255',
            'content' => 'required',
        ]);

        return $this->post->storePost($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Tag $tag)
    {
        $posts = $this->post
            ->with('tags')
            ->find($id);

//        $all = $tag->all()->toArray();
//        $my = $posts->tags->toArray();

//        return array_diff($all, $my);
//return $posts;

        return view('blog.edit', compact('posts'));
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
            'title' => 'bail|required|max:255',
            'content' => 'required',
        ]);

        $post = $this->post->find($id);

        return $this->post->updatePost($request, $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = $this->post->find($id);

        return $this->post->deletePost($input, $id);
    }
}
