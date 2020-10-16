<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        //El metodo load ejecuta la relacion del modelo que queramos
        //return $category->load('posts');

        //Array independiente
        //$posts = $category->posts;

        $posts = $category->posts()->published()->paginate(5);

        if (request()->wantsJson())
        {
            return $posts;
        }

        return view('pages.home', [
            'title' => "Publicaciones de la categoria '$category->name' ",
            'posts' => $posts
        ]);
    }
}
