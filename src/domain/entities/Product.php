<?php

declare(strict_types=1);

namespace source\domain\entities;

use source\domain\enumerations\Color;
use source\domain\enumerations\Size;

class Product 
{
  private string $title;
  private string $description;
  private string $photo;
  private int $quantity;
  private int $price;
  private bool $assurance = false;
  private null|string $brand = null;
  private null|string $barCode = null;
  private null|string $color = null;
  private null|string $size = null;

  public function setTitle(string $title): self
  {
    $this->title = $title;
    return $this;
  }

  public function getTitle(): string
  {
    return $this->title;
  }

  public function setDescription(string $description): self
  {
    $this->description = $description;
    return $this;
  }

  public function getDescription(): string
  {
    return $this->description;
  }

  public function setPhoto(string $photo): self
  {
    $this->photo = $photo;
    return $this;
  }

  public function getPhoto(): string
  {
    return $this->photo;
  }

  public function setQuantity(int $quantity): self
  {
    $this->quantity = $quantity;
    return $this;
  }

  public function getQuantity(): int
  {
    return $this->quantity;
  }

  public function setPrice(int $price): self
  {
    $this->price = $price;
    return $this;
  }

  public function getPrice(): int
  {
    return $this->price;
  }

  public function setAssurance(bool $assurance): self
  {
    $this->assurance = $assurance;
    return $this;
  }

  public function getAssurance(): bool
  {
    return $this->assurance;
  }

  public function setBrand(string $brand): self
  {
    $this->brand = $brand;
    return $this;
  }

  public function getBrand(): string|null 
  {
    return $this->brand;
  }

  public function setBarCode(string $barCode): self
  {
    $this->barCode = $barCode;
    return $this;
  }

  public function getBarCode(): string|null 
  {
    return $this->barCode;
  }

  public function setColor(string $color): self
  {
    $this->color = $color;
    return $this;
  }

  public function getColor(): string|null 
  {
    return $this->color;
  }

  public function setSize(string $size): self
  {
    $this->size = $size;
    return $this;
  }

  public function getSize(): string|null 
  {
    return $this->size; 
  }
}
