<?php

class Category
{

    private ? int $id = null;
    
    public function __construct () {
        
    }
    
    public function getId() : ?int {
        return $this->id;
    }

    public function setId(?int $id) : void {  
        $this->id = $id;
    }

    public function getCategory() : string {
        return $this->category;
    }

    public function setCategory(string $category) : void {  
        $this->category = $category;
    }

}