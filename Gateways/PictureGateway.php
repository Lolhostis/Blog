<?php
  class PictureGateway{
    private $con;
    public function __construct(Connection $con){
      $this->con = $con;
    }

    public function insert(Picture $newPicture) : Array{
      $query= 'INSERT INTO tPicture VALUES (:Id, :URI, :ALT)';

      $this->con->executeQuery($query, array(':Id' => array($newUser->getId(), PDO::PARAM_INT) ,
                                            ':URI' => array($newUser->getUri(), PDO::PARAM_STR) ,
                                            ':ALT' => array($newUser->getAlt(), PDO::PARAM_STR)
                                            )
                              );
       return $results=$this->con->getResults();
    }

    public function update(int $id, Picture $newPicture) : Array{
      $query= "UPDATE tPicture SET id = :NewId, uri = :URI, alt = :ALT  WHERE id = :OldId";

      $this->con->executeQuery($query, array(':NewId' => array($newUser->getId(), PDO::PARAM_INT) ,
                                            ':URI' => array($newUser->getUri(), PDO::PARAM_STR) ,
                                            ':ALT' => array($newUser->getAlt(), PDO::PARAM_STR),
                                            ':OldId' => array($id, PDO::PARAM_INT)
                                            )
                              );
      return $results=$this->con->getResults();
    }

    public function delete(int $id) : Array{
      $query= "DELETE FROM tPicture WHERE id = :ID";

      return $this->con->executeQuery($query, array(':ID' => array($id, PDO::PARAM_INT)) );
    }

    public function FindByURI(string $uri) : Array{
      $query='SELECT * FROM tPicture WHERE uri = :URI';
      $this->$con->executeQuery($query, array( ':URI' => array($uri,PDO::PARAM_STR)) );
      return $results=$this->con->getResults();
    }
  }

?>
