<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ContactRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function __construct(
        protected ContactRepository $contactRepository
    )
    {
    }

    public function index()
    {
        $contacts = $this->contactRepository->query()
            ->latest()
            ->paginate();

        return Inertia::render('Contact/ContactList', [
            'contacts' => $contacts
        ]);
    }
}
