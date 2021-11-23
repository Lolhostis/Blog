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

  public function get_id(): int {
    return $this->id;
  }
  public function get_uri(): string => $this->uri;
  public function get_alt(): string => $this->alt;
}
?>
