<?php

namespace App\Services;

use App\Enums\DomainScoreClass;
use App\Repositories\DomainScoresRepository;
use Illuminate\Support\Facades\Log;

class DomainScoreService
{
    public function __construct(
        private readonly DomainScoresRepository $domainScoresRepository
    )
    {
    }

    public function getDomainScore(string $domain): array
    {
        $score = $this->domainScoresRepository->getScore($domain);

        return [
            'class' => DomainScoreClass::fromScore($score),
            'score' => $score
        ];
    }

    private function getMainDomain(string $domain): string
    {
        if (!preg_match('#^http(s)?://#', $domain)) {
            $url = 'https://' . $domain;
        }

        return preg_replace('/^www\./', '', $domain);
    }
}
