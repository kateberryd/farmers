<div class="app-header white bg b-b">
    <div class="navbar" data-pjax>
        <a data-toggle="modal" data-target="#aside" class="navbar-item pull-left hidden-lg-up p-r m-a-0">
            <i class="ion-navicon"></i>
        </a>
        {{--<div class="navbar-item pull-left h5" id="pageTitle">L.G.A Trucks</div>--}}
        <!-- navbar left -->
        <ul class="nav navbar-nav pull-left">
            <li class="nav-item">
                <button onclick="window.location='{{route('new_lga_truck')}}'" class="btn btn-md green" style="margin-top:10px;">
                    <i class="ion-android-add"></i>
                    New L.G.A Truck
                </button>
            </li>
        </ul>
        <!-- end navbar left -->
        <!-- navbar right -->
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item">
                <button onclick="window.location='{{route('logout')}}'" class="md-btn md-raised m-b-sm w-xs red" style="margin-top:10px;">Sign Out</button>
            </li>
        </ul>
        <!-- end navbar right -->
    </div>
</div>
