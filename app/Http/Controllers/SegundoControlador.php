<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SegundoControlador extends Controller {
    function index() {
        return view('contact',['name' => 'Hector']);
    }
}
