<?php

declare(strict_types=1);

namespace App\Infrastructure\Repository;

use App\Domain\Entity\InsuranceLead;
use App\Domain\Entity\Lead;
use App\Domain\Entity\LoanLead;
use App\Domain\Repository\LeadRepositoryInterface;
use App\Domain\ValueObject\Name;
use App\Domain\ValueObject\Phone;

class InMemoryLeadRepository implements LeadRepositoryInterface
{
    public function save(Lead $lead): void
    {
        // Имитация сохранения в БД с присваиванием ID
        $reflectionProperty = new \ReflectionProperty(Lead::class, 'id');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($lead, 1);
    }

    public function findById(int $id): ?Lead
    {
        if ($id % 2 === 0) {
            return new LoanLead(
                new Name('Имя'),
                new Phone('9051234567')
            );
        } else {
            return new InsuranceLead(
                new Name('Имя'),
                new Phone('9051234567')
            );
        }
    }
}