<?php
 class UserGateway{
    private $con;
    public function __construct(Connection $con){
      $this->con = $con;
    }

    public function insert(User $newUser) : bool{
      $query= 'INSERT INTO tUser VALUES (:Pseudo, :Password, :Email, :Is_admin, :Picture)';

      return $this->con->executeQuery($query, array(':Pseudo' => array($newUser->getPseudo(), PDO::PARAM_STR) ,
                                            ':Password' => array($newUser->getPassword(), PDO::PARAM_STR) ,
                                            ':Email' => array($newUser->getEmail(), PDO::PARAM_STR) ,
                                            ':Is_admin' => array($newUser->getIsAdmin(), PDO::PARAM_BOOL),
                                            ':Picture' => array($newUser->profile_picture->getId(), PDO::PARAM_INT)
                                            )
                              );
    }

    public function update(string $login, User $newUser) : bool{
      $query= "UPDATE tUser SET login = :Pseudo, password = :Password, email = :Email, is_admin = :Is_admin, id_picture = :Picture  WHERE login = :Login";

      return $this->con->executeQuery($query, array(':Pseudo' => array($newUser->getPseudo(), PDO::PARAM_STR) ,
                                            ':Password' => array($newUser->getPassword(), PDO::PARAM_STR) ,
                                            ':Email' => array($newUser->getEmail(), PDO::PARAM_STR) ,
                                            ':Is_admin' => array($newUser->getIsAdmin(), PDO::PARAM_BOOL),
                                            ':Picture' => array($newUser->profile_picture->getId(), PDO::PARAM_INT),
                                            ':Login' => array($id, PDO::PARAM_STR)
                                            )
                                     );
    }

    public function delete(string $id) : bool{
      $query= "DELETE FROM tUser WHERE login = :ID";

      return $this->con->executeQuery($query, array(':ID' => array($id, PDO::PARAM_STR)) );
    }

    public function FindByName(string $login) : Array{
      $query='SELECT * FROM tUser WHERE login=:Login';
      $this->con->executeQuery($query, array( ':Login' => array($login,PDO::PARAM_STR)) );
      return $results=$this->con->getResults();
    }
<<<<<<< HEAD

    public function FindAdmins() : Array{
      $query='SELECT * FROM tUser WHERE is_admin=true';
      $this->$con->executeQuery($query);
      return $results=$this->con->getResults();
    }

    public function FindIsAdminByLogin(string $login):bool {
      $query="SELECT is_admin FROM tUser WHERE login=:Login";
      return $this->$con->executeQuery($query, array( ':Login' => array($login,PDO::PARAM_STR)) );
    }
 }
=======
	
	public function strIsAdminByLogin(string $login):array {
		$query="SELECT CASE
					WHEN is_admin Then 'True'
					ELSE 'False' 
					END
					AS is_admin_str
				FROM tUser WHERE login=:Login";
		$this->con->executeQuery($query, array( ':Login' => array($login,PDO::PARAM_STR)) );
		return $this->con->getResults();
	}
  }
>>>>>>> aed33857936f7965948d157673b8d2955c56babe

?>
