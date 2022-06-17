<?php

declare(strict_types=1);

namespace source\domain\valueObjects;

use DomainException;

final class Password
{
  private static string $password;
  private static array $options = ['cost' => 12];

  public function __construct(string $password)
  {
    if (mb_strlen($password) < 8) {
        throw new DomainException("Password must be larger or equal than 8 chars");
    }
    self::$password = password_hash($password, PASSWORD_BCRYPT, self::$options);
  }

  public static function createFromHashedPassword(string $password): Password
  {
    $self = unserialize(sprintf('O:%u:"%s":0:{}', strlen(self::class), self::class));
    $self->password = $password;

    return $self;
  }

  public static function checkValidity(string $password, string $hash): bool
  {
    return password_verify($password, $hash);
  }

  public function __toString(): string
  {
      return self::$password;
  }
}
