<?php

namespace App\Repositories;

use App\Contracts\HealthCheckContract;

class HealthCheckRepository implements HealthCheckContract
{
    public function getStatus(): array
    {
        return [
            'status' => 'ok',
            'timestamp' => now()->toIso8601String(),
        ];
    }
}