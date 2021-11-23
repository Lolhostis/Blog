<?php
Class User {
  private pseudo;
  private password;
  private email;
  private isAdmin;
  private picture;

  public function __construct(string $pseudo, string $password, Picture $picture, bool $isAdmin=false, string $email="") {
    $this->pseudo=$pseudo;
    $this->password=$password;
    $this->picture=$picture;
    $this->isAdmin=$isAdmin;
    $this->email=$email;
  }

  public function get_pseudo(): string{
    return $this->pseudo;
  }

  public function get_password(): string{
    return $this->password;
  }
  public function get_isAdmin(): bool{
    return $this->isAdmin;
  }
  public function get_email(): string{
    return $this->email;
  }
  public function get_picture(): Picture{
    return $this->picture;
  }
}
?>
