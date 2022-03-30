<?php

namespace source\application\repositories\user;

interface registerRepo {
  public function registerUser(string $name, string $email, string $password): void;
  public function userExists(string $email): void;
}