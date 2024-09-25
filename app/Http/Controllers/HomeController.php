<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller {

    // el método invoke puede utilizarse cuando un controlador sólo tiene un método.
    // se manda llamar automáticamente al cargar la ruta del router
    // Muestra en la página principal a los usuarios que sigue en usuario autenticado
    public function __invoke() {

        // Obtener a los usuarios que seguimos
        $ids = auth()->user()->followings->pluck('id')->toArray();
        $posts = Post::whereIn('user_id', $ids)->paginate(10);

       return view('home', [
        'posts' => $posts
       ]);
    }
}
