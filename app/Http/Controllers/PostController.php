<?php

namespace App\Http\Controllers;


use App\PostCategory;
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
        $this->middleware('auth')->except(['index', 'show']);

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
            ->with('user', 'category')
            ->where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('blog.posts_per_page'));

        return view('blog.index', compact('posts'));
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
            ->with('user', 'category')
            ->whereSlug($slug)
            ->firstOrFail();

        return view('blog.show')
            ->withPost($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(PostCategory $category)
    {
        $categories = $category->all();

        return view('blog.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if($input['title'] != NULL && $input['content'] != NULL)
        {
            $array = [
                'user_id' => Auth::id(),
                'category_id' => $input['category'],
                'title' => $input['title'],
                'content' => $input['content']
            ];

            $this->post->create($array);

            flash('The blog entry posted successfully!', 'success');

            return redirect('/blog');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, PostCategory $category)
    {
        $posts = $this->post->find($id);

        $categories = $category->all();

        return view('blog.edit', compact(['posts', 'categories']));
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
        //
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

        if($this->post->find($id) != NULL)
        {
            $name = $input->slug;

            $input->delete();

            if($this->post->find($id) == NULL)
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
