<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller {


    public function __construct()
    {
        $this->middleware('auth');
    }
    // el método invoke puede utilizarse cuando un controlador sólo tiene un método.
    // se manda llamar automáticamente al cargar la ruta del router
    // Muestra en la página principal a los usuarios que sigue en usuario autenticado
    public function __invoke() {

        // Obtener a los usuarios que seguimos y con sus ids obtenemos sus posts
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->latest()->paginate(10); // o get()

       return view('home', [
        'posts' => $posts
       ]);
    }
}
