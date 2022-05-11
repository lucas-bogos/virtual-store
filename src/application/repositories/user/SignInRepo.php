<?php

namespace source\application\repositories\user;

interface SignInRepo {
  public function SignInRepo(string $email, string $password): void;
}