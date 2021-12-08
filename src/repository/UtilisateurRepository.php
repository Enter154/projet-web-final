<?php

namespace App\repository;

use App\Database;
use App\model\Utilisateur as ModelUtilisateur;

class UtilisateurRepository extends Database
{
    public function getUser()
    {
        $connection = (new Database())->getConnection();

        return $connection->query('SELECT * FROM utilisateur');
    }

    public function getUserId(int $id)
    {
        $result = $this->createQuery(
            'SELECT * FROM utilisateur WHERE idUtilisateur = :Id',
            ['Id' => $id]
        );
        
        return $this->buildObject($result->fetch());
    }

    private function buildObject(array $row): ModelPost
    {
        $user = new ModelUtilisateur;
        $user->setId((int) $row['idUtilisateur']);
        $user->setUsername($row['title']);

        return $user;
    }

    public function createUser($username)
    {
        $result = $this->createQuery("INSERT INTO utilisateur (username) VALUES (:username)", 
        ['username' => $username]);
    }
}