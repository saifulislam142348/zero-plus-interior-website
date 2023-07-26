<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CustomerController extends Controller
{
    public function __construct(
        protected ClientRepository $clientRepository,
        protected MediaRepository  $mediaRepository
    )
    {
    }

    public function index()
    {
        $clients = $this->clientRepository->getByPaginate(10);

        return Inertia::render('Client/ClientList', [
            'clients' => $clients
        ]);
    }

    public function create()
    {
        return Inertia::render('Client/ClientCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['nullable', 'email'],
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $client = $this->clientRepository->storeByRequest($request);

        if ($request->hasFile('photo')) {
            $this->mediaRepository->uploadFile($request->photo, 'clients', $client);
        }

        return to_route('client.create');
    }

    public function edit($clientRef)
    {
        $client = $this->clientRepository->getByClientRef($clientRef);

        return Inertia::render('Client/ClientEdit', [
            'client' => $client
        ]);
    }

    public function update(Request $request, $clientRef)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['nullable', 'email'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);


        $client = $this->clientRepository->getByClientRef($clientRef);

        $this->clientRepository->updateByRequest($request, $client->id);

        if ($request->hasFile('photo')) {
            if ($client->photo) {
                $this->mediaRepository->deleteByMediable($client);
            }

            $this->mediaRepository->uploadFile($request->photo, 'clients', $client);
        }

        return to_route('client.edit', $clientRef);
    }

    public function destroy($clientRef)
    {
        $client = $this->clientRepository->getByClientRef($clientRef);

        if ($client->photo) {
            $this->mediaRepository->deleteByMediable($client);
        }

        $client->delete();

        return to_route('client.index');
    }
}
