<?php

declare(strict_types=1);

namespace App\Application\BankGateway\Request;

class BankGatewayCalculateCommissionRequest
{
    public function __construct(
        public string $amount,
    )
    {
    }
}