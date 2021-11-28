<?php
Class Picture {
  private $id;
  private $uri;
  private $alt;

  public function __construct(int $id, string $URI="../Views/Resources/Pictures/img.jpg", string $ALT="Image introuvable") {
    $this->id=$id;
    $this->uri=$URI;
    $this->alt=$ALT;
  }

  public function getId(): int {
    return $this->id;
  }
  public function getUri(): string{
    return $this->uri;
  }
  public function getAlt(): string{
    return $this->alt;
  }

  public function setId(int $id) {
    $this->id = $id;
  }
  public function setUri(string $URI) {
    $this->uri = $URI;
  }
  public function setAlt(string $ALT) {
    $this->alt = $ALT;
  }
}
?>
