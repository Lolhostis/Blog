<?php
require_once('../Jobs/User.php');
require_once('../Jobs/Picture.php');
require_once('../Jobs/Comment.php');
require_once('../Gateways/PictureGateway.php');
require_once('../Gateways/NewsGateway.php');

class PictureModel {
	private $picture_gw;

	private $con;
	private $user='root';
	private $pass='';
	private $dsn='mysql:host=localhost;dbname=dbsynapse';

	public function __construct() {
		$this->con=new Connection($this->dsn, $this->user, $this->pass);

		$this->picture_gw = new PictureGateway($this->con);
	}

	function findById(int $id):Picture {
		$raw_picture = $this->picture_gw->FindById($id);
		if( empty($raw_picture) ) {
			throw new Exception("No picture matching this id");
		}
		if( count($raw_picture) != 1) {
			throw new Exception("Multiples pictures matching this id");
		}
		$raw_picture = $raw_picture[0];
		
		//Instantiating the picture from raw data
		$picture = new Picture($raw_picture['id'], $raw_picture['uri'], $raw_picture['alt']);

		return $picture;
	}
	
	function addPicture(int $id, string $uri, string $alt):bool {
		
		if( !empty($this->picture_gw->FindByID($id)) ) {
			throw new Exception("the picture ID already exists");
		}

		return $this->picture_gw->insert_raw_picture($id, $uri, $alt);
	}
}
?> 
