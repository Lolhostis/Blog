
<?php
Class NewsGateway {
    private $con;

    public function __construct(Connection $con) {
        $this->con=$con;
    }

   public function insert_news(News $n, User $u):bool {
        $query="INSERT INTO TNews(id, title, description, date, login_user) VALUES(:id, :title, :description, :date, :login_user);";

        $params[':id']=array($n->getId(), PDO::PARAM_INT);
        $params[':title']=array($n->getTitle(), PDO::PARAM_STR);
        $params[':description']=array($n->getDescription(), PDO::PARAM_STR);
        $params[':date']=array($n->getDate(), PDO::PARAM_STR);
        $params[':login_user']=array($u->getPseudo(), PDO::PARAM_STR);

        return ( $this->con->executeQuery($query, $params) );
    }

    public function delete_news(News $n):bool {
        $query="DELETE FROM TNews WHERE id=:id";

        return ( $this->con->executeQuery($query, array(':id'=>array($n->getId(), PDO::PARAM_INT))) );
    }

    public function getAllNews():array {
        $query="SELECT * FROM TNews;";
        $this->con->executeQuery($query, array());

        return ( $this->con->getResults() );
    }

    public function getNewsById(int $id):array {
        $query="SELECT * FROM TNews WHERE id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, PDO::PARAM_INT)]);

        return $this->con->getResults();
    }

	public function getFullNewsById(int $id):array {
        $query="SELECT * FROM TNews, TUser, TPicture WHERE TNews.login_user=TUser.login AND TUser.id_picture = TPicture.id AND TNews.id=:id;";

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
