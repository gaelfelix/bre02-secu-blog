<?php

class CommentManager extends AbstractManager
{

    public function __construct() {
        parent::__construct();
    }
    
    public function findByPost (int $postId) : ?Post {
        
        $comments = [];
        $query = $this->db->prepare("SELECT comments.* FROM comments
        JOIN posts ON posts.id = comments.post_id
        WHERE posts.id = :postId");
        $parameters = [
            'postId' => $postId
        ];
        $query->execute($parameters);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($result as $item) {
            $comment = new Comment ($item["id"], $item["content"], $item["excerpt"], $item["userId"], $item["postId"]);
            $comments[] = $comment;
        }
        return $comments;
    }
    
    public function create(Comment $comment) : void {
        
        $query = $this->db->prepare('INSERT INTO comments (id, content) VALUES (NULL, :content)');
        $parameters = [
            "content" => $comment->getContent(),
        ];

        $query->execute($parameters);

        $comment->setId($this->db->lastInsertId());

        $this->comments[] = $comment;
    }
    
}