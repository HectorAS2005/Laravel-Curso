<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrimerControlador extends Controller {
    function index() {
        $posts = ['post1', 'post2'];
        return view('contact', compact('posts'));
    }

    function otro($post, $otro) {
        echo $post;
        echo $otro;
    }
}
