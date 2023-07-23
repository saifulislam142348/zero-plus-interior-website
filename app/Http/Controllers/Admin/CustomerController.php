<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function __construct(
        protected CustomerRepository $customerRepository
    )
    {
    }

    public function index()
    {
        return Inertia::render('Client/ClientList');
    }
}
