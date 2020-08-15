@if(auth()->user()->load('hasRoles.role')->hasRoles->role->name == 'dokter')
    <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
        <a href="{{ route('dashboard.dokter') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
    </li>

    <li class="{{ Request::is('pasiens*') ? 'active' : '' }}">
        <a href="{{ route('pasiens.index') }}"><i class="fa fa-users"></i><span>Patiens</span></a>
    </li>

    <li class="{{ Request::is('obats*') ? 'active' : '' }}">
        <a href="{{ route('obats.index') }}"><i class="fa fa-medkit"></i><span>Drugs</span></a>
    </li>

    <li class="{{ Request::is('dokters*') ? 'active' : '' }}">
        <a href="{{ route('dokters.profile') }}"><i class="fa fa-user"></i><span>My Profile</span></a>
    </li>
@endif


@if(auth()->user()->load('hasRoles.role')->hasRoles->role->name == 'apoteker')
{{--    <li class="{{ Request::is('apoteks*') ? 'active' : '' }}">--}}
{{--        <a href="{{ route('apoteks.index') }}"><i class="fa fa-edit"></i><span>Apoteks</span></a>--}}
{{--    </li>--}}

    <li class="{{ Request::is('dashboard*') ? 'active' : '' }}">
        <a href="{{ route('dashboard.apoteker') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
    </li>

    <li class="{{ Request::is('medication*') ? 'active' : '' }}">
        <a href="{{ route('medication.index') }}"><i class="fa fa-user-md"></i><span>Medications Detail</span></a>
    </li>

    <li class="{{ Request::is('apotekers*') ? 'active' : '' }}">
        <a href="{{ route('apotekers.profile') }}"><i class="fa fa-user"></i><span>My Profile</span></a>
    </li>
@endif
{{--<li class="{{ Request::is('apotekers*') ? 'active' : '' }}">--}}
{{--    <a href="{{ route('apotekers.index') }}"><i class="fa fa-edit"></i><span>Apotekers</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('reseps*') ? 'active' : '' }}">--}}
{{--    <a href="{{ route('reseps.index') }}"><i class="fa fa-edit"></i><span>Reseps</span></a>--}}
{{--</li>--}}

{{--<li class="{{ Request::is('resepDetails*') ? 'active' : '' }}">--}}
{{--    <a href="{{ route('resepDetails.index') }}"><i class="fa fa-edit"></i><span>Resep Details</span></a>--}}
{{--</li>--}}

