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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'nullable|email',
            'message' => 'required'
        ]);

        $this->contactRepository->query()->create([
            'name' => $request->input('name', null),
            'phone' => $request->input('phone', null),
            'email' => $request->input('email', null),
            'message' => $request->input('message', null),
        ]);

        return redirect()->back()->with('success', 'Thanks for contacting us!');
    }
}
