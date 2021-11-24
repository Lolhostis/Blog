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

    foreach ($pictures as $my) {
      $this->pictures[] = $my;
    }

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
}
?>
