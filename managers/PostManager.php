<?php

class PostManager extends AbstractManager {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function findLatest() : array {
        
        $latestPosts = [];
        
        $query = $this->db->prepare("SELECT * FROM posts ORDER BY created at DESC LIMIT 4");
        $query->execute();
        $result =  $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $item) {
            $category = new Category($item["name"]);
            $category->setId($item["id"]);
            $categories[] = $category;
        }
        return $categories;
    }
    
    public function findOne (int $id) : ?Post {
        
        $query = $this->db->prepare("SELECT * FROM posts WHERE id = :id");
        $parameters = [
            'id' => $post
        ];
        $query->execute($parameters);
        $post =  $query->fetch(PDO::FETCH_ASSOC);
        return $post;
    }
    
    public function findByCategory (int $categoryId) : ?Category {
        
        $posts = [];
        $query = $this->db->prepare("SELECT posts.* FROM posts
        JOIN posts_categories ON posts_categories.post_id = posts.id
        JOIN categories ON posts_categories.category_id = categories.id
        WHERE categories.id = :categoryId");
        $parameters = [
            'idCategory' => $categoryId
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $item) {
            $post = new Post ($item["id"], $item["title"], $item["excerpt"], $item["content"], $item["author"], $item["created_at"]);
            $posts[] = $post;
        }
        return $posts;
    }
    
}