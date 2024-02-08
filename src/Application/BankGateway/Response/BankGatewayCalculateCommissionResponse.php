<?php

declare(strict_types=1);

namespace App\Application\BankGateway\Response;

class BankGatewayCalculateCommissionResponse
{
    public function __construct(
        public string $commission,
    )
    {
    }
}