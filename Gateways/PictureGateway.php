<?php
namespace Gateways;
use \Config\Connection;
use \Jobs\Picture;

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file PictureGateway.php
  /** \namespace Gateways
*/

/** \class Gateway of the pictures PictureGateway.php
*/
  class PictureGateway{
    private $con;

    public function __construct(Connection $con){
      $this->con = $con;
    }

    /**
     * Insert a new picture from the database
     * @param  Picture $newPicture Picture to add
     * @return [bool]              true if it's right ; false if there is a problem
     */
    public function insert(Picture $newPicture) : bool{
      $query= 'INSERT INTO tPicture VALUES (:Id, :URI, :ALT)';

      return $this->con->executeQuery($query, array(':Id' => array($newUser->getId(), \PDO::PARAM_INT) ,
                                            ':URI' => array($newUser->getUri(), \PDO::PARAM_STR) ,
                                            ':ALT' => array($newUser->getAlt(), \PDO::PARAM_STR)
                                            )
                              );
    }

    /**
     * Insert a bew picture from the database
     * @param  int    $id  Id of the picture to add
     * @param  string $uri URI of the picture to add
     * @param  string $alt Description of the picture to add
     * @return [bool]      true if it's right ; false if there is a problem
     */
    public function insert_raw_picture(int $id, string $uri, string $alt) : bool{
      $query= 'INSERT INTO tPicture VALUES (:Id, :URI, :ALT)';

      return $this->con->executeQuery($query, array(':Id' => array($id, \PDO::PARAM_INT) ,
                                            ':URI' => array($uri, \PDO::PARAM_STR) ,
                                            ':ALT' => array($alt, \PDO::PARAM_STR)
                                            )
                              );
    }

    /**
     * Update a picture
     * @param  int     $id         Id of an old picture registered into a database
     * @param  Picture $newPicture New picture to replace the older
     * @return [bool]              true if it's right ; false if there is a problem
     */
    public function update(int $id, Picture $newPicture) : bool{
      $query= "UPDATE tPicture SET id = :NewId, uri = :URI, alt = :ALT  WHERE id = :OldId";

      return $this->con->executeQuery($query, array(':NewId' => array($newUser->getId(), \PDO::PARAM_INT) ,
                                            ':URI' => array($newUser->getUri(), \PDO::PARAM_STR) ,
                                            ':ALT' => array($newUser->getAlt(), \PDO::PARAM_STR),
                                            ':OldId' => array($id, \PDO\PDO::PARAM_INT)
                                            )
                              );
    }

    /**
     * Delete a picture from the database
     * @param  int    $id Id of the picture to delete
     * @return [bool]     true if it's right ; false if there is a problem
     */
    public function delete(int $id) : bool{
      $query= "DELETE FROM tPicture WHERE id = :ID";

      return $this->con->executeQuery($query, array(':ID' => array($id, \PDO::PARAM_INT)) );
    }

    /**
     * Find pictures by URI
     * @param string $uri Filter URI
     * @return [array]    All the pictures that corresponds to the URI
     */
    public function FindByURI(string $uri) : array{
      $query='SELECT * FROM tPicture WHERE uri = :URI';
      $this->$con->executeQuery($query, array( ':URI' => array($uri,\PDO::PARAM_STR)) );
      return $results=$this->con->getResults();
    }

    /**
     * Find pictures by ID
     * @param int $id Filter ID
     * @return [array]    All the pictures that corresponds to the ID
     */
    	public function FindById(int $id) : array{
      $query='SELECT * FROM tPicture WHERE id=:ID';
      $this->con->executeQuery($query, array( ':ID' => array($id,\PDO::PARAM_INT)) );
      return $this->con->getResults();
    }
  }
?>
