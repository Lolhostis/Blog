<?php
namespace Gateways;
use \Config\Connection;
use \Jobs\User;

/**
  /** \author L'HOSTIS Loriane & ALLEMAND Arnaud
  /** \date 08/12/2021
  /** \file ViewGateway.php
  /** \namespace Gateways
*/

/** \class Gateway of the views ViewGateway.php
*/
 class ViewGateway{
    private $con;
    public function __construct(Connection $con){
      $this->con = $con;
    }

    /**
     * Find Views
     * @return [array]  Array of news
     */
    public function FindNews() : array{
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
