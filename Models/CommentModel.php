<?php
namespace Models;

use \Config\Connection;

use \Gateways\CommentGateway;
use \Gateways\UserGateway;
use \Gateways\NewsGateway;

use \Jobs\Picture;
use \Jobs\User;
use \Jobs\Comment;

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file CommentModel.php
  /** \namespace Models
*/

/** \class model class of comments CommentModel.php
*/
class CommentModel {
	private $comment_gw;
	private $user_gw;
	private $news_gw;

	private $con;
	private $user='root';
	private $pass='';
	private $dsn='mysql:host=localhost;dbname=dbsynapse';

	public function __construct() {
		$this->con=new Connection($this->dsn, $this->user, $this->pass);

		$this->comment_gw = new CommentGateway($this->con);
		$this->user_gw = new UserGateway($this->con);
		$this->news_gw = new NewsGateway($this->con);
	}

	/**
	 * Find a comment by Id
	 * @param  int    $id Id to find
	 * @return [Comment]  Comment to find
	 */
	function findById(int $id):Comment {
		$raw_comment = $this->comment_gw->getFullCommentById($id);
		
		if( empty($raw_comment) ) {
			//Error, no comment matching this id
			throw new \Exception("No comment matching this id");
		}
		if( count($raw_comment) != 1) {
			//Error, multiple comments matching this id
			throw new \Exception("Multiples comments matching this id");
		}
		$raw_comment = $raw_comment[0];
		$raw_single_comment = $this->comment_gw->getCommentById($id);
		$raw_single_comment = $raw_single_comment[0];
		
		//Instantiating the picture from raw data
		$picture = new Picture($raw_comment['id_picture'], $raw_comment['uri'], $raw_comment['alt']);

		//Instantiating the user from raw data
		if($raw_comment['is_admin'] == 1) {
			//Case 1 : the user is an admin
			$user = new User($raw_comment['login_user'], $raw_comment['password'], $picture, true, $raw_comment['email']);
		}
		else {
			//Case 2 : the user is not an admin
			$user = new User($raw_comment['login_user'], $raw_comment['password'], $picture, false, $raw_comment['email']);
		}

		//Instantiating the comment from raw data
		$comment = new Comment($raw_comment['id'], $raw_comment['content'], $raw_single_comment['date'], $user);

		return $comment;
	}
	
	/**
	 * Add a comment
	 * @param int    $id         Id of the comment to add
	 * @param string $text       Description of the comment to add
	 * @param string $date       Date of the comment to add
	 * @param string $login_user Login of the user associated with the comment to add
	 * @param string $id_news    Id of the news associated with the comment to add
   * @return [bool]    true if it's right ; false if there is a problem
	 */
	function addComment(int $id, string $text, string $date, string $login_user, string $id_news):bool {
		
		if( empty($this->user_gw->FindByName($login_user)) ) {
			throw new \Exception("Unknown user login");
		}
		
		if( empty($this->news_gw->getNewsById($id_news)) ) {
			throw new \Exception("Unknown news's ID ");
		}
		
		if( !empty($this->comment_gw->getCommentById($id)) ) {
			throw new \Exception("ID Comment already exists");
		}

		return $this->comment_gw->insert_raw_comment($id, $date, $text, $id_news, $login_user);
	}

	/**
	 * Delete a comment
	 * @param int    $id	Id of the comment to remove
   	 * @return [bool]    	true if the deletion succeded ; false otherwise
	 */
	function deleteComment(int $id):bool {
		if( empty($this->comment_gw->getCommentById($id)) ) {
			throw new \Exception("The Comment ID does not exist");
		}

		// $comment = $this->findById($id);

		return $this->comment_gw->delete_comment($id);
	}
	
	/**
	 * Get the max comment id from all news
   	 * @return [int]  Get the max comment id from all news
	 */
	function getIdComment():int {
		return $this->comment_gw->getIdComment();
	}
}
?> 
