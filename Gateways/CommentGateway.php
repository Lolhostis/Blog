<?php
Class CommentGateway {
    private $con;

    public function __construct(Connection $con){
      $this->con = $con;
	}

    public function insert_comment(Comment $c, News $n):bool {
        $query="INSERT INTO TComment(id, date, content, id_news, login_user) VALUES(:id, :date, :content, :id_news, :login_user);";

        $params[':id']=array($c->getId(), PDO::PARAM_INT);
        $params[':date']=array($c->getDate(), PDO::PARAM_STR);
        $params[':content']=array($c->getText(), PDO::PARAM_STR);
        $params[':id_news']=array($n->getId(), PDO::PARAM_INT);
        $params[':login_user']=array($c->getAuthor()->getPseudo(), PDO::PARAM_STR);

        return ( $this->con->executeQuery($query, $params) );
    }

    public function delete_comment(Comment $c):bool {
        $query="DELETE FROM TComment WHERE id=:id";

        return ( $this->con->executeQuery($query, array(':id'=>array($c->getId(), PDO::PARAM_INT))) );
    }

    public function getAllComment():array {
        $query="SELECT * FROM TComment;";
        $this->con->executeQuery($query, array());

        return ( $this->con->getResults() );
    }

    public function getCommentById(int $id):array {
        $query="SELECT * FROM TComment WHERE id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, PDO::PARAM_INT)]);
        return $this->con->getResults();
    }
	
	public function getFullCommentById(int $id):array {
        $query="SELECT *
				FROM TComment, TUser, TPicture, TNews
				WHERE TComment.login_user = TUser.login
					AND TUser.id_picture = TPicture.id
					AND TComment.id_news = TNews.id
					AND TComment.id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, PDO::PARAM_INT)]);
        return $this->con->getResults();
    }
	
	public function getHourById(int $id):array {
		$query="SELECT DATE_FORMAT(date, '%H:%i') AS hour FROM TComment WHERE id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, PDO::PARAM_INT)]);
		
        return $this->con->getResults();
	}

    /*
    public function show_all_comments() {
        $query="SELECT * FROM TComment;";
        $this->con->executeQuery($query, array());
        $results=$this->con->getResults();
        Foreach($results as $row) {
            Foreach($row as $key=>$value) {
                echo $key." : ".$value."</br>";
            }
        }
        echo "</br>";
    }
    */
}
?>
