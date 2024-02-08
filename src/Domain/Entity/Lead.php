<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;

abstract class Lead
{
    protected int $id;

    public function __construct(
        protected Name $name,
        protected Phone $phone
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function setName(Name $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setPhone(Phone $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    abstract public function getDescription(): string;
}