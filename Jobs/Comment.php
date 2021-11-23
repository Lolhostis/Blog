<?php
Class Comment {
  private id;
  private text;
  private date;
  private hour;
  private author;

  require_once("User.php");

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
}
?>
