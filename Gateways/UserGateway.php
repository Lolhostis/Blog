<?php
namespace Gateways;
use \Config\Connection;
use \Jobs\User;
/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file UserGateway.php
  /** \namespace Gateways
*/

/** \class Gateway of the users UserGateway.php
*/
 class UserGateway{
    private $con;
    public function __construct(Connection $con){
      $this->con = $con;
    }

    /**
     * Insert a new user into a database
     * @param  User   $newUser User to add
     * @return [bool]          true if it's right ; false if there is a problem
     */
    public function insert(User $newUser) : bool{
      $query= 'INSERT INTO tUser VALUES (:Pseudo, :Password, :Email, :Is_admin, :Picture)';

      return $this->con->executeQuery($query, array(':Pseudo' => array($newUser->getPseudo(), \PDO::PARAM_STR) ,
                                            ':Password' => array($newUser->getPassword(), \PDO::PARAM_STR) ,
                                            ':Email' => array($newUser->getEmail(), \PDO::PARAM_STR) ,
                                            ':Is_admin' => array($newUser->getIsAdmin(), \PDO::PARAM_BOOL),
                                            ':Picture' => array($newUser->profile_picture->getId(), \PDO::PARAM_INT)
                                            )
                              );
    }

    /**
     * Insert a new user into a database
     * @param  string $login      Login of the user to add
     * @param  string $password   Password of the user to add
     * @param  string $email      Email of the user to add
     * @param  bool   $is_admin   true if the user is an admin; else false
     * @param  int    $id_picture The Id of the picture associated with the user
     * @return [bool]             true if it's right ; false if there is a problem
     */
    public function insert_raw_user(string $login, string $password, string $email, bool $is_admin, int $id_picture):bool {
        $query="INSERT INTO TUser(login, password, email, is_admin, id_picture) VALUES(:login, :password, :email, :is_admin, :id_picture);";

        $params[':login']=array($login, \PDO::PARAM_STR);
        $params[':password']=array($password, \PDO::PARAM_STR);
        $params[':email']=array($email, \PDO::PARAM_STR);
        $params[':is_admin']=array($is_admin, \PDO::PARAM_INT);
        $params[':id_picture']=array($id_picture, \PDO::PARAM_INT);

        return ( $this->con->executeQuery($query, $params) );
    }

    /**
     * Update a user
     * @param  string $login   Login of the old user
     * @param  User   $newUser New user to replace the older
     * @return [bool]          true if it's right ; false if there is a problem
     */
    public function update(string $login, User $newUser) : bool{
      $query= "UPDATE tUser SET login = :Pseudo, password = :Password, email = :Email, is_admin = :Is_admin, id_picture = :Picture  WHERE login = :Login";

      return $this->con->executeQuery($query, array(':Pseudo' => array($newUser->getPseudo(), \PDO::PARAM_STR) ,
                                            ':Password' => array($newUser->getPassword(), \PDO::PARAM_STR) ,
                                            ':Email' => array($newUser->getEmail(), \PDO::PARAM_STR) ,
                                            ':Is_admin' => array($newUser->getIsAdmin(), \PDO::PARAM_BOOL),
                                            ':Picture' => array($newUser->profile_picture->getId(), \PDO::PARAM_INT),
                                            ':Login' => array($id, \PDO::PARAM_STR)
                                            )
                                     );
    }

    /**
     * Delete a user from the database
     * @param  string $login  login of the user to remove
     * @return [bool]         true if the deletion succeded ; false otherwise
     */
    public function delete_user(string $login) : bool{
      $query= "DELETE FROM tUser WHERE login = :login";

      return $this->con->executeQuery($query, array(':login' => array($login, \PDO::PARAM_STR)) );
    }

    /**
     * Find users by login
     * @param string $login Login of the user(s) to find
     * @return [array]      All the users associated with the specific login
     */
    public function FindByName(string $login) : array{
      $query='SELECT * FROM tUser WHERE login=:Login';
      $this->con->executeQuery($query, array( ':Login' => array($login,\PDO::PARAM_STR)) );
      return $results=$this->con->getResults();
    }
	
    /**
     * Find users by login
     * @param string $login Login of the user(s) to find
     * @return [array]      All the users associated with the specific login
     */
	public function FindFullByName(string $login) : array{
      $query='SELECT * FROM TUser,TPicture WHERE TUser.id_picture=TPicture.id AND login=:Login';
      $this->con->executeQuery($query, array( ':Login' => array($login,\PDO::PARAM_STR)) );
      return $results=$this->con->getResults();
    }
	
    /**
     * Find all the administrators
     * @return [array] All the users administrators
     */
    public function FindAdmins() : array{
      $query='SELECT * FROM tUser WHERE is_admin';
      $this->con->executeQuery($query);
      return $results=$this->con->getResults();
    }
	
	public function strIsAdminByLogin(string $login):User {
		$query="SELECT CASE
					WHEN is_admin Then 'True'
					ELSE 'False' 
					END
					AS is_admin_str
				FROM tUser WHERE login=:Login";
		$this->con->executeQuery($query, array( ':Login' => array($login,\PDO::PARAM_STR)) );
		return $this->con->getResults();
	}
}
?>
