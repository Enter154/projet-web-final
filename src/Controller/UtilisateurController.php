<?php

namespace App\controller;

use App\repository\UtilisateurRepository;
use App\View\User;

class UtilisateurController
{
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }
    
    public function create($username)
    {
        /*if (!empty($username)) {
            $utilisateurRepository = new UtilisateurRepository();
            $utilisateurRepository->createUser($username);
            var_dump('Création d\'un utilisateur');
        } else
        {
            var_dump('Echec creation');
        }
        ?>
            <p> Un texte en html </p>
        <?php
        echo $username;*/
        $this->view->render('/User/create');
        
    }

    public function read(int $id)
    {
        $utilisateurRepository = new UtilisateurRepository();
        $utilisateur = $utilisateurRepository->get($id);

        var_dump($utilisateur);
    }
}