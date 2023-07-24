<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PartnerRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PartnerController extends Controller
{
    public function __construct(
        protected PartnerRepository $partnerRepository
    )
    {
    }

    public function index()
    {
        $partners = $this->partnerRepository->getByPaginate();

        return Inertia::render('Partner/PartnerList', [
            'partners' => $partners
        ]);
    }

    public function create()
    {
        return Inertia::render('Partner/PartnerCreate');
    }

    public function store(Request $request)
    {

    }
}
