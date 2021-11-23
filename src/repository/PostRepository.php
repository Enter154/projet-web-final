<?php

namespace App\repository;

use App\Database;
use App\model\Post as ModelPost;

class PostRepository extends Database
{
    public function getPosts()
    {
        $connection = (new Database())->getConnection();

        return $connection->query('SELECT * FROM post');
    }

    public function get(int $id)
    {
        $result = $this->createQuery(
            'SELECT * FROM post WHERE id = :postId',
            ['postId' => $id]
        );
        
        return $this->buildObject($result->fetch());
    }

    private function buildObject(array $row): ModelPost
    {
        $post = new ModelPost;
        $post->setId((int) $row['id']);
        $post->setTitle($row['title']);
        $post->setContent($row['content']);
        $post->setCreatedAt(new \DateTime($row['createdAt']));
        $post->setUpdatedAt(isset($row['updatedAt']) ? new \DateTime($row['updatedAt']) : null);
        $post->setDeletedAt(isset($row['deletedAt']) ? new \DateTime($row['deletedAt']) : null);
        $post->setAuthorId($row['authorId']);

        return $post;
    }
}