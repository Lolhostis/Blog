<?php
namespace Models;

use \Config\Connection;

use \Gateways\PictureGateway;
use \Gateways\UserGateway;

use \Jobs\Picture;
use \Jobs\User;

/*
require_once('../Jobs/User.php');
require_once('../Jobs/Picture.php');
require_once('../Jobs/Comment.php');
require_once('../Gateways/UserGateway.php');
require_once('../Gateways/PictureGateway.php');
require_once('../Gateways/CommentGateway.php');
require_once('../Gateways/NewsGateway.php');
*/

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file UserModel.php
  /** \namespace Models
*/

/** \class model class of comments UserModel.php
*/
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

	/**
	 * Find a user with his login
	 * @param  string $login Login of the user to find
	 * @return [User]        User to find
	 */
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

	/**
	 * Find if a user exists or no
	 * @param  string $login Login of the user to find
	 * @return [bool]        true if he exists; else false
	 */
	function existLogin(string $login):bool {
		$query= 'SELECT login FROM tUser WHERE login=:Login';

    return $this->con->executeQuery($query, array(':Login' => array($login->getPseudo(), \PDO::PARAM_STR)));
	}

	/**
	 *  Find if a picture exists or no
	 * @param  string $login Login of the picture to find
	 * @return [bool]        true if it exists; else false
	 */
	function existPicture(string $login):bool {
		$query= 'SELECT picture FROM tUser WHERE login=:Login';

    return $this->con->executeQuery($query, array(':Login' => array($login->getPseudo(), \PDO::PARAM_STR)));
	}
	
	/**
	 * Add a new user
	 * @param string $login      Login of the new user
	 * @param string $password   Password of the new user
	 * @param string $email      Email of the new user
	 * @param bool   $isadmin    true if it is an administrator ; else false
	 * @param int    $id_picture Id of the picture associated with the new user to add
	 */
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
