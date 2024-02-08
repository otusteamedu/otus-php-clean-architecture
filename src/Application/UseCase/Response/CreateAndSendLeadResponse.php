<?php

declare(strict_types=1);

namespace App\Application\UseCase\Response;

class CreateAndSendLeadResponse
{
    public function __construct(
        public int $id,
        public int $bankId,
    )
    {
    }
}