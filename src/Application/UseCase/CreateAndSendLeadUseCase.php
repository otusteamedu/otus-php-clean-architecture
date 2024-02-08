<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Application\BankGateway\BankGatewayInterface;
use App\Application\BankGateway\Request\BankGatewayCalculateCommissionRequest;
use App\Application\BankGateway\Request\BankGatewaySendLeadRequest;
use App\Application\UseCase\Request\CreateAndSendLeadRequest;
use App\Application\UseCase\Response\CreateAndSendLeadResponse;
use App\Domain\Entity\Lead;
use App\Domain\Repository\LeadRepositoryInterface;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;

class CreateAndSendLeadUseCase
{
    public function __construct(
        private BankGatewayInterface $bankGateway,
        private LeadRepositoryInterface $leadRepository,
    )
    {
    }

    public function __invoke(CreateAndSendLeadRequest $request): CreateAndSendLeadResponse
    {
        $lead = new Lead(
            new Name($request->name),
            new Phone($request->phone)
        );
        $this->leadRepository->save($lead);

        $amount = "10000.00";
        $commissionResponse = $this->bankGateway->calculateCommission(
            new BankGatewayCalculateCommissionRequest($amount)
        );
        // todo Обрабатываем информацию о комиссии

        $gatewayResponse = $this->bankGateway->sendLead(
            new BankGatewaySendLeadRequest(
                $amount,
                (string) $lead->getName(),
                (string) $lead->getPhone()
            )
        );

        return new CreateAndSendLeadResponse($lead->getId(), $gatewayResponse->bankId);
    }
}