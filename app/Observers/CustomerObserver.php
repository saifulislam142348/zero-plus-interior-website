<?php

namespace App\Observers;

use App\Models\Customer;
use Illuminate\Support\Str;

class CustomerObserver
{
    public function created(Customer $customer)
    {
        do{
            $customer->ref = mb_strtoupper(Str::random(10));
        }while(Customer::where('ref', $customer->ref)->first());

        $customer->save();
    }
}
