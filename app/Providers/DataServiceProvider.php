<?php

namespace App\Providers;

use App\Models\Visitor;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactSettingRepository;
use App\Repositories\SiteSettingRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{
    protected SiteSettingRepository $settingRepository;
    protected ContactSettingRepository $contactSettingRepository;
    protected CategoryRepository $categoryRepository;
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (
            Schema::hasTable('site_settings') &&
            Schema::hasTable('contact_settings') &&
            Schema::hasTable('categories')
        ) {
            $this->settingRepository = app(SiteSettingRepository::class);
            $this->contactSettingRepository = app(ContactSettingRepository::class);
            $this->categoryRepository = app(CategoryRepository::class);

            $siteSettingsData = $this->settingRepository->getSettings();
            $contactSettingsData = $this->contactSettingRepository->first();
            $categoriesData = $this->categoryRepository->query()->get();
            $visitorCount = Visitor::find(1);

            view()->share('siteSettingsData', $siteSettingsData);
            view()->share('contactSettingsData', $contactSettingsData);
            view()->share('categoriesData', $categoriesData);
            view()->share('visitorsCount', $visitorCount);
        } else {
            view()->share('siteSettingsData', null);
            view()->share('contactSettingsData', null);
            view()->share('categoriesData', null);
            view()->share('visitorsCount', 0);
        }
    }
}
