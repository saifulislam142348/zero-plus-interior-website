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

    public function getByPaginate($limit = 15)
    {
        return $this->query()
            ->with('media')
            ->latest()
            ->paginate($limit);
    }
}
