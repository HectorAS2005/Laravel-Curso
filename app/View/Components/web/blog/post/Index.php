<?php

namespace App\View\Components\Web\Blog\Post;

use Illuminate\View\Component;

class Index extends Component
{
    public $posts;

    public function __construct($posts)
    {
        $this->posts = $posts;
    }

    public function render()
    {
        return view('components.web.blog.post.index');
    }
}   