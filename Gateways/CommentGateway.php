<?php
Class CommentGateway {
    private $con;

<<<<<<< HEAD
    public function __construct(Connection $con){
      $this->con = $con;
=======
    public function __construct(Connection $con) {
        $this->con=$con;
>>>>>>> aed33857936f7965948d157673b8d2955c56babe
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
        $comment=$this->con->getResults();
<<<<<<< HEAD
        
        return $comment;
    }

    public function getHourById(int $id):array {
        $query="SELECT TO_CHAR(date, 'HH:MI') AS hour FROM TComment WHERE id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, PDO::PARAM_INT)]);
        $hour=$this->con->getResults();

        return $hour;
=======
		
		return $comment;
>>>>>>> aed33857936f7965948d157673b8d2955c56babe
    }
	
	public function getHourById(int $id):array {
		$query="SELECT TO_CHAR(date, 'HH:MI') AS hour FROM TComment WHERE id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, PDO::PARAM_INT)]);
        $hour=$this->con->getResults();
		
		return $hour;
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
