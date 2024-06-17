<?php

class Comment
{

    private ? int $id = null;
    
    public function __construct (private string $comment, private string $user, private string $post) {
        
    }
    
    public function getId() : ?int {
        return $this->id;
    }

    public function setId(?int $id) : void {  
        $this->id = $id;
    }
  
     public function getComment() : string {
        return $this->comment;
    }

    public function setComment(string $comment) : void {  
        $this->comment = $comment;
    }
  
    public function getUser() : string {
        return $this->user;
    }

    public function setUser(string $user) : void {  
        $this->user = $user;
    }

    public function getPost() : string {
        return $this->post;
    }

    public function setPost(string $post) : void {  
        $this->post = $post;
    }
    
}