<?php
namespace Gateways;
use \Config\Connection;
use \Jobs\News;
use \Jobs\Comment;
/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file CommentGateway.php
  /** \namespace Gateways
*/

/** \class Gateway of the comments CommentGateway.php
*/
Class CommentGateway {
    private $con;

    public function __construct(Connection $con){
      $this->con = $con;
	}

    /**
     * Insert a comment into a database
     * @param  Comment $c Comment to add
     * @param  News    $n News associated with the comment to add
     * @return [bool]     true if it's right ; false if there is a problem
     */
    public function insert_comment(Comment $c, News $n):bool {
        $query="INSERT INTO TComment(id, date, content, id_news, login_user) VALUES(:id, :date, :content, :id_news, :login_user);";

        $params[':id']=array($c->getId(), \PDO::PARAM_INT);
        $params[':date']=array($c->getDate(), \PDO::PARAM_STR); 
        $params[':content']=array($c->getText(), \PDO::PARAM_STR);
        $params[':id_news']=array($n->getId(), \PDO::PARAM_INT);
        $params[':login_user']=array($c->getAuthor()->getPseudo(), \PDO::PARAM_STR);

        return ( $this->con->executeQuery($query, $params) );
    }

    /**
     * Insert a comment into a database
     * @param  string $id         Id of the comment to insert
     * @param  string $date       Date of the comment to insert
     * @param  string $content    Description of the comment to insert
     * @param  string $id_news    Id of the news, associate to the comment to insert
     * @param  string $login_user Id of the login of the user who wants to add a comment
     * @return [bool]             true if it's right ; false if there is a problem
     */
	public function insert_raw_comment(string $id, string $date, string $content, string $id_news, string $login_user):bool {
        $query="INSERT INTO TComment(id, date, content, id_news, login_user) VALUES(:id, STR_TO_DATE(:date, '%Y %m %d %H %i'), :content, :id_news, :login_user);";

        $params[':id']=array($id, \PDO::PARAM_INT);
        //$params[':date']=array(str_replace("-", " ", str_replace(":", " ", str_replace("T", " ", $date))), \PDO::PARAM_STR);
        $params[':date']=array($date, \PDO::PARAM_STR);
        $params[':content']=array($content, \PDO::PARAM_STR);
        $params[':id_news']=array($id_news, \PDO::PARAM_INT);
        $params[':login_user']=array($login_user, \PDO::PARAM_STR);

        return ( $this->con->executeQuery($query, $params) );
    }

    /**
     * Delete a comment from a database
     * @param  int $id  Id from the comment to delete
     * @return [bool]   true if the deletion succeded ; false otherwise
     */
    public function delete_comment(int $id):bool {
        $query="DELETE FROM TComment WHERE id=:id";

        return ( $this->con->executeQuery($query, array(':id'=>array($id, \PDO::PARAM_INT))) );
    }

    /**
     * Get all comments
     * @return [array] All the comments from the database
     */
    public function getAllComment():array {
        $query="SELECT * FROM TComment;";
        $this->con->executeQuery($query, array());

        return ( $this->con->getResults() );
    }

    /**
     * Get comments by Id
     * @param  int    $id Filter Id
     * @return [array]    All the comments from the database with the good Id
     */
    public function getCommentById(int $id):array {
        $query="SELECT id, DATE_FORMAT(date, '%Y-%m-%d %H:%m') as date, content, id_news, login_user FROM TComment WHERE id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, \PDO::PARAM_INT)]);
        return $this->con->getResults();
    }
	
    /**
     * Get full comments by id
     * @param  int    $id Filter Id
     * @return [type]     All the comments from the database with the good Id
     */
	public function getFullCommentById(int $id):array {
        $query="SELECT *
				FROM TComment, TUser, TPicture, TNews
				WHERE TComment.login_user = TUser.login
					AND TUser.id_picture = TPicture.id
					AND TComment.id_news = TNews.id
					AND TComment.id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, \PDO::PARAM_INT)]);
        return $this->con->getResults();
    }
	
    /**
     * Get hour by Id
     * @param  int    $id Filter Id
     * @return [array]    All the hours from comments filter by Id
     */
	public function getHourById(int $id):array {
		$query="SELECT DATE_FORMAT(date, '%H:%i') AS hour FROM TComment WHERE id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, \PDO::PARAM_INT)]);
		
        return $this->con->getResults();
	}

    public function getIdNewsByIdComment(int $id):array {
        $query="SELECT id_news FROM TComment WHERE id=:id;";

        $this->con->executeQuery($query, [':id'=>array($id, \PDO::PARAM_INT)]);

        return $this->con->getResults();
    }

    /**
     * Return the max comment id from all news
     * @return [int]   Return the max comment id from all news
     */
    public function getIdComment():int {
        $query="SELECT MAX(id) AS id FROM tComment;";

       $this->con->executeQuery($query, array());
    
       $results = $this->con->getResults();
       if(empty($results)) {
           return 1;
       }
       else {
           return $results[0]['id']+1;
       }
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
