<?php

declare(strict_types=1);

namespace App\Domain\Entity;

class LoanLead extends Lead
{
    public function getDescription(): string
    {
        return 'Loan';
    }
}