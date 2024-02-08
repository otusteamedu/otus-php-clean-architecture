<?php

declare(strict_types=1);

namespace App\Application\UseCase;

use App\Application\UseCase\Request\LoadLeadRequest;
use App\Application\UseCase\Response\LoadLeadResponse;
use App\Domain\Repository\LeadRepositoryInterface;

class LoadLeadUseCase
{
    public function __construct(
        private LeadRepositoryInterface $leadRepository,
    )
    {
    }

    public function __invoke(LoadLeadRequest $request): LoadLeadResponse
    {
        $lead = $this->leadRepository->findById($request->id);

        return new LoadLeadResponse(
            (string)$lead->getName(),
            (string)$lead->getPhone(),
            $lead->getDescription()
        );
    }
}