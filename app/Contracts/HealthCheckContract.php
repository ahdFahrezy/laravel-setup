<?php

namespace App\Contracts;

interface HealthCheckContract
{
    public function getStatus(): array;
}
