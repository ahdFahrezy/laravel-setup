<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HealthCheckService;
use Illuminate\Http\JsonResponse;

class HealthCheckController extends Controller
{
    protected HealthCheckService $service;

    public function __construct(HealthCheckService $service)
    {
        $this->service = $service;
    }

    public function index(): JsonResponse
    {
        $result = $this->service->call();
        return response()->json($result->toArray(), $result->getStatusCode());
    }
}
