<?php
Class News {
  protected id;
  protected date;
  protected description;
  protected title;
  protected author;
  protected pictures;

  require_once("User.php");

  function __construct(int $id, string date, string $description, string $title, User $author, string $picture=array()) {
    $this->id=$id;
    $this->picture=$picture;
    $this->description=$description;
    $this->title=$title;
    $this->author=$author;
    $this->date=$date;
  }

  function get_id(): int {
    return $this->id;
  }
  function get_date(): string => $this->date;
  function get_picture(): string => $this->picture;
  function get_description(): string => $this->description;
  function get_title(): string => $this->title;
  function get_author(): User => $this->author;
  function get_date(): string => $this->date;
}
?>
