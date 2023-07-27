<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Repositories\CategoryRepository;
use App\Repositories\ClientRepository;
use App\Repositories\MediaRepository;
use App\Repositories\PartnerRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectRepository $projectRepository,
        protected MediaRepository $mediaRepository,
        protected CategoryRepository $categoryRepository,
        protected PartnerRepository $partnerRepository,
        protected ClientRepository $clientRepository
    )
    {
    }

    public function index()
    {
        $projects = $this->projectRepository->getByPaginate(10);

        return Inertia::render('Project/ProjectList', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $categories = $this->categoryRepository->query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
        $clients = $this->clientRepository->query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
        $partners = $this->partnerRepository->query()
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        return Inertia::render('Project/ProjectCreate', [
            'categories' => $categories,
            'clients' => $clients,
            'partners' => $partners
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['nullable', 'email'],
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $client = $this->projectRepository->storeByRequest($request);

        if ($request->hasFile('photo')) {
            $this->mediaRepository->uploadFile($request->photo, 'clients', $client);
        }

        return to_route('client.create');
    }

    public function edit($projectRef)
    {
        $client = $this->projectRepository->getByProjectRef($projectRef);

        return Inertia::render('Project/ProjectEdit', [
            'client' => $client
        ]);
    }

    public function update(Request $request, $projectRef)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['nullable', 'email'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);


        $client = $this->projectRepository->getByProjectRef($projectRef);

        $this->projectRepository->updateByRequest($request, $client->id);

        if ($request->hasFile('photo')) {
            if ($client->photo) {
                $this->mediaRepository->deleteByMediable($client);
            }

            $this->mediaRepository->uploadFile($request->photo, 'clients', $client);
        }

        return to_route('client.edit', $projectRef);
    }

    public function destroy($projectRef)
    {
        $client = $this->projectRepository->getByProjectRef($projectRef);

        if ($client->photo) {
            $this->mediaRepository->deleteByMediable($client);
        }

        $client->delete();

        return to_route('client.index');
    }




}
