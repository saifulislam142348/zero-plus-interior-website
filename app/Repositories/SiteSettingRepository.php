<?php

namespace App\Repositories;

use App\Models\SiteSetting;

class SiteSettingRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return SiteSetting::class;
    }
}
