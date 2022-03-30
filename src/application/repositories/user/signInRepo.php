<?php

namespace source\application\repositories\user;

interface signInRepo {
  public function signIn(string $email, string $password): void;
}