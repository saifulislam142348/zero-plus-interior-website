<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Customer::class;
    }
}
