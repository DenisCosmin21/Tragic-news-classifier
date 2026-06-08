<?php

namespace App\Services;

use App\Repositories\DomainScoresRepository;
use Illuminate\Support\Facades\Log;

class DomainScoreService
{
    public function __construct(
        private readonly DomainScoresRepository $domainScoresRepository
    )
    {
    }

    public function getDomainScore(string $domain): ?float
    {
        return $this->domainScoresRepository->getScore($domain);
    }

    private function getMainDomain(string $domain): string
    {
        if (!preg_match('#^http(s)?://#', $domain)) {
            $url = 'https://' . $domain;
        }

        return preg_replace('/^www\./', '', $domain);
    }
}
