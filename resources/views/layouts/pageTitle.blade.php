@if(Route::currentRouteName() !== 'home')
    <div class="page-title-section" style="background-image: url('{{ asset('assets/images/dummy.jpg') }}')">
        <div class="page-title-content d-flex justify-center align-items-center">
            <div class="text-center w-100">
                <h3>@yield('pageTitle', ucfirst(str_replace('page.', '', Route::currentRouteName())) ?? 'Zero Plus')</h3>
                <p>Home > @yield('pageTitle', ucfirst(str_replace('page.', '', Route::currentRouteName())) ?? 'Zero plus')</p>
            </div>
        </div>
    </div>
@endif
