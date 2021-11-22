<?php
Class User {
  protected id;
  protected pseudo;
  protected password;
  protected email;

  function __construct(int $id, string $pseudo, string $password, string $email="") {
    $this->id=$id;
    $this->pseudo=$pseudo;
    $this->password=$password;
    $this->email=$email;
  }

  function get_id(): int {
    return $this->id;
  }
  function get_pseudo(): string => $this->pseudo;
  function get_password(): string => $this->password;
  function get_email(): string => $this->email;
}
?>
