<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- Sidebar-->
<div class="border-end" id="sidebar-wrapper">

    <div class="sidebar-heading border-bottom mt-3 mb-3">

        <img src="{{ asset('/img/385-logo.png')}}" width="150" height="150" alt="" class="img-fluid mx-auto d-block">
    </div>



    <div class="list-group list-group-flush" data-spy="affix" data-offset-top="205">
        <a class="list-group-item list-group-item-action text-warning text-center" href="#!">
            <script>
                var today = new Date();
                var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                document.write(date + ' ' + time);
            </script>
        </a>


        <br>
        <span class="fw-bold p-2">ANALYTICS</span>
        <a class="list-group-item list-group-item-action p-3" href="{{route('home')}}"><i class="bi bi-grid"></i> Dashboard</a>
        <br>


        <span class="fw-bold p-2">CONTENT</span>
        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#blotterSubmenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-pen"></i> Blotter</a>
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
            <li>
                <a href="{{route('blotter.settled')}}" class="subMenu">Settled Cases</a>
                <hr>
            </li>
            <li>
                <a href="{{route('blotter.summary')}}" class="subMenu">Search</a>
                <hr>
            </li>
            <li>
                <a href="{{route('blotter.court-actions')}}" class="subMenu">Court Actions</a>
                <hr>
            </li>
        </ul>


        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#noticesSubMenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-bell"></i> Notices</a>
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


        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#hearingSubmenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-alarm"></i> Hearing Process</a>
        <ul class="collapse" id="hearingSubmenu">
            <li>
                <a href="{{route('settlement.show.mediation')}}" :active="request()->routeIs('{{route('settlement.show.mediation')}}')" class="subMenu">Mediation Hearings</a>
                <hr>
            </li>
            <li>
                <a href="{{route('settlement.show.conciliation')}}" :active="request()->routeIs('{{route('settlement.show.conciliation')}}')" class="subMenu">Conciliation Hearings</a>
                <hr>
            </li>
            <li>
                <a href="{{route('settlement.show.arbitration')}}" :active="request()->routeIs('{{route('settlement.show.arbitration')}}')" class="subMenu">Arbitration Hearings</a>
                <hr>
            </li>
        </ul>

        
        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#incidentSubMenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-inboxes"></i> Incident Report</a>
        <ul class="collapse" id="incidentSubMenu">
            <li>
                <a href="{{ route('user.show') }}" class="subMenu">Display Incident Reports</a>
                <hr>
            </li>
        </ul>

        <br>
        <span class="fw-bold p-2">MANAGEMENT</span>
        <a class="list-group-item list-group-item-action  p-3 dropdown-toggle" href="#accountSubmenu" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-person"></i> Accounts</a>
        <ul class="collapse" id="accountSubmenu">
            <li>
                <a href="{{route('account.register')}}" :active="request()->routeIs('{{route('account.register')}}')" class="subMenu">Register New Account</a>
                <hr>
            </li>
            <li>
                <a href="{{route('account.show')}}" class="subMenu">Manage Accounts</a>
                <hr>
            </li>
        </ul>

        <a class="list-group-item list-group-item-action  p-3 " href="{{route('blotter.kp_case')}}"><i class="bi bi-list-check"></i> KP Cases</a>

        <a class="list-group-item list-group-item-action  p-3 " href="{{route('activity_logs.show')}}"><i class="bi bi-flag"></i> Activity Logs</a>

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