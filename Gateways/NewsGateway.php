<?php
namespace Gateways;
use \Config\Connection;
use \Jobs\News;
use \Jobs\User;

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file NewsGateway.php
  /** \namespace Gateways
*/

/** \class Gateway of the news NewsGateway.php
*/
Class NewsGateway {
    private $con;

    public function __construct(Connection $con) {
        $this->con=$con;
    }

    /**
     * Insert a news into a database
     * @param  News   $n News to add
     * @param  User   $u User associated with the news to add
     * @return [bool]    true if it's right ; false if there is a problem
     */
   public function insert_news(News $n, User $u):bool {
        $query="INSERT INTO TNews(id, title, description, date, login_user) VALUES(:id, :title, :description, :date, :login_user);";

        $params[':id']=array($n->getId(), \PDO::PARAM_INT);
        $params[':title']=array($n->getTitle(), \PDO::PARAM_STR);
        $params[':description']=array($n->getDescription(), \PDO::PARAM_STR);
        $params[':date']=array($n->getDate(), \PDO::PARAM_STR);
        $params[':login_user']=array($u->getPseudo(), \PDO::PARAM_STR);

        return ( $this->con->executeQuery($query, $params) );
    }

    /**
     * Insert a news into a database
     * @param  int    $id          Id of the news to insert
     * @param  string $title       Title of the news to insert
     * @param  string $description Description of the news to insert
     * @param  string $date        Date of the news to insert
     * @param  string $login_user  Login of the user associated with the news to add
     * @return [bool]              true if it's right ; false if there is a problem
     */
    public function insert_raw_news(int $id, string $title, string $description, string $date, string $login_user):bool {
        $query="INSERT INTO TNews(id, title, description, date, login_user) VALUES(:id, :title, :description, :date, :login_user);";

        $params[':id']=array($id, \PDO::PARAM_INT);
        $params[':title']=array($title, \PDO::PARAM_STR);
        $params[':description']=array($description, \PDO::PARAM_STR);
        $params[':date']=array($date, \PDO::PARAM_STR);
        $params[':login_user']=array($login_user, \PDO::PARAM_STR);

        return ( $this->con->executeQuery($query, $params) );
    }

    /**
     * Delete a news from the database
     * @param  News   $n News to delete
     * @return [bool]    true if it's right ; false if there is a problem
     */
    public function delete_news(News $n):bool {
        $query="DELETE FROM TNews WHERE id=:id";

        return ( $this->con->executeQuery($query, array(':id'=>array($n->getId(), \PDO::PARAM_INT))) );
    }

    /**
     * Get all news
     * @return [array] All news from the database
     */
    public function getAllNews():array {
        $query="SELECT * FROM TNews;";
        $this->con->executeQuery($query, array());

        return ( $this->con->getResults() );
    }

    /**
     * Get all news by id
     * @param  int    $id Filter Id
     * @return [array]    All news from the database with the specific Id
     */
    public function getNewsById(int $id):array {
        $query="SELECT * FROM TNews WHERE id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, \PDO::PARAM_INT)]);

        return $this->con->getResults();
    }

    /**
     * Get full news by id
     * @param  int    $id Filter Id
     * @return [array]    All news from the database with the specific Id
     */
	public function getFullNewsById(int $id):array {
        $query="SELECT * FROM TNews, TUser, TPicture WHERE TNews.login_user=TUser.login AND TUser.id_picture = TPicture.id AND TNews.id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, \PDO::PARAM_INT)]);

        return $this->con->getResults();
    }

    /**
     * Get full pictures by id
     * @param  int    $id Filter Id
     * @return [array]    All pictures from the database with the specific Id
     */
    public function getFullPicturesById(int $id):array {
        $query="SELECT id_picture FROM TNewsIncludePicture WHERE id_news=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, \PDO::PARAM_INT)]);

        return $this->con->getResults();
    }

    /**
     * Get full comments by id
     * @param  int    $id Filter Id
     * @return [array]    All comments from the database with the specific Id
     */
    public function getFullCommentsById(int $id):array {
        $query="SELECT id AS id_comment FROM TComment WHERE id_news=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, \PDO::PARAM_INT)]);

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
