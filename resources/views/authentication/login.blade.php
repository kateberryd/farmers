@extends('layouts.auth-master')

@section('content')
    <div class="padding">
        <div class="navbar">
            <div class="pull-center">
                <a href="{{route('home')}}" class="navbar-brand">
                    <span class="hidden-folded inline">Farmers' Database</span>
                </a>
            </div>
        </div>
    </div>

    <div class="b-t">
    	<div class="center-block w-xxl w-auto-xs p-y-md text-center">
    		<div class="p-a-md">
			<form action="{{route('do_login')}}" method="POST">
				{{csrf_field()  }}
					<div class="form-group">
							<input type="text" name="username" class="form-control" placeholder="Username" required>
						</div>
						<div class="form-group">
							<input type="password" class="form-control" placeholder="password" required name="password">
						</div>
						<div class="m-b-md">
							<label class="md-check">
								<input type="checkbox" name="remember"><i class="primary"></i> Keep me signed in
							</label>
						</div>
						<input type="submit" class="btn btn-lg dark p-x-lg" value="Sign in">
			</form>
    			{{-- {!! Form::open(['route' => 'do_login', 'method' => 'POST']) !!} --}}
    			
    		</div>
    	</div>
    </div>

    @include('layouts.errors')
    @include('layouts.sessionmessages')
@stop
