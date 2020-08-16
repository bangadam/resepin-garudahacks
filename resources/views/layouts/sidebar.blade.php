<aside class="main-sidebar" id="sidebar-wrapper">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                @if($user->hasRoles->role->name == 'dokter')
                    <img
                        src="http://167.172.70.208:8001/images/dokter.png"
                        class="img-circle" alt="User Image"/>
                @elseif($user->hasRoles->role->name == 'apoteker')
                    <img
                        src="http://167.172.70.208:8001/images/apoteker.png"
                        class="img-circle" alt="User Image"/>
                @elseif($user->hasRoles->role->name == 'pasien')
                    <img
                        src="https://thumbs.dreamstime.com/b/black-solid-icon-boy-patient-boy-patient-logo-pills-medical-black-solid-icon-boy-patient-pills-medical-147675883.jpg"
                        class="img-circle" alt="User Image"/>
                @endif
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                    <p>Resepin</p>
                @else
                    <p>{{ Auth::user()->name}}</p>
            @endif
            <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
