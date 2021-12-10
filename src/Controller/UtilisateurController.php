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
        
    }

    public function update() 
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->utilisateurRepository->update($_POST);
        }

        $this->view->render('/user/update');
    }

    public function delete() 
    {
        if ('POST' === $_SERVER['REQUEST_METHOD']) {
            $this->utilisateurRepository->delete($_POST);
        }

        $this->view->render('/user/delete');
    }

    public function read(int $id)
    {
        $utilisateurRepository = new UtilisateurRepository();
        $utilisateur = $utilisateurRepository->getUserId($id);

        var_dump($utilisateur);
    }
}