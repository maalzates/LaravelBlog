<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;





class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        // Si se manda algún archivo por el formulario
        if ($request->file('file')) {
            /* Mueve el archivo de temporales a public/storage/posts y lo almacena en url */
            $url = Storage::put('posts', $request->file('file'));
            /* Obtiene la relación del post con la imagen y guarda la url en el campo url de la tabla images */
            $post->image()->create([
                'url' => $url
            ]);
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        }

        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->all());
        /** Si hay un archivo siendo enviado */
        if ($request->file('file')) {
            /** Recupero la url de la imagen enviada y la guardo en la carpeta posts */
            $url = Storage::put('posts', $request->file('file'));
            /* Si ya existía una imagen en el post*/
            if ($post->image) {
                /* borro la imagen */
                Storage::delete($post->image->url);
                /* Actualiza laimagen */
                $post->image->update([
                    'url' => $url
                ]);
            } else {
                // En caso de que no tenga una imágen, guardo la que he subido.
                $post->image->create([
                    'url' => $url
                ]);
            }
        }
        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }


        return redirect()->route('admin.posts.edit', $post)->with('info', 'El post se actualizó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('info', 'El post se eliminó con éxito');
    }
}
