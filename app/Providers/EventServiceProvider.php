<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Leader;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Observers\CategoryObserver;
use App\Observers\CustomerObserver;
use App\Observers\LeaderObserver;
use App\Observers\PartnerObserver;
use App\Observers\ProjectObserver;
use App\Observers\ServiceObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Partner::observe(PartnerObserver::class);
        Customer::observe(CustomerObserver::class);
        Project::observe(ProjectObserver::class);
        Leader::observe(LeaderObserver::class);
        Service::observe(ServiceObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
