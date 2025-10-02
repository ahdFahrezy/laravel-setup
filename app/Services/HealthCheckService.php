<?php

namespace App\Services;

use App\Base\ServiceBase;
use App\Responses\ServiceResponse;
use Illuminate\Support\Facades\Log;
use App\Contracts\HealthCheckContract;
use Throwable;

class HealthCheckService extends ServiceBase
{
    protected HealthCheckContract $repo;

    public function __construct(HealthCheckContract $repo)
    {
        $this->repo = $repo;
    }

    /**
     * Main method of this service
     *
     * @return ServiceResponse
     */
    public function call(): ServiceResponse
    {
        try {
            $data = $this->repo->getStatus();
            return self::success($data, "Healthy", 200, " OK ");
        } catch (Throwable $th) {

            Log::error(self::class, [
                'Message ' => $th->getMessage(),
                'On file ' => $th->getFile(),
                'On line ' => $th->getLine()
            ]);
            return self::error(null, $th->getMessage());
        }
    }
}