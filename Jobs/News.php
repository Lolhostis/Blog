<?php
Class News {
  private id;
  private description;
  private date;
  private title;
  private author;
  private pictures;
  private commentList;

  require_once("User.php");
  require_once("Picture.php");
  require_once("Comment.php");

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

  public function get_id(): int {
    return $this->id;
  }
  public function get_description(): string{
    return $this->description;
  }
  public function get_date(): string{
    return $this->date;
  }
  public function get_title(): string{
    return $this->title;
  }
  public function get_author(): User{
    return $this->author;
  }

  public function get_pictures(): Array{
    return $this->pictures;
  }
  public function get_commentList(): Array{
    return $this->commentList;
  }
}
?>
