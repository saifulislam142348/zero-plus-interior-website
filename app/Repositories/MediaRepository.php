<?php

namespace App\Repositories;

use App\Models\Media;

class MediaRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Media::class;
    }
}
