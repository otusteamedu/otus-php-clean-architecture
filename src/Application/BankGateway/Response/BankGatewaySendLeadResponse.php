<?php

declare(strict_types=1);

namespace App\Application\BankGateway\Response;

class BankGatewaySendLeadResponse
{
    public function __construct(
        public int $bankId,
    )
    {
    }
}