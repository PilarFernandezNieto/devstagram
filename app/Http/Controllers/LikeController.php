<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function store(Request $request, Post $post){


       return back();
    }

    public function destroy(Request $request, Post $post){

    }
}
