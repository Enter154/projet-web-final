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

    private function buildObject(array $row): ModelUtilisateur
    {
        $user = new ModelUtilisateur;
        $user->setId((int) $row['idUtilisateur']);
        $user->setUsername($row['username']);

        return $user;
    }

    public function create(array $data = [])
    {
        $result = $this->createQuery("INSERT INTO utilisateur (username) VALUES (:username)", 
        ['username' => $data['username']]);
    }

    public function update(array $data = [])
    {
            $result = $this->createQuery("UPDATE utilisateur SET username = (:username) WHERE idUtilisateur = (:id)", 
        ['username' => $data['username'],
         'id' => $data['id']
    ]);
    }

    public function delete(array $data = [])
    {
            $result = $this->createQuery("DELETE FROM utilisateur WHERE idUtilisateur = (:id)", 
        ['id' => $data['id']
    ]);
    }

}