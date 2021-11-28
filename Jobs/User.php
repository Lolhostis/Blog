<?php
Class User {
  private $pseudo;
  private $password;
  private $email;
  private $isAdmin;
  private $picture;

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

  public function setPseudo(string $login){
    $this->pseudo = $login;
  }
  public function setPassword(string $password){
    $this->password = $password;
  }
  public function setIsAdmin(bool $isAdmin){
    $this->isAdmin = $isAdmin;
  }
  public function setEmail(string $email){
    $this->email = $email;
  }
  public function setPicture(Picture $profile_picture){
    $this->picture = $profile_picture;
  }

    public function toString():string {
    $result = "pseudo : ".$this->pseudo;
    $result = $result.", password : ".$this->password;
    $result = $result.", email : ".$this->email;
    $result = $result.", isAdmin : ".$this->isAdmin;
    $result = $result.", picture : ".$this->picture->getId();
    $result = $result."</br>";

    return $result;
  }
}
?>
