<?php

namespace App;

use App\controller\PostController;

class Router
{
    public function run()
    {
        $route = $_GET['route'] ?? null;
        $action = $_GET['action'] ?? null;

        if (isset($_GET['route'])) {
            if ('post' === $route && $action) {
                $postController = new PostController();

                if ('create' === $action) {
                    return $postController->create();
                } elseif ('read' === $action && isset($_GET['id'])) {
                    var_dump($_GET['id']);die;
                    return $postController->read($_GET['id']);
                }
            } elseif ('contact' === $route) {
                var_dump('contact');
            }
        } else {
            var_dump('hello');
            require_once 'index.php';
        }
    }
}
