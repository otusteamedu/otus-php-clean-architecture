<?php

declare(strict_types=1);

namespace App\Application\UseCase\Request;

class LoadLeadRequest
{
    public function __construct(
        public int $id,
    )
    {
    }
}