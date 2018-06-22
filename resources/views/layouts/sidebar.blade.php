<!-- aside -->
<div id="aside" class="app-aside fade nav-dropdown black">
    <div class="navside dk" data-layout="column">
        <div class="navbar no-radius">
            <a href="{{route('home')}}" class="navbar-brand">
                <span class="hidden-folded inline">Farmers' Database</span>
            </a>
        </div>
        <div data-flex class="hide-scroll">
            <nav class="scroll nav-stacked nav-stacked-rounded nav-color">
                @if(Auth::user()->user_type == 'admin')
                    <ul class="nav" data-ui-nav>
                        <li class="nav-header hidden-folded">
                            <span class="text-xs">
                                <strong>Farmers</strong>
                            </span>
                        </li>
    
                        <li class="@yield('farmers_active')">
                            <a href="{{route('farmer_index')}}" class="b-info">
                                <span class="nav-icon text-white no-fade">
                                    <i class="ion-android-people"></i>
                                </span>
                                <span class="nav-text">All Farmers</span>
                            </a>
                        </li>
                        
                        <li class="@yield('farmers_search_active')">
                            <a href="{{route('farmer_search')}}" class="b-warning">
                                <span class="nav-icon text-white no-fade">
                                    <i class="ion-search"></i>
                                </span>
                                <span class="nav-text">Search Farmers</span>
                            </a>
                        </li>
                    </ul>
                    
                    <ul class="nav" data-ui-nav>
                        <li class="nav-header hidden-folded">
                            <span class="text-xs">
                                <strong>Reports</strong>
                            </span>
                        </li>
    
                        <li class="@yield('reports_active')">
                            <a href="{{route('lgas_report')}}" class="b-success">
                                <span class="nav-icon text-white no-fade">
                                    <i class="ion-document"></i>
                                </span>
                                <span class="nav-text">L.G.A Reports</span>
                            </a>
                        </li>
                        
                        <li class="@yield('reports_active')">
                            <a href="{{route('centers_report')}}" class="b-accent">
                                <span class="nav-icon text-white no-fade">
                                    <i class="ion-ios-more"></i>
                                </span>
                                <span class="nav-text">Centers Reports</span>
                            </a>
                        </li>
                    </ul>
                    
                    <ul class="nav" data-ui-nav>
                        <li class="nav-header hidden-folded">
                            <span class="text-xs">
                                <strong>Local Governments</strong>
                            </span>
                        </li>
    
                        <li class="@yield('lgas_active')">
                            <a href="{{route('lga_index')}}" class="b-info">
                                <span class="nav-icon text-white no-fade">
                                    <i class="ion-android-apps"></i>
                                </span>
                                <span class="nav-text">All L.G.As</span>
                            </a>
                        </li>
                        
                        <li class="@yield('lgas_trucks_active')">
                            <a href="{{route('all_lga_trucks')}}" class="b-warn">
                                <span class="nav-icon text-white no-fade">
                                    <i class="fa fa-car"></i>
                                </span>
                                <span class="nav-text">Trucks</span>
                            </a>
                        </li>
                    </ul>
                    
                    <ul class="nav" data-ui-nav>
                        <li class="nav-header hidden-folded">
                            <span class="text-xs">
                                <strong>Centers</strong>
                            </span>
                        </li>
    
                        <li class="@yield('centers_active')">
                            <a href="{{route('center_index')}}" class="b-danger">
                                <span class="nav-icon text-white no-fade">
                                    <i class="fa fa-institution"></i>
                                </span>
                                <span class="nav-text">All Centers</span>
                            </a>
                        </li>
                    </ul>
                @endif
            </nav>
        </div>
    </div>
</div>
<!-- endaside -->
