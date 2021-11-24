<?php
Class CommentGateway {
    private $con;
    private $user='root';
    private $pass='';
    private $dsn='mysql:host=localhost;dbname=dbsynapse';

    public function __construct() {
        $this->con=new Connection($this->dsn, $this->user, $this->pass);
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
        
        return ( $comment[0] );
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
