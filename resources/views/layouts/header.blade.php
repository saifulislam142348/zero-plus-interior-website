<header class="header-area" id="headerArea">
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="/">
                            <h1>Zero Plus.</h1>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="menus">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><a href="{{ route('page.about') }}">About us</a></li>
                            <li><a href="{{ route('page.services') }}">Services</a></li>
                            <li><a href="{{ route('page.projects') }}">Projects</a></li>
                            <li><a href="{{ route('page.partners') }}">Partners</a></li>
                            <li><a href="{{ route('page.clients') }}">Clients</a></li>
                            <li class="has-btn"><a href="{{ route('page.contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@push('footer-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the header element
            const header = document.getElementById('headerArea');

            // Function to add or remove the sticky-header class based on the scroll position
            function handleScroll() {
                if (window.scrollY > 0) {
                    header.classList.add('sticky-header');
                } else {
                    header.classList.remove('sticky-header');
                }
            }

            // Attach the handleScroll function to the scroll event
            window.addEventListener('scroll', handleScroll);
        });
    </script>
@endpush
