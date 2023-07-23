<?php

namespace App\Repositories;

use App\Models\Contact;

class ContactRepository extends Repository
{

    /**
     * @inheritDoc
     */
    public function model()
    {
        return Contact::class;
    }
}
