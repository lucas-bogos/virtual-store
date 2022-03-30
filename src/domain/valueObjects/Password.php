<?php

declare(strict_types=1);

namespace source\domain\valueObjects;

use DomainException;

final class Password {
  private string $password;

  public function __construct(string $password)
  {
    if(mb_strlen($password) < 8) {
      throw new DomainException("Password must be larger or equal than 8 chars");
    }
    $this->password = $password;
  }

  public static function createFromHashedPassword(string $password): Password
  {
      $self = unserialize(sprintf('O:%u:"%s":0:{}', strlen(self::class), self::class));
      $self->password = $password;

      return $self;
  }

  public function checkValidity(string $password): bool
  {
      return password_verify($password, $this->password);
  }
}