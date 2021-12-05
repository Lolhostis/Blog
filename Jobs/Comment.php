<?php
namespace Jobs;
//require_once("User.php");

/**
  /** \author ALLEMAND Arnaud
  /** \date 05/12/2021
  /** \file Comment.php
  /** \namespace Jobs
*/

/** \class job class of comments Comment.php
*/
Class Comment {
  private $id;
  private $text;
  private $date;
  private $hour;
  private $author;

  /** Constructor of the Comment job class
    */
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
  
  public function toString():string {
	  $result = "id : ".$this->id;
	  $result = $result.", text : ".$this->text;
	  $result = $result.", date : ".$this->date;
	  $result = $result.", hour : ".$this->hour;
	  $result = $result.", author : ".$this->author->getPseudo();
	  $result = $result."</br>";
	  
	  return $result;
  }
}
?>
