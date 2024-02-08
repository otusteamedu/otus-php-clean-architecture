<?php

declare(strict_types=1);

namespace App\Application\UseCase\Request;

class CreateAndSendLeadRequest
{
    public function __construct(
        public string $name,
        public string $phone,
    )
    {
    }
}