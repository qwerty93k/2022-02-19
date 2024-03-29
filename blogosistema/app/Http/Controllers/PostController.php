<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::sortable()->paginate(15);
        $categories = Category::all();

        return view('post.index', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('post.create', ['posts' => $posts, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

        $post->title = $request->title;
        $post->author_name = $request->author_name;
        $post->content = $request->content;

        //jeigu checkbox pazymetas

        if ($request->new_cat) {

            $category = new Category;

            $category->title = $request->cat_title;
            $category->description = $request->description;
            $category->save();

            $post->category_id = $category->id;
        } else { //checkbox nepazymetas
            $post->category_id = $request->category_id;
        }

        $post->save();

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', ['post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->author_name = $request->author_name;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('success_message', 'Successfully deleted');
    }

    public function indexFilter(Request $request)
    {
        $category_id = $request->category_id;
        $postcategory = Post::orderBy('id', 'asc')->get();

        $posts = Post::where('category_id', '=', $category_id)->paginate(15);
        return view('post.indexfilter', [
            'posts' => $posts,
            'postcategory' => $postcategory
        ]);
    }
}
