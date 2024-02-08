<?php

declare(strict_types=1);

namespace App\Infrastructure\BankGateway;

use App\Application\BankGateway\BankGatewayInterface;
use App\Application\BankGateway\Request\BankGatewayCalculateCommissionRequest;
use App\Application\BankGateway\Request\BankGatewaySendLeadRequest;
use App\Application\BankGateway\Response\BankGatewayCalculateCommissionResponse;
use App\Application\BankGateway\Response\BankGatewaySendLeadResponse;

class OtusBankGateway implements BankGatewayInterface
{
    public function calculateCommission(BankGatewayCalculateCommissionRequest $request): BankGatewayCalculateCommissionResponse
    {
        return new BankGatewayCalculateCommissionResponse("200.00");
    }

    public function sendLead(BankGatewaySendLeadRequest $request): BankGatewaySendLeadResponse
    {
        sleep(2);
        $id = random_int(10_000, 99_999);
        if ($id % 10 <= 2) {
            throw new \Exception("При отправке лида возникла ошибка на стороне банка");
        }
        return new BankGatewaySendLeadResponse($id);
    }
}