<?php
Class Picture {
  private id;
  private uri;
  private alt;

  public function __construct(int $id, string $URI, string $ALT="../Views/Resources/Pictures/img.jpg") {
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
}
?>
