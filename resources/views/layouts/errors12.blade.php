@if(count($errors) > 0)
    <div class="row m-b" id="customerrormessages">
        <div class="col-sm-12">
            <div class="box">
                <div class="box-header danger">
                    <h3>There were some Errors</h3>
                </div>

                <div class="box-tool">
                    <ul class="nav">
                        <li class="nav-item inline">
                            <a class="nav-link" id="dialog-close-times"><i class="fa fa-fw fa-times"></i></a>
                        </li>
                    </ul>
                </div>

                <div class="box-body">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>
                                <p class="m-a-0">{{$error}}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
