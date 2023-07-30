<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Str;

class ServiceObserver
{
    /**
     * Handle the Service "created" event.
     *
     * @param  \App\Models\Service  $service
     * @return void
     */
    public function created(Service $service)
    {
        do{
            $service->ref = mb_strtoupper(Str::random(10));
        }while(Service::where('ref', $service->ref)->first());

        $service->save();
    }
}
