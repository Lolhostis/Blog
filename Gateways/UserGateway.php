<?php
  class UserGateway{
    private $con;
    public function __construct(Connection $con){
      $this->con = $con;
    }

    public function insert(User $newUser, Picture $profile_picture) : Array{
      $query= 'INSERT INTO tUser VALUES (:Pseudo, :Password, :Email, :Is_admin, :Picture)';

      $this->con->executeQuery($query, array(':Pseudo' => array($newUser->getPseudo(), PDO::PARAM_STR) ,
                                            ':Password' => array($newUser->getPassword(), PDO::PARAM_STR) ,
                                            ':Email' => array($newUser->getEmail(), PDO::PARAM_STR) ,
                                            ':Is_admin' => array($newUser->getIsAdmin(), PDO::PARAM_BOOL),
                                            ':Picture' => array($profile_picture->getId(), PDO::PARAM_INT)
                                            )
                              );
       return $results=$this->con->getResults();
    }

    public function update(string $login, User $newUser, Picture $profile_picture) : Array{
      $query= "UPDATE tUser SET login = :Pseudo, password = :Password, email = :Email, is_admin = :Is_admin, id_picture = :Picture  WHERE login = :Login";

      $this->con->executeQuery($query, array(':Pseudo' => array($newUser->getPseudo(), PDO::PARAM_STR) ,
                                            ':Password' => array($newUser->getPassword(), PDO::PARAM_STR) ,
                                            ':Email' => array($newUser->getEmail(), PDO::PARAM_STR) ,
                                            ':Is_admin' => array($newUser->getIsAdmin(), PDO::PARAM_BOOL),
                                            ':Picture' => array($profile_picture->getId(), PDO::PARAM_INT),
                                            ':Login' => array($id, PDO::PARAM_STR)
                                            )
                              );
       return $results=$this->con->getResults();
    }

    public function delete(string $id) : Array{
      $query= "DELETE FROM tUser WHERE login = :ID";

      return $this->con->executeQuery($query, array(':ID' => array($id, PDO::PARAM_STR)) );
    }

    public function FindByName(string $login) : Array{
      $query='SELECT * FROM tUser WHERE login=:Login';
      $this->$con->executeQuery($query, array( ':Login' => array($login,PDO::PARAM_STR)) );
      return $results=$this->con->getResults();
    }
  }

?>
