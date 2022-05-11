<?php

declare(strict_types=1);

namespace source\application\repositories\user;

interface RegisterRepo {
  public function registerUser(string $name, string $email, string $password): void;
  public function userExists(string $email): void;
}