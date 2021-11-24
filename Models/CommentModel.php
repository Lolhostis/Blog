<?php
class CommentModel {
	private $comment_gw;
	private $user_gw;
	private $picture_gw;

	private $con;
	private $user='root';
	private $pass='';
	private $dsn='msql:host=localhost;dbname=dbsynapse';

	public function __construct() {
		$this->con=new Connection($this->dsn, $this->user, $this->pass);

		$this->comment_gw = new CommentGateway($this->con);
		$this->user_gw = new UserGateway($this->con);
		$this->picture_gw = new PictureGateway($this->con);
	}

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
		$raw_user = $this->user_gw->FindByName($raw_comment[0]['login_user']);
		$raw_user = $raw_user[0];
		$raw_picture = $this->picture_gw->FindById($raw_user[0]['id_picture']);
		$raw_picture = $raw_picture[0];

		$picture = new Picture($raw_picture['id'], $raw_picture['uri'], $raw_picture['alt']);
		$user = new User($raw_user['login'], $raw_user['password'], $picture, $raw_user['is_admin'], $raw_user['email']);
		$comment =





		return "Mon modèle ne fait rien";
	}

//fin modèles
}
?> 
