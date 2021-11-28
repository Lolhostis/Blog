<?php
require_once("User.php");
require_once("Picture.php");
require_once("Comment.php");

Class News {
  private $id;
  private $description;
  private $date;
  private $title;
  private $author;
  private $pictures;
  private $commentList;

  public function __construct(int $id, string $description, string $date, string $title, User $author, array $pictures=array(), array $commentList=array()) {
    $this->id=$id;
    $this->description=$description;
    $this->date=$date;
    $this->title=$title;
    $this->author=$author;

    $this->pictures = [];
    foreach ($pictures as $my) {
      $this->pictures[] = $my;
    }

    $this->commentList = [];
    foreach ($commentList as $my) {
      $this->commentList[] = $my;
    }

  }

  public function getId(): int {
    return $this->id;
  }
  public function getDescription(): string{
    return $this->description;
  }
  public function getDate(): string{
    return $this->date;
  }
  public function getTitle(): string{
    return $this->title;
  }
  public function getAuthor(): User{
    return $this->author;
  }

  public function getPictures(): Array{
    return $this->pictures;
  }
  public function getCommentList(): Array{
    return $this->commentList;
  }

  public function toString():string {
    $result = "id : ".$this->id;
    $result = $result.", description : ".$this->description;
    $result = $result.", date : ".$this->date;
    $result = $result.", title : ".$this->title;
    $result = $result.", author : ".$this->author->getPseudo();

    $result = $result.", pictures : ";
    foreach($this->pictures as $p){
         $result = $result .$p . "\t";
    }

    $result = $result.", commentList : ";
    foreach($this->commentList as $cl){
         $result = $result .$cl . "\t";
    }

    $result = $result."</br>";

    return $result;
  }
}
?>
