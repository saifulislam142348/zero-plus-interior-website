<div class="project-areas section-padding">
    <div class="page-title text-center">
        <h4 class="sub-title">Portfolio</h4>
        <h2 class="title">Let’s Check Our Recent Work and Project Portfolio</h2>
    </div>
    <div class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="grid">
                        @foreach($projects as $project)
                            <div class="grid-item {{ $project->category?->ref }}">
                                <a href="{{ route('page.projects.show', $project->ref) }}">
                                    <img src="{{ $project->thumbnail->src }}" alt="">
                                    <div class="caption">{{ $project->title }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('page.projects') }}" class="btn btn-outline-primary text-uppercase btn-sm">Show All</a>
    </div>
</div>
