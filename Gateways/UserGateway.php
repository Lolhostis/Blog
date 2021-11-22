<?php
  class UserGateway{
    private $con;
    public function __construct(Connection $con){
      $this->con = $con;
    }

    private function existe(string $id) : bool{
      $query= 'SELECT * FROM Personne WHERE ID = :ID';

      if($this->con->executeQuery($query, array(':ID' => array($id, PDO::PARAM_STR)) )==true){
        if($this->con->getResults()==NULL){
          return false;
        }
      }
      return true;
    }

    //méthodes qui font appel à la classe Connection
    public function insert(string $id, string $nom, string $prenom, string $ddn, string $email) : string{
      if($this->existe($id)==true){
        return 'NULL';
      }

      $query= 'INSERT INTO Personne VALUES (:ID, :Nom, :Prenom, :Ddn, :Email)';

      if($this->con->executeQuery($query, array(':ID' => array($id, PDO::PARAM_STR) ,
                        ':Nom' => array($nom, PDO::PARAM_STR) ,
                        ':Prenom' => array($prenom, PDO::PARAM_STR) ,
                        ':Ddn' => array($ddn, PDO::PARAM_STR) ,
                        ':Email' => array($email, PDO::PARAM_STR))
                 )==true){
        return $this->con->lastInsertId();
      }

      return 'NULL';
    }

    public function update(string $id, string $nom, string $prenom, string $ddn, string $email) : string{
      if($this->existe($id)==false){
        return 'NULL';
      }

      $query= "UPDATE Personne SET Nom = :Nom, Prenom = :Prenom, Ddn = :Ddn, Email = :Email WHERE ID = :ID";

      if($this->con->executeQuery($query, array(':ID' => array($id, PDO::PARAM_STR) ,
                        ':Nom' => array($nom, PDO::PARAM_STR) ,
                        ':Prenom' => array($prenom, PDO::PARAM_STR) ,
                        ':Ddn' => array($ddn, PDO::PARAM_STR) ,
                        ':Email' => array($email, PDO::PARAM_STR))
                 )==true){
        return $this->con->lastInsertId();
      }
      return 'NULL';
    }

    public function delete(string $id){
      if($this->existe($id)==false){
        return 'NULL';
      }

      $query= "DELETE FROM Personne WHERE ID = :ID";

      if($this->con->executeQuery($query, array(':ID' => array($id, PDO::PARAM_STR)) )==true){
        echo "Personne d'id $id supprimée";
      }

      return $this->con->lastInsertId();
    }

    public function FindByName(string $nom){
      //préparation + execution requètes sql
      $query='SELECT * FROM Personne WHERE Nom=:nom';
      $this->$con->executeQuery($query, array( ':nom' => array($nom,PDO::PARAM_STR)) );
      $results=$this->con->getResults();
      print("<br/>");
      foreach($results as $row){
        foreach($row as $col){
          echo "$col\t";
        }
        print("<p></p>"); //Saut de ligne
      }
    }
  }

?>
