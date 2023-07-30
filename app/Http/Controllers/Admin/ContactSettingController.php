<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ContactSettingRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactSettingController extends Controller
{
    public function __construct(
        protected ContactSettingRepository $settingRepository
    )
    {
    }

    public function index()
    {
        $settings = $this->settingRepository->query()->first();

        return Inertia::render('Contact/ContactSettings', [
            'settings' => $settings
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'nullable|email',
            'alternative_email' => 'nullable|email',
        ]);

        $settings = $this->settingRepository->savedByRequest($request);

        return to_route('contact.settings');
    }
}
