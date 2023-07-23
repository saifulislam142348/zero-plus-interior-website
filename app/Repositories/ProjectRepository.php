<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Project::class;
    }
}
