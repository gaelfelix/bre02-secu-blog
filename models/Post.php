<?php

class Post
{

    private ? int $id = null;
    
    public function __construct (private string $user, private string $category) {
        
    }
    
    public function getId() : ?int {
        return $this->id;
    }

    public function setId(?int $id) : void {  
        $this->id = $id;
    }
  
    public function getUser() : string {
        return $this->user;
    }

    public function setUser(string $user) : void {  
        $this->user = $user;
    }

    public function getCategory() : string {
        return $this->category;
    }

    public function setCategory(string $category) : void {  
        $this->category = $category;
    }

}