<?php

namespace App\Repositories;

use App\Models\Leader;

class LeaderRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Leader::class;
    }
}
