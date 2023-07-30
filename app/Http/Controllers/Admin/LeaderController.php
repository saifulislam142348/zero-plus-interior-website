<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\LeaderRepository;
use App\Repositories\MediaRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeaderController extends Controller
{
    public function __construct(
        protected LeaderRepository $leaderRepository,
        protected MediaRepository $mediaRepository
    )
    {
    }

    public function index()
    {
        $leaders = $this->leaderRepository->getByPaginate(10);

        return Inertia::render('Leader/LeaderList', [
            'leaders' => $leaders
        ]);
    }

    public function create()
    {
        return Inertia::render('Leader/LeaderCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $leader = $this->leaderRepository->storeByRequest($request);

        if ($request->hasFile('photo')) {
            $this->mediaRepository->uploadFile($request->photo, 'leaders', $leader);
        }

        return to_route('leader.create');
    }

    public function edit($leaderRef)
    {
        $leader = $this->leaderRepository->getByLeaderRef($leaderRef);

        return Inertia::render('Leader/LeaderEdit', [
            'leader' => $leader
        ]);
    }

    public function update(Request $request, $leaderRef)
    {
        $request->validate([
            'name' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);


        $leader = $this->leaderRepository->getByLeaderRef($leaderRef);

        $this->leaderRepository->updateByRequest($request, $leader->id);

        if ($request->hasFile('photo')) {
            if ($leader->photo) {
                $this->mediaRepository->deleteByMediable($leader);
            }

            $this->mediaRepository->uploadFile($request->photo, 'leaders', $leader);
        }

        return to_route('leader.edit', $leaderRef);
    }

    public function destroy($leaderRef)
    {
        $leader = $this->leaderRepository->getByLeaderRef($leaderRef);

        if ($leader->photo) {
            $this->mediaRepository->deleteByMediable($leader);
        }

        $leader->delete();

        return to_route('leader.index');
    }
}
