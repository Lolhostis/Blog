<?php
require_once('../Jobs/User.php');
require_once('../Jobs/Picture.php');
require_once('../Jobs/Comment.php');
require_once('../Gateways/UserGateway.php');
require_once('../Gateways/PictureGateway.php');
require_once('../Gateways/CommentGateway.php');

class CommentModel {
	private $comment_gw;
	private $user_gw;
	private $picture_gw;

	private $con;
	private $user='root';
	private $pass='';
	private $dsn='mysql:host=localhost;dbname=dbsynapse';

	public function __construct() {
		$this->con=new Connection($this->dsn, $this->user, $this->pass);

		$this->comment_gw = new CommentGateway($this->con);
	}

	//Returns NULL if
	//	- no comment found
	//	- multiple comments on the same id
	function findByIdBis(int $id):Comment {
		$raw_comment = $this->comment_gw->getFullCommentById($id);
		if( empty($raw_comment) ) {
			//Error, no comment matching this id
			return NULL;
		}
		if( count($raw_comment) != 1) {
			//Error, multiple comments matching this id
			return NULL;
		}
		$raw_comment = $raw_comment[0];
		$raw_comment_hour = $this->comment_gw->getHourById($id);
		$raw_comment_hour = $raw_comment_hour[0];
		
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
		$comment = new Comment($raw_comment['id'], $raw_comment['content'], $raw_comment['date'], $raw_comment_hour['hour'] , $user);

		return $comment;
	}
	//end of model
}
?> 
