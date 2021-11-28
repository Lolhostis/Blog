<?php
require_once("User.php");

Class Comment {
  private $id;
  private $text;
  private $date;
  private $hour;
  private $author;

  public function __construct(int $id, string $text, string $date, string $hour, User $author) {
    $this->id=$id;
    $this->text=$text;
    $this->date=$date;
    $this->hour=$hour;
    $this->author=$author;
  }

  public function getId():int {
    return $this->id;
  }
  
  public function getDate():string {
    return $this->date;
  }

  public function getText():string {
    return $this->text;
  }

  public function getHour():string {
    return $this->hour;
  }

  public function getAuthor():User {
    return $this->author;
  }
<<<<<<< HEAD

  public function toString():string {
    $result = "id : ".$this->id;
    $result = $result.", text : ".$this->text;
    $result = $result.", date : ".$this->date;
    $result = $result.", hour : ".$this->hour;
    $result = $result.", author : ".$this->author;
    $result = $result."</br>";

    return $result;
=======
  
  public function toString():string {
	  $result = "id : ".$this->id;
	  $result = $result.", text : ".$this->text;
	  $result = $result.", date : ".$this->date;
	  $result = $result.", hour : ".$this->hour;
	  $result = $result.", author : ".$this->author;
	  $result = $result."</br>";
	  
	  return $result;
>>>>>>> aed33857936f7965948d157673b8d2955c56babe
  }
}
?>
