<?php

namespace App\Contracts;

use App\Responses\ServiceResponse;

interface ServiceContract
{
    /**
     * Setiap service wajib punya call().
     *
     * @return ServiceResponse
     */
    public function call(): ServiceResponse;
}
