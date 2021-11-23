<?php
Class CommentGateway {
    private $con;
    private $user='root';
    private $pass='';
    private $dsn='mysql:host=localhost;dbname=dbsynapse';

    public function __construct() {
        $this->con=new Connection($this->dsn, $this->user, $this->pass);
    }

    public function insert_comment(Comment $c):bool {
        $query="INSERT INTO TComment(date, content) VALUES(:date, :content);";

        $params[':date']=array($c->get_date(), PDO::PARAM_STR);
        $params[':content']=array($c->get_text(), PDO::PARAM_STR);

        return ( $this->con->executeQuery($query, $params) );
    }

    public function delete_comment(int $id):bool {
        $query="DELETE FROM TComment WHERE id=:id";

        return ( $this->con->executeQuery($query, array(':id'=>array($id, PDO::PARAM_INT))) );
    }

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
}
?>
