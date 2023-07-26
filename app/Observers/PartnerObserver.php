<?php

namespace App\Observers;

use App\Models\Partner;
use Illuminate\Support\Str;

class PartnerObserver
{
    /**
     * Handle the Partner "created" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function created(Partner $partner)
    {
        do{
            $partner->ref = mb_strtoupper(Str::random(10));
        }while(Partner::where('ref', $partner->ref)->first());

        $partner->save();
    }
}
