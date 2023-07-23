<?php

namespace App\Repositories;

use App\Models\ContactSetting;

class ContactSettingRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return ContactSetting::class;
    }
}
