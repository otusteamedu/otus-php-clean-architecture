<?php

declare(strict_types=1);

namespace App\Application\UseCase\Response;

class LoadLeadResponse
{
    public function __construct(
        public string $name,
        public string $phone,
        public string $description
    )
    {
    }
}