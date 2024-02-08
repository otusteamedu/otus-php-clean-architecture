<?php

declare(strict_types=1);

namespace App\Domain\ValueObject;

class Name
{
    private string $value;

    public function __construct(string $value)
    {
        $this->assertValidName($value);
        $this->value = $value;
    }

    private function assertValidName(string $value): void
    {
        if (mb_strlen($value) < 2) {
            throw new \InvalidArgumentException("Имя должно содержать минимум 3 символа");
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function __toString(): string {
        return $this->value;
    }
}