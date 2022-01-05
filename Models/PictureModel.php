<?php
namespace Models;
use \Config\Connection;
use \Gateways\PictureGateway;
use \Jobs\Picture;

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file PictureModel.php
  /** \namespace Models
*/

/** \class model class of comments PictureModel.php
*/
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

	/**
	 * Find a picture with a specific Id
	 * @param  int    $id Specific Id to find
	 * @return [Picture]  Picture to find
	 */
	function findById(int $id):Picture {
		$raw_picture = $this->picture_gw->FindById($id);
		if( empty($raw_picture) ) {
			throw new \Exception("No picture matching this id");
		}
		if( count($raw_picture) != 1) {
			throw new \Exception("Multiples pictures matching this id");
		}
		$raw_picture = $raw_picture[0];
		
		//Instantiating the picture from raw data
		return new Picture($raw_picture['id'], $raw_picture['uri'], $raw_picture['alt']);
	}
	
	/**
	 * Add a new picture
	 * @param Picture $p Picture to add
     * @return [bool]    true if it's right ; false if there is a problem
	 */
	function addPicture(Picture $p):bool {
		if( !empty($this->picture_gw->FindByID($p->getId())) ) {
			throw new \Exception("the picture ID already exists");
		}

		return $this->picture_gw->insert_raw_picture($p->getId(), $p->getUri(), $p->getAlt());
	}

	/**
	 * Delete a picture
	 * @param int $id   Id of the picture to remove
     * @return [bool]   true if it's right ; false if there is a problem
	 */
	function deletePicture(int $id):bool {
		
		if( empty($this->picture_gw->FindByID($id)) ) {
			throw new \Exception("the picture ID doesn't exist");
		}

		return $this->picture_gw->delete_picture($id);
	}
}
?> 
