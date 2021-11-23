<?php

namespace App\controller;

use App\repository\PostRepository;

class PostController
{
    public function create()
    {
        var_dump('Création d\'un post');
    }

    public function read(int $id)
    {
        $postRepository = new PostRepository();
        $post = $postRepository->get($id);

        var_dump($post);
    }
}