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
  private string $phoneNumber;
  private string $birth;
  private null|string $photo = null;
  private null|string $rg = null;
  private null|string $cpf = null;
  private null|string $street = null;
  private null|int $streetNumber = null;
  private null|string $district = null;
  private null|string $state = null;
  private null|string $city = null;
  private null|string $zipCode = null;

  public function setName(Name $name): self
  {
    $this->name = $name;
    return $this;
  }

  public function getName(): Name
  {
    return $this->name;
  }

  public function setEmail(Email $email): self
  {
    $this->email = $email;
    return $this;
  }

  public function getEmail(): Email
  {
    return $this->email;
  }

  public function setPassword(Password $password): self
  {
    $this->password = $password;
    return $this;
  }

  public function getPassword(): Password
  {
    return $this->password;
  }

  public function setPhoneNumber(string $phoneNumber): self
  {
    $this->phoneNumber = $phoneNumber;
    return $this;
  }
  
  public function getPhoneNumber(): string
  {
    return $this->phoneNumber;
  }

  public function setBirth(string $birth): self
  {
    $this->birth = $birth;
    return $this;
  }

  public function getBirth(): string
  {
    return $this->birth;
  }

  public function setPhoto(string|null $photo): self
  {
    $this->photo = $photo;
    return $this;
  }

  public function getPhoto(): string|null
  {
    return $this->photo;
  }

  public function setRg(string|null $rg): self
  {
    $this->rg = $rg;
    return $this;
  }

  public function getRg(): string|null
  {
    return $this->rg;
  }

  public function setCpf(string|null $cpf): self
  {
    $this->cpf = $cpf;
    return $this;
  }

  public function getCpf(): string|null
  {
    return $this->cpf;
  }

  public function setStreet(string|null $street): self
  {
    $this->street = $street;
    return $this;
  }

  public function getStreet(): string|null
  {
    return $this->street;
  }

  public function setStreetNumber(int|null $streetNumber): self
  {
    $this->streetNumber = $streetNumber;
    return $this;
  }

  public function getStreetNumber(): int|null
  {
    return $this->streetNumber;
  }

  public function setDistrict(string|null $district): self
  {
    $this->district = $district;
    return $this;
  }

  public function getDistrict(): string|null
  {
    return $this->district;
  }

  public function setState(string|null $state): self
  {
    $this->state = $state;
    return $this;
  }

  public function getState(): string|null
  {
    return $this->state;
  }

  public function setCity(string|null $city): self
  {
    $this->city = $city;
    return $this;
  }

  public function getCity(): string|null
  {
    return $this->city;
  }

  public function setZipCode(string|null $zipCode): self
  {
    $this->zipCode = $zipCode;
    return $this;
  }

  public function getZipCode(): string|null
  {
    return $this->zipCode;
  }
}
