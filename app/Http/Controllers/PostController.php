<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller {

    /**
     * Se añade un middleware de autenticación para proteger la url
     * Excepto en los métodos que se especifican que son públicos
     */
    public function __construct() {
        $this->middleware('auth')->except(['show', 'index']);
    }

    public function index(User $user) {

        $posts = Post::where('user_id', $user->id)->paginate(5);
        // Existe la opción de utilizar la colección de posts que va cargada en el usuario gracias a la relación 1:N
        // pero esta opción no admite la paginación en el template

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
        // 1. Insertar registros
        // Post::create([
        //     'titulo' => $request->titulo,
        //     'descripcion' => $request->descripcion,
        //     'imagen' => $request->imagen,
        //     'user_id' => auth()->user()->id
        // ]);


        // 2. Otra forma de crear registros
        // $post = new Post();
        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        // 3. Otra forma de crear regitros usando relaciones
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('posts.index', auth()->user()->username);
    }

    public function show(User $user, Post $post){

        return view('posts.show', [
            'post' => $post
        ]);
    }
}
