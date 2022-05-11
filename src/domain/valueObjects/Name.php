<?php

declare(strict_types=1);

namespace source\domain\valueObjects;

use DomainException;

final class Name
{
  private string $name;

  public function __construct(string $name)
  {
    if (empty($name)) {
      throw new DomainException("Name can't be empty");
    }
    if (strlen($name) > 255) {
      throw new DomainException("Name '$name' must be less than 255 chars");
    }
    $this->name = $name;
  }
}
