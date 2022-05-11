<?php

declare(strict_types=1);

namespace source\domain\valueObjects;

use DomainException;

final class Email
{
  private string $email;

  public function __construct(string $email)
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      throw new DomainException("Email é inválido");
    }
    $this->email = $email;
  }
}
