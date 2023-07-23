<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Service::class;
    }
}
