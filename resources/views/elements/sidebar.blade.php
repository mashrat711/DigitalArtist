    <nav class="pcoded-navbar">
        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
        <div class="pcoded-inner-navbar main-menu">
            <ul class="pcoded-item pcoded-left-item">
                
                
            </ul>

            <div class="pcoded-navigation-label text-uppercase bg-custom">Artist</div>
            <ul class="pcoded-item pcoded-left-item">

                <li class="pcoded-hasmenu {{request()->routeIs(['warehouses.*','suppliers.*','banks.*','rawMaterials.*', 'units.*', 'categories.*','lcCostHeads.*']) ? "active pcoded-trigger" : null}}">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="ti-settings"></i><b>P</b></span>
                        <span class="pcoded-mtext">Artist Details</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{request()->routeIs('artists.*') ? "active" : null}}"><a href="{{ route('artists.index') }}"><span class="pcoded-micon"><i class="icon-pie-chart"></i></span><span class="pcoded-mtext"> Arists </span><span class="pcoded-mcaret"></span></a></li>
                        <li class="{{request()->routeIs('artists.*') ? "active" : null}}"><a href="{{ route('artists.create') }}"><span class="pcoded-micon"><i class="icon-pie-chart"></i></span><span class="pcoded-mtext"> Create Profile </span><span class="pcoded-mcaret"></span></a></li>
                    </ul>
                    
                </li>
                {{-- <li class="pcoded-hasmenu {{request()->routeIs(['warehouses.*','suppliers.*','banks.*','rawMaterials.*', 'units.*', 'categories.*','lcCostHeads.*']) ? "active pcoded-trigger" : null}}">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="ti-settings"></i><b>P</b></span>
                        <span class="pcoded-mtext">Art Works</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{request()->routeIs('artists.*') ? "active" : null}}"><a href="{{ route('artists.index') }}"><span class="pcoded-micon"><i class="icon-pie-chart"></i></span><span class="pcoded-mtext"> Arists </span><span class="pcoded-mcaret"></span></a></li>
                        <li class="{{request()->routeIs('artists.*') ? "active" : null}}"><a href="{{ route('artists.create') }}"><span class="pcoded-micon"><i class="icon-pie-chart"></i></span><span class="pcoded-mtext"> Create Profile </span><span class="pcoded-mcaret"></span></a></li>
                    </ul>
                    
                </li> --}}
                <li class="pcoded-hasmenu {{request()->routeIs(['warehouses.*','suppliers.*','banks.*','rawMaterials.*', 'units.*', 'categories.*','lcCostHeads.*']) ? "active pcoded-trigger" : null}}">
                    <a href="javascript:void(0)">
                        <span class="pcoded-micon"><i class="ti-settings"></i><b>P</b></span>
                        <span class="pcoded-mtext">Events</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{request()->routeIs('events.*') ? "active" : null}}"><a href="{{ route('events.index') }}"><span class="pcoded-micon"><i class="icon-pie-chart"></i></span><span class="pcoded-mtext"> Events </span><span class="pcoded-mcaret"></span></a></li>
                        <li class="{{request()->routeIs('events.*') ? "active" : null}}"><a href="{{ route('events.create') }}"><span class="pcoded-micon"><i class="icon-pie-chart"></i></span><span class="pcoded-mtext"> Create Events </span><span class="pcoded-mcaret"></span></a></li>
                    </ul>
                    
                </li>
                

                
               

            </ul>
        </div>
    </nav>
