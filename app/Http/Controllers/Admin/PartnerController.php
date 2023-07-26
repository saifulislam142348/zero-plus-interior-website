<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MediaRepository;
use App\Repositories\PartnerRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PartnerController extends Controller
{
    public function __construct(
        protected PartnerRepository $partnerRepository,
        protected MediaRepository $mediaRepository
    )
    {
    }

    public function index()
    {
        $partners = $this->partnerRepository->getByPaginate(10);

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
        $request->validate([
            'name' => ['required'],
            'email' => ['nullable', 'email'],
            'logo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $partner = $this->partnerRepository->storeByRequest($request);

        if ($request->hasFile('logo')) {
            $this->mediaRepository->uploadFile($request->logo, 'partners', $partner);
        }

        return to_route('partner.create');
    }

    public function edit($partnerRef)
    {
        $partner = $this->partnerRepository->getByPartnerRef($partnerRef);

        return Inertia::render('Partner/PartnerEdit', [
           'partner' => $partner
        ]);
    }

    public function update(Request $request, $partnerRef)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['nullable', 'email'],
            'logo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);


        $partner = $this->partnerRepository->getByPartnerRef($partnerRef);

        $this->partnerRepository->updateByRequest($request, $partner->id);

        if ($request->hasFile('logo')) {
            if ($partner->logo) {
                $this->mediaRepository->deleteByMediable($partner);
            }

            $this->mediaRepository->uploadFile($request->logo, 'partners', $partner);
        }

        return to_route('partner.edit', $partnerRef);
    }

    public function destroy($partnerRef)
    {
        $partner = $this->partnerRepository->getByPartnerRef($partnerRef);

        if ($partner->logo) {
            $this->mediaRepository->deleteByMediable($partner);
        }

        $partner->delete();

        return to_route('partner.index');
    }
}
