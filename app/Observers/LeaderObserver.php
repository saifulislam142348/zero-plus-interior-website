<?php

namespace App\Observers;

use App\Models\Leader;
use Illuminate\Support\Str;

class LeaderObserver
{
    /**
     * Handle the Leader "created" event.
     *
     * @param  \App\Models\Leader  $leader
     * @return void
     */
    public function created(Leader $leader)
    {
        do{
            $leader->ref = mb_strtoupper(Str::random(10));
        }while(Leader::where('ref', $leader->ref)->first());

        $leader->save();
    }
}
