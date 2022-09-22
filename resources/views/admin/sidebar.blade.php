<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<!-- Sidebar-->
<div class="border-end" id="sidebar-wrapper">

    <div class="sidebar-heading border-bottom mt-3 mb-3">

        <img src="{{ asset('/img/385-logo.png')}}" width="150" height="150" alt="" class="img-fluid mx-auto d-block">
    </div>
    <div class="list-group list-group-flush ">
        <a class="list-group-item list-group-item-action text-warning text-center" href="#!">
            <script>
                var today = new Date();
                var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                document.write(date + ' ' + time);
            </script>
        </a>
        <a class="list-group-item list-group-item-action  p-3" href="{{route('home')}}"><i class="bi bi-house-door-fill"></i> Dashboard</a>
        <br>

        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#incidentSubMenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-file-earmark-text-fill"></i> Incident Report</a>
        <ul class="collapse" id="incidentSubMenu">
            <li>
                <a href="#" class="subMenu">Home 1</a>
                <hr>
            </li>
            <li>
                <a href="#" class="subMenu">Home 2</a>
                <hr>
            </li>
            <li>
                <a href="#" class="subMenu">Home 3</a>
                <hr>
            </li>
        </ul>

        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#blotterSubmenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-archive-fill"></i> Blotter</a>
        <ul class="collapse" id="blotterSubmenu">
            @if(Auth::user()->user_type_id == 1)
            <li>
                <a href="{{route('blotter.create')}}" :active="request()->routeIs('blotter.create')" class="subMenu">Create Blotter Report</a>
                <hr>
            </li>
            @endif
            <li>
                <a href="{{route('blotter.show')}}" class="subMenu">Display Ongoing Cases</a>
                <hr>
            </li>
        </ul>
        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#noticesSubMenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-exclamation-diamond-fill"></i> Notices</a>
        <ul class="collapse" id="noticesSubMenu">
            @if(Auth::user()->user_type_id == 1)
            <li>
                <a href="{{route('notice.show')}}" :active="request()->routeIs('{{route('notice.show')}}')" class="subMenu">Show Notices (Incomplete)</a>
                <hr>
            </li>
            @endif
            <li>
                <a href="{{route('notice.summary')}}" class="subMenu">List of All Cases' Notices</a>
                <hr>
            </li>
        </ul>
        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#hearingSubmenu"><i class="bi bi-file-earmark-person-fill"></i> Hearing Process</a>
        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#"><i class="bi bi-person-circle"></i> Accounts</a>
        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#"><i class="bi bi-flag-fill"></i> Activity Log</a>

    </div>
</div>


<script>
    window.addEventListener('DOMContentLoaded', event => {

        // Toggle the side navigation
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
        if (sidebarToggle) {
            // Uncomment Below to persist sidebar toggle between refreshes
            // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
            //     document.body.classList.toggle('sb-sidenav-toggled');
            // }
            sidebarToggle.addEventListener('click', event => {
                event.preventDefault();
                document.body.classList.toggle('sb-sidenav-toggled');
                localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
            });
        }

    });
</script>