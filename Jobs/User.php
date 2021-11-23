<?php
Class User {
  private pseudo;
  private password;
  private email;
  private isAdmin;

  public function __construct(int $id, string $pseudo, string $password, string $email="") {
    $this->id=$id;
    $this->pseudo=$pseudo;
    $this->password=$password;
    $this->email=$email;
  }

  public function get_id(): int {
    return $this->id;
  }
  public function get_pseudo(): string => $this->pseudo;
  public function get_password(): string => $this->password;
  public function get_email(): string => $this->email;
}
?>
