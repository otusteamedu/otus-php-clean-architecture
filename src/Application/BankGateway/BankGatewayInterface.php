<?php

declare(strict_types=1);

namespace App\Application\BankGateway;

use App\Application\BankGateway\Request\BankGatewayCalculateCommissionRequest;
use App\Application\BankGateway\Request\BankGatewaySendLeadRequest;
use App\Application\BankGateway\Response\BankGatewayCalculateCommissionResponse;
use App\Application\BankGateway\Response\BankGatewaySendLeadResponse;

interface BankGatewayInterface
{
    public function calculateCommission(BankGatewayCalculateCommissionRequest $request): BankGatewayCalculateCommissionResponse;

    public function sendLead(BankGatewaySendLeadRequest $request): BankGatewaySendLeadResponse;
}