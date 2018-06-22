@if(session('success'))
    <div id="customsessionmessages" class="row m-b">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="box">
                <div class="box-header success">
                    <h3>Success</h3>
                </div>

                <div class="box-tool">
                    <ul class="nav">
                        <li class="nav-item inline">
                            <a class="nav-link" id="dialog-close-times"><i class="fa fa-fw fa-times"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="box-body">
                    <p class="m-a-0">{{session('success')}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
@endif

@if(session('error'))
    <div id="customsessionmessages" class="row m-b">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <div class="box">
                <div class="box-header danger">
                    <h3>Error</h3>
                </div>

                <div class="box-tool">
                    <ul class="nav">
                        <li class="nav-item inline">
                            <a class="nav-link" id="dialog-close-times"><i class="fa fa-fw fa-times"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="box-body">
                    <p class="m-a-0">{{session('error')}}</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
@endif
