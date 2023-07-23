<?php

namespace App\Repositories;

use App\Models\SocialMedia;

class SocialMediaRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return SocialMedia::class;
    }
}
