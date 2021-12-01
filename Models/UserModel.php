<?php
require_once('../Jobs/User.php');
require_once('../Jobs/Picture.php');
require_once('../Jobs/Comment.php');
require_once('../Gateways/UserGateway.php');
require_once('../Gateways/PictureGateway.php');
require_once('../Gateways/CommentGateway.php');
require_once('../Gateways/NewsGateway.php');

class UserModel {
	private $user_gw;
	private $picture_gw;

	private $con;
	private $user='root';
	private $pass='';
	private $dsn='mysql:host=localhost;dbname=dbsynapse';

	public function __construct() {
		$this->con=new Connection($this->dsn, $this->user, $this->pass);

		$this->user_gw = new UserGateway($this->con);
		$this->picture_gw = new PictureGateway($this->con);
	}

	function findByLogin(string $login):User {
		$raw_user = $this->user_gw->FindFullByName($login);
		if( empty($raw_user) ) {
			throw new Exception("No user matching this id");
		}
		if( count($raw_user) != 1) {
			throw new Exception("Multiple users matching this id");
		}
		$raw_user = $raw_user[0];
		
		//Instantiating the picture from raw data
		$picture = new Picture($raw_user['id_picture'], $raw_user['uri'], $raw_user['alt']);

		//Instantiating the user from raw data
		if($raw_user['is_admin'] == 1) {
			//Case 1 : the user is an admin
			$user = new User($raw_user['login'], $raw_user['password'], $picture, true, $raw_user['email']);
		}
		else {
			//Case 2 : the user is not an admin
			$user = new User($raw_user['login'], $raw_user['password'], $picture, false, $raw_user['email']);
		}

		return $user;
	}

	function existLogin(string $login):bool {
		$query= 'SELECT login FROM tUser WHERE login=:Login';

    return $this->con->executeQuery($query, array(':Login' => array($login->getPseudo(), PDO::PARAM_STR)));
	}

	function existPicture(string $login):bool {
		$query= 'SELECT picture FROM tUser WHERE login=:Login';

    return $this->con->executeQuery($query, array(':Login' => array($login->getPseudo(), PDO::PARAM_STR)));
	}
	
	function addUser(string $login, string $password, string $email, bool $isadmin, int $id_picture):bool {

		if( !empty($this->user_gw->FindByName($login)) ) {
			throw new Exception("Login already existing");
		}

		if( empty($this->picture_gw->FindById($id_picture)) ) {
			throw new Exception("Unknown Picture ID");
		}
		
		return $this->user_gw->insert_raw_user($login, $password, $email, $isadmin, $id_picture);
	}
}
?> 
