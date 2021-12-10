<?php

namespace App;

use App\controller\PostController;
use App\controller\UtilisateurController;

class Router
{
    public function run()
    {
        $route = $_GET['route'] ?? null;
        $action = $_GET['action'] ?? null;
        $username = $_GET['username'] ?? null;

        if (isset($_GET['route'])) {
            if ('contact' === $route) {
                var_dump('contact');
            } elseif ('accueil' === $route) {
                var_dump('accueil');
            } elseif ('utilisateur' === $route && $action) {
                $utilisateurController = new UtilisateurController();

                if ('create' === $action) {
                    return $utilisateurController->create();
                } elseif ('read' === $action && isset($_GET['id'])) {
                    var_dump($_GET['id']);die;
                    return $utilisateurController->read($_GET['id']);
                } elseif ('update' === $action && isset($_GET['id'])) {
                    return $utilisateurController->update($_GET['id']);
                }
                
        } else {
            var_dump('hello');
            require_once 'index.php';
        }
    }
}

}
