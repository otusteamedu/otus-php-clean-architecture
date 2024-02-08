<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Lead;

interface LeadRepositoryInterface
{
    public function save(Lead $lead): void;

    public function findById(int $id): ?Lead;
}