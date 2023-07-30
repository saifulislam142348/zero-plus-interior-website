<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\MediaRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function __construct(
        protected ServiceRepository $serviceRepository,
        protected MediaRepository $mediaRepository
    )
    {
    }

    public function index()
    {
        $services = $this->serviceRepository->getByPaginate(10);

        return Inertia::render('Service/ServiceList', [
            'services' => $services
        ]);
    }

    public function show($serviceRef)
    {
        $service = $this->serviceRepository->getByServiceRef($serviceRef);

        return Inertia::render('Service/ServiceShow', [
            'service' => $service
        ]);
    }

    public function create()
    {
        return Inertia::render('Service/ServiceCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $service = $this->serviceRepository->storeByRequest($request);

        if ($request->hasFile('photo')) {
            $this->mediaRepository->uploadFile($request->photo, 'services', $service);
        }

        return to_route('service.create');
    }

    public function edit($serviceRef)
    {
        $service = $this->serviceRepository->getByServiceRef($serviceRef);

        return Inertia::render('Service/ServiceEdit', [
            'service' => $service
        ]);
    }

    public function update(Request $request, $serviceRef)
    {
        $request->validate([
            'title' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);


        $service = $this->serviceRepository->getByServiceRef($serviceRef);

        $this->serviceRepository->updateByRequest($request, $service->id);

        if ($request->hasFile('photo')) {
            if ($service->photo) {
                $this->mediaRepository->deleteByMediable($service);
            }

            $this->mediaRepository->uploadFile($request->photo, 'services', $service);
        }

        return to_route('service.edit', $serviceRef);
    }

    public function destroy($serviceRef)
    {
        $service = $this->serviceRepository->getByServiceRef($serviceRef);

        if ($service->photo) {
            $this->mediaRepository->deleteByMediable($service);
        }

        $service->delete();

        return to_route('service.index');
    }

    public function uploadPhoto(Request $request, $serviceRef)
    {
        $request->validate([
            'photo' => 'required|mimes:jpeg,jpg,png,gif'
        ]);

        $service = $this->serviceRepository->query()->ofRef($serviceRef)->firstOrFail();

        if ($request->hasFile('photo')) {
            $this->mediaRepository->uploadFile($request->photo, 'projects', $service);
        }

        return to_route('service.show', $service->ref);
    }

    public function deletePhoto($photoId)
    {
        $media = $this->mediaRepository->query()->findOrFail($photoId);
        $service = $this->serviceRepository->query()->findOrFail($media->mediable_id);

        $this->mediaRepository->deleteByMediaId($photoId);

        return to_route('service.show', $service->ref);
    }
}
