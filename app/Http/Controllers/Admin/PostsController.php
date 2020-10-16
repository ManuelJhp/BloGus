<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
    public function index(){

        //Segun el Rol del usuario, solo para usuarios autentificados, dentro del middleware
        $posts = Post::allowed()->get();

        return view('admin.posts.index', compact('posts'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Post);

        $this->validate($request, ['title' => 'required|min:3']);

        $post = Post::create($request->all());

        /* FORMA ANTIGUA
        $post = Post::create([
            'title' => $request->get('title'),
            'user_id' => auth()->id()
        ]); */

        return redirect()->route('admin.posts.edit', $post);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => Tag::all(),
            'categories' => Category::all()
        ]);

        /* //FORMA ANTIGUA
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', compact('categories', 'tags', 'post'));  */
    }

    public function update(Post $post, StorePostRequest $request)
    {
        $this->authorize('update', $post);

        $post->update($request->all());

        $post->syncTags($request->get('tags'));

        return redirect()
                ->route('admin.posts.edit', $post)
                ->with('flash', 'La publicacion ha sido guardada');
    }
    public function destroy(Post $post)
    {
        /* $post->tags()->detach();
        $post->photos->each->delete(); */

        $this->authorize('delete', $post);

        $post->delete();

        return redirect()
                ->route('admin.posts.index')
                ->with('flash', 'La publicacion ha sido eliminada');
    }

  /*   public function store(Request $request){

       $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'excerpt' => 'required'
       ]);

        $post = new Post;
        $post->title = $request->get('title');
        $post->url = str_slug($request->get('title'));
        $post->body = $request->get('body');
        $post->excerpt = $request->get('title');
        $post->published_at = Carbon::parse($request->get('published_at'));
        $post->category_id = $request->get('category');
        //Etiquetas
        $post->save();

        $post->tags()->attach($request->get('tags'));
        return back()->with('flash', 'Tu publicacion ha sido creada');
    } */

}
