<?php

declare(strict_types=1);

namespace App\Domain\Entity;

class InsuranceLead extends Lead
{
    public function getDescription(): string
    {
        return 'Insurance';
    }
}