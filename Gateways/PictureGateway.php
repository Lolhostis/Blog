<?php
  class PictureGateway{
    private $con;

    public function __construct(Connection $con){
      $this->con = $con;
    }

    public function insert(Picture $newPicture) : bool{
      $query= 'INSERT INTO tPicture VALUES (:Id, :URI, :ALT)';

      return $this->con->executeQuery($query, array(':Id' => array($newUser->getId(), PDO::PARAM_INT) ,
                                            ':URI' => array($newUser->getUri(), PDO::PARAM_STR) ,
                                            ':ALT' => array($newUser->getAlt(), PDO::PARAM_STR)
                                            )
                              );
    }

    public function update(int $id, Picture $newPicture) : bool{
      $query= "UPDATE tPicture SET id = :NewId, uri = :URI, alt = :ALT  WHERE id = :OldId";

      return $this->con->executeQuery($query, array(':NewId' => array($newUser->getId(), PDO::PARAM_INT) ,
                                            ':URI' => array($newUser->getUri(), PDO::PARAM_STR) ,
                                            ':ALT' => array($newUser->getAlt(), PDO::PARAM_STR),
                                            ':OldId' => array($id, PDO::PARAM_INT)
                                            )
                              );
    }

    public function delete(int $id) : bool{
      $query= "DELETE FROM tPicture WHERE id = :ID";

      return $this->con->executeQuery($query, array(':ID' => array($id, PDO::PARAM_INT)) );
    }

    public function FindByURI(string $uri) : Array{
      $query='SELECT * FROM tPicture WHERE uri = :URI';
      $this->$con->executeQuery($query, array( ':URI' => array($uri,PDO::PARAM_STR)) );
      return $results=$this->con->getResults();
    }

    public function FindByID(string $id) : Array{
      $query='SELECT * FROM tPicture WHERE id = :ID';
      $this->$con->executeQuery($query, array( ':ID' => array($id,PDO::PARAM_STR)) );
      return $results=$this->con->getResults();
    }
  }

?>
