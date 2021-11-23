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

  public function getPseudo(): string{
    return $this->pseudo;
  }

  public function getPassword(): string{
    return $this->password;
  }
  public function getIsAdmin(): bool{
    return $this->isAdmin;
  }
  public function getEmail(): string{
    return $this->email;
  }
  public function getPicture(): Picture{
    return $this->picture;
  }
}
?>
