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
		$this->user_gw = new UserGateway($this->con);
		$this->picture_gw = new PictureGateway($this->con);
	}

	//Returns NULL if
	//	- no comment found
	//	- multiple comments on the same id
	function findById(int $id):Comment {
		$raw_comment = $this->comment_gw->getCommentById($id);
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

		//Getting the raw data concerning the user who has posted the comment
		$raw_user = $this->user_gw->FindByName($raw_comment['login_user']);
		$raw_user = $raw_user[0];
		//Getting the raw data concerning the role of the user
		$raw_user_isadmin = $this->user_gw->strIsAdminByLogin($raw_comment['login_user']);
		$raw_user_isadmin = $raw_user_isadmin[0];

		//Getting the raw data concerning the profile picture of the user
		$raw_picture = $this->picture_gw->FindById($raw_user['id_picture']);
		$raw_picture = $raw_picture[0];

		//Instantiating the picture from raw data
		$picture = new Picture($raw_picture['id'], $raw_picture['uri'], $raw_picture['alt']);

		//Instantiating the user from raw data
		if($raw_user_isadmin['is_admin_str'] == 'True') {
			//Case 1 : the user is an admin
			$user = new User($raw_user['login'], $raw_user['password'], $picture, true, $raw_user['email']);
		}
		else {
			//Case 2 : the user is not an admin
			$user = new User($raw_user['login'], $raw_user['password'], $picture, false, $raw_user['email']);
		}

		//Instantiating the comment from raw data
		$comment = new Comment($raw_comment['id'], $raw_comment['content'], $raw_comment['date'], $raw_comment_hour['hour'] , $user);

		return $comment;
	}
	//end of model
}
?> 
