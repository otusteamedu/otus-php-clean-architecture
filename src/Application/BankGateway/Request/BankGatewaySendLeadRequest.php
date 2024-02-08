<?php

declare(strict_types=1);

namespace App\Application\BankGateway\Request;

class BankGatewaySendLeadRequest
{
    public function __construct(
        public string $amount,
        public string $name,
        public string $phone,
    )
    {
    }
}