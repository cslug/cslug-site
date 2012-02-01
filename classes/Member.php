<?php

class Member {

  private $name;
  private $position;
  private $link;

  function __construct($name, $position, $link) {

    $this->name = ucfirst($name);
    $this->position = ucfirst($position);
    $this->link = $link;
  }

  function getName() {
    return $this->name;
  }

  function getPosition() {
    return $this->position;
  }

  function getLink() {
    return $this->link;
  }

}

?>
