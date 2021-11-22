<?php
Class Comment {
  protected id;
  protected date;
  protected text;
  protected hour;
  protected author;

  require_once("User.php");

  function __construct(int $id, string $date, string $text, string $hour, User $author) {
    $this->id=$id;
    $this->date=$date;
    $this->text=$text;
    $this->hour=$hour;
    $this->author=$author;
  }

  function get_id(): int {
    return $this->id;
  }
  function get_date(): string => $this->date;
  function get_text(): string => $this->text;
  function get_hour(): string => $this->hour;
  function get_author(): User => $this->author;
}
?>
