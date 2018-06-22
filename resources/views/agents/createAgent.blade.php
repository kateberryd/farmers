<h1>Good</h1>

@extends('layouts.master')

@section('title')
    New Farmer
@stop

@section('farmers_active')
    active
@stop

@section('navbar')
    @include('farmers.navbar')
@stop

@section('sidebar')
    @include('layouts.sidebar')
@stop

@section('more_scripts')
    <script type="text/javascript" src="/js/farm-inputs-dynamic.js"></script>
@stop


@section('content')
    <div class="padding">
        <div class="row">
            <div class="col-xs-8">
                <div class="box">
                    <div class="box-header">
                        <h2>New Field Agent</h2>
                        <small>Enter details of the Agent</small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        {{-- {!! Form::open(['route' => 'create_farmer', 'method' => 'POST', 'role' => 'form']) !!} --}}
                    <form action="{{route('create_agent')}}" method="POST" role="form">
                        {{csrf_field()}}
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{old('center_number')}}">
                                    </div>
                                </div>
                                
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{old('center_number')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="phone">Phone Number </label>
                                        <input type="text" name="phone" placeholder="Phone Number" class="form-control" value="{{old('center_number')}}">
                                    </div>
                                </div>
                                
                                
                              
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <label for="addresss">Address</label>
                                            <input type="text" name="address" placeholder="Address" class="form-control" value="{{old('center_number')}}">
                                        </div>
                                    </div>
                                
                            </div>

                           

                            <input type="submit" class="btn btn-primary" value="Create an Agent">
                                
                        </form>
                           
                    </div>
                </div>
            </div>
            
           
            
            @include('layouts.sessionmessages')
        </div>
    </div>
@stop