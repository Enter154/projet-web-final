<?php

namespace App\controller;

use App\repository\UtilisateurRepository;
use App\view\View;

class UtilisateurController
{
    private View $view;
    private UtilisateurRepository $utilisateurRepository;

    public function __construct()
    {
        $this->view = new View();
        $this->utilisateurRepository = new UtilisateurRepository();
    }
    
    public function create()
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->utilisateurRepository->create($_POST);
        }
        $this->view->render('/user/create');
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
        
        
    }

    public function update(int $id) 
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->utilisateurRepository->update($_POST);
        }

        $this->view->render('/user/update', [
            'user' => $this->utilisateurRepository->getUserId($id),
        ]);
    }

    public function read(int $id)
    {
        $utilisateurRepository = new UtilisateurRepository();
        $utilisateur = $utilisateurRepository->get($id);

        var_dump($utilisateur);
    }
}