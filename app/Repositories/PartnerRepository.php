<?php

namespace App\Repositories;

use App\Models\Partner;

class PartnerRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Partner::class;
    }
}
