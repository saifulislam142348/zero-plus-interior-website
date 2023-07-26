<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Str;

class ProjectObserver
{
    public function created(Project $project)
    {
        do{
            $project->ref = mb_strtoupper(Str::random(10));
        }while(Project::where('ref', $project->ref)->first());

        $project->save();
    }


}
