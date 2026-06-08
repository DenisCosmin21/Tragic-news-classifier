<?php

namespace App\Repositories;

use App\Models\DomainScore;

class DomainScoresRepository
{
    public function getScore(string $domain): ?float
    {
        return DomainScore::select('domain_name', 'score')
            ->where('domain_name', $domain)
            ->first()
            ->score ?? NULL;
    }
}
