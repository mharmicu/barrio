<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <button class="btn btn-warning" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item active"><a class="nav-link" href="{{route('blotter.settled')}}">Settled Cases</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('blotter.summary')}}">Search Case</a></li>
                <x-app-layout>
                </x-app-layout>
            </ul>
        </div>
    </div>
</nav>