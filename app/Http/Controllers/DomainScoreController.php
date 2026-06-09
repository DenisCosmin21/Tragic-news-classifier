<?php

namespace App\Http\Controllers;

use App\Enums\DomainScoreClass;
use App\Services\DomainScoreService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DomainScoreController extends Controller
{
    public function __construct(
        private readonly DomainScoreService $domainScoreService
    )
    {
    }

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $domain = $request->query('domain');

        if(!$domain)
            return response()->json(['error' => 'Bad request'], 400);

        $scoreResponse = $this->domainScoreService->getDomainScore($domain);

        if($scoreResponse['class'] == DomainScoreClass::UNEXISTENT)
            return response()->json([]);

        return response()->json($scoreResponse);
    }
}
