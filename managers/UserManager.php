<?php

class UserManager extends AbstractManager {
 
    public function __construct() {
        parent::__construct();
    }
 
    public function findByEmail(string $email) : ?User {
        $query = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $parameters = [
            'email' => $email
        ];
        $query->execute($parameters);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        
        if ($user !== false) {
            $findUser = new User($user['username'], $user['email'], $user['password'], $user['role'], $user['created_at']);
            $findUser->setId($user['id']);
        }
        else {
            return null;
        }
        
        return $findUser;
    }
    
    public function create(User $user) : void {

        $currentDateTime = date('Y-m-d H:i:s');

        $query = $this->db->prepare('INSERT INTO users (id, username, email, password, role, created_at) VALUES (NULL, :username, :email, :password, :role, :created_at)');
        $parameters = [
            "username" => $user->getUsername(),
            "password" => $user->getPassword(),
            "email" => $user->getEmail(),
            "role" => $user->getRole(),
            "created_at" => $currentDateTime,
        ];

        $query->execute($parameters);

        $user->setId($this->db->lastInsertId());

        $this->users[] = $user;
    }
 
}