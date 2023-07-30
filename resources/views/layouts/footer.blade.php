
<footer>
    <div class="footer-top" style="background-image: url('{{ asset('assets/images/dummy.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-item">
                        <div class="footer-content">
                            <div class="logo">
                                @if($siteSettingsData->footerLogo)
                                    <img src="{{ $siteSettingsData->footerLogo->src }}" alt="Footer logo">
                                @else
                                    <img src="{{ asset('assets/images/footer-logo.png') }}" alt="">
                                @endif
                            </div>
                            <p>{{ $siteSettingsData->footer_summary ?? null }}</p>

                            @if(false)
                                <div class="social-links">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/images/facebook.png') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/images/facebook.png') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/images/facebook.png') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/images/facebook.png') }}" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{ asset('assets/images/facebook.png') }}" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif'

                        </div>
                    </div>

                </div>
                <div class="col-lg-2">
                    <div class="footer-item">
                        <div class="footer-title">
                            <h5>Important links</h5>
                        </div>
                        <div class="footer-content">
                            <ul class="footer-links">
                                <li>
                                    <span><i class="bx bx-chevron-right"></i></span>
                                    <a href="{{ route('page.about') }}">About us</a>
                                </li>
                                <li>
                                    <span><i class="bx bx-chevron-right"></i></span>
                                    <a href="{{ route('page.services') }}">Services</a>
                                </li>
                                <li>
                                    <span><i class="bx bx-chevron-right"></i></span>
                                    <a href="{{ route('page.projects') }}">Projects</a>
                                </li>
                                <li>
                                    <span><i class="bx bx-chevron-right"></i></span>
                                    <a href="{{ route('page.about') }}">Career</a>
                                </li>
                                <li>
                                    <span><i class="bx bx-chevron-right"></i></span>
                                    <a href="{{ route('page.contact') }}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-item">
                        <div class="footer-title">
                            <h5>Categories</h5>
                        </div>
                        <div class="footer-content">
                            <ul class="footer-links">
                                @foreach($categoriesData as $category)
                                    <li>
                                        <span><i class="bx bx-chevron-right"></i></span>
                                        <a href="{{ route('page.projects') }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="footer-item">
                        <div class="footer-title">
                            <h5>Contacts</h5>
                        </div>
                        <div class="footer-content">
                            <ul class="footer-contact">
                                @if($contactSettingsData->phone)
                                    <li>
                                        <span class="icon">
                                            <i class="bx bx-phone"></i>
                                        </span>
                                        {{ $contactSettingsData->phone }}
                                    </li>
                                @endif
                                @if($contactSettingsData->email)
                                    <li>
                                        <span class="icon">
                                            <i class="bx bx-envelope"></i>
                                        </span>
                                        {{ $contactSettingsData->email }}
                                    </li>
                                @endif
                                @if($contactSettingsData->address_line_1)
                                    <li>
                                        <span class="icon">
                                            <i class='bx bx-map-alt'></i>
                                        </span>
                                        {{ $contactSettingsData->address_line_1 }}
                                    </li>
                                @endif
                                @if($contactSettingsData->office_time)
                                    <li>
                                        <span class="icon">
                                            <i class="bx bx-time"></i>
                                        </span>
                                        {{ $contactSettingsData->office_time }}
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p>{{ $siteSettingsData->copyright_text ?? null }}</p>
                </div>
                <div class="col-lg-6 text-right">
                    <p>Design & Developed by <a href="#">Innovetech Solution</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
