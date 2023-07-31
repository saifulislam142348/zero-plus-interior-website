<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\ClientRepository;
use App\Repositories\LeaderRepository;
use App\Repositories\PartnerRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\ServiceRepository;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function __construct(
        protected ClientRepository $clientRepository,
        protected PartnerRepository $partnerRepository,
        protected CategoryRepository $categoryRepository,
        protected ProjectRepository $projectRepository,
        protected ServiceRepository $serviceRepository,
        protected LeaderRepository $leaderRepository
    )
    {
    }

    public function index()
    {
        $leaders = $this->leaderRepository->query()->take(4)->get();
        $services = $this->serviceRepository->query()->take(3)->latest()->get();
        $projects = $this->projectRepository->query()->inRandomOrder()->take(6)->get();

        return view('index', compact('leaders', 'services', 'projects'));
    }

    public function about()
    {
        $services = $this->serviceRepository->query()->take(3)->latest()->get();

        return view('about', compact('services'));
    }

    public function servies()
    {
        $services = $this->serviceRepository->query()->latest()->get();

        return view('services', compact('services'));
    }

    public function partners()
    {
        $partners = $this->partnerRepository->query()->get();

        return view('partners', compact('partners'));
    }

    public function clients()
    {
        $clients = $this->clientRepository->query()->get();

        return view('clients', compact('clients'));
    }
    public function contact()
    {
        return view('contact');
    }
}
