@extends('layouts.master')

@section('title')
    New L.G.A Truck
@stop

@section('lgas_trucks_active')
    active
@stop

@section('navbar')
    @include('lgas.trucks.navbar')
@stop

@section('sidebar')
    @include('layouts.sidebar')
@stop

@section('content')
    <div class="padding">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h2>New L.G.A Truck</h2>
                        <small>Enter details of the truck moving fertilizers to the L.G.A.</small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        {!! Form::open(['route' => 'create_lga_truck', 'method' => 'POST', 'role' => 'form']) !!}
                            <div class="form-group">
                                <label for="date">Date</label>
                            	<div class='input-group date' data-ui-jp="datetimepicker" data-ui-options="{
                            	    format: 'DD/MM/YYYY',
                            		icons: {
                            		time: 'fa fa-clock-o',
                            		date: 'fa fa-calendar',
                            		up: 'fa fa-chevron-up',
                            		down: 'fa fa-chevron-down',
                            		previous: 'fa fa-chevron-left',
                            		next: 'fa fa-chevron-right',
                            		today: 'fa fa-screenshot',
                            		clear: 'fa fa-trash',
                            		close: 'fa fa-remove'
                            		}
                            		}">
                            		<input type='text' class="form-control" name="date" placeholder="Select Date" required value="{{old('date')}}">
                            		<span class="input-group-addon">
                            		<span class="fa fa-calendar"></span>
                            		</span>
                            	</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="time">Time</label>
                            	<div class='input-group date' data-ui-jp="datetimepicker" data-ui-options="{
                            	    format: 'LT',
                            		icons: {
                            		time: 'fa fa-clock-o',
                            		date: 'fa fa-calendar',
                            		up: 'fa fa-chevron-up',
                            		down: 'fa fa-chevron-down',
                            		previous: 'fa fa-chevron-left',
                            		next: 'fa fa-chevron-right',
                            		today: 'fa fa-screenshot',
                            		clear: 'fa fa-trash',
                            		close: 'fa fa-remove'
                            		}
                            		}">
                            		<input type='text' class="form-control" name="time" placeholder="Select Time" required value="{{old('time')}}">
                            		<span class="input-group-addon">
                            		<span class="fa fa-calendar"></span>
                            		</span>
                            	</div>
                            </div>
                            
                            <div class="form-group">
                                <label for="local_government">Local Government</label>
                                {!! Form::select('local_government', $lgas, old('local_government'), ['class' => 'form-control c-select', 'placeholder' => 'Select a Local Government']) !!}
                            </div>
                            
                            <div class="form-group">
                                <label for="date">Number of Trucks sent to the L.G.A</label>
                                <input type="number" class="form-control" placeholder="Enter number" name="number" required value="{{old('number')}}">
                            </div>
                            
                            {!! Form::submit('Submit', ['class' => 'btn white m-b', 'style' => 'color:#fff']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            
            @include('layouts.errors')
            @include('layouts.sessionmessages')
        </div>
    </div>
@stop
