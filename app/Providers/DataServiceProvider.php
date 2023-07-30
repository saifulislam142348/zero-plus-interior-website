<?php

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\ContactSettingRepository;
use App\Repositories\SiteSettingRepository;
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
        $this->settingRepository = app(SiteSettingRepository::class);
        $this->contactSettingRepository = app(ContactSettingRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);

        $siteSettingsData = $this->settingRepository->getSettings();
        $contactSettingsData = $this->contactSettingRepository->first();
        $categoriesData = $this->categoryRepository->query()->get();

        view()->share('siteSettingsData', $siteSettingsData);
        view()->share('contactSettingsData', $contactSettingsData);
        view()->share('categoriesData', $categoriesData);
    }
}
