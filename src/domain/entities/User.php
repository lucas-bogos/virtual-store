<?php

declare(strict_types=1);

namespace source\domain\entities;

use source\domain\valueObjects\Email;
use source\domain\valueObjects\Name;
use source\domain\valueObjects\Password;

class User
{
  private Name $name;
  private Email $email;
  private Password $password;

  public function setName(Name $name): User
  {
    $this->name = $name;
    return $this;
  }

  public function getName(): Name
  {
    return $this->name;
  }

  public function setEmail(Email $email): User
  {
    $this->email = $email;
    return $this;
  }

  public function getEmail(): Email
  {
    return $this->email;
  }

  public function setPassword(Password $password): User
  {
    $this->password = $password;
    return $this;
  }

  public function getPassword(): Password
  {
    return $this->password;
  }
}
