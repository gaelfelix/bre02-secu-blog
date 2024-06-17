<?php

class User
{

    private ? int $id = null;
    
    public function __construct (private array $posts, private array $comments) {
        
    }
    
    public function getId() : ?int {
        return $this->id;
    }

    public function setId(?int $id) : void {  
        $this->id = $id;
    }
  
    public function getPosts() : array {
        return $this->posts;
    }

    public function setPosts(array $posts) : void {  
        $this->posts = $posts;
    }

    public function getComments() : array {
        return $this->comments;
    }

    public function setComments(array $post) : void {  
        $this->comments = $comments;
    }
    
}