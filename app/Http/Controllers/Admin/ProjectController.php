<?php

namespace App\Http\Controllers\Admin;

use App\Enums\ProjectStatuses;
use App\Http\Controllers\Controller;
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

    public function show($projectRef)
    {
        $project = $this->projectRepository->getByProjectRef($projectRef);

        return Inertia::render('Project/ProjectShow', [
            'project' => $project
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
            'partners' => $partners,
            'statuses' => ProjectStatuses::values()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'thumbnail' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $project = $this->projectRepository->storeByRequest($request);

        if ($request->hasFile('thumbnail')) {
            $media = $this->mediaRepository->uploadFile($request->thumbnail, 'projects', $project);
            $project->thumbnail_id = $media->id;
            $project->save();
        }

        if ($request->partner_id) {
            $project->partners()->attach([$request->partner_id]);
        }

        return to_route('project.create');
    }

    public function edit($projectRef)
    {
        $project = $this->projectRepository->getByProjectRef($projectRef);

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

        return Inertia::render('Project/ProjectEdit', [
            'project' => $project,
            'categories' => $categories,
            'clients' => $clients,
            'partners' => $partners,
            'statuses' => ProjectStatuses::values()
        ]);
    }

    public function update(Request $request, $projectRef)
    {
        $request->validate([
            'title' => ['required'],
            'thumbnail' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $project = $this->projectRepository->updateByRequest($request, $projectRef);

        if ($request->hasFile('thumbnail')) {
            $media = $this->mediaRepository->uploadFile($request->thumbnail, 'projects', $project);

            if ($project->thumbnail_id) {
                $this->mediaRepository->deleteByMediaId($project->thumbnail_id);
            }

            $project->thumbnail_id = $media->id;
            $project->save();
        }

        if ($request->partner_id) {
            $project->partners()->attach([$request->partner_id]);
        }

        return to_route('project.edit', $projectRef);
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

    public function uploadPhoto(Request $request, $projectRef)
    {
        $request->validate([
            'photo' => 'required|mimes:jpeg,jpg,png,gif'
        ]);

        $project = $this->projectRepository->query()->ofRef($projectRef)->firstOrFail();

        if ($request->hasFile('photo')) {
            $this->mediaRepository->uploadFile($request->photo, 'projects', $project);
        }

        return to_route('project.show', $project->ref);
    }

    public function deletePhoto($photoId)
    {
        $media = $this->mediaRepository->query()->findOrFail($photoId);
        $project = $this->projectRepository->query()->findOrFail($media->mediable_id);

        $this->mediaRepository->deleteByMediaId($photoId);

        return to_route('project.show', $project->ref);
    }


}
