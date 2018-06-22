@extends('layouts.master')

@section('title')
    Edit Farmer
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
    <script type="text/javascript" src="/js/farm-inputs-dynamic-edit.js"></script>
@stop


@section('content')
    <div class="padding">
        <div class="row">
            <div class="col-xs-8">
                <div class="box">
                    <div class="box-header">
                        <h2>Edit Farmer</h2>
                        <small>Edit details of the farmer</small>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        {!! Form::open(['route' => ['update_farmer', $farmer->id], 'method' => 'PUT', 'role' => 'form']) !!}
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="centerNumber">Center Number</label>
                                        <input type="text" name="center_number" placeholder="Center Number" class="form-control" value="{{$farmer->center_number}}">
                                    </div>
                                </div>
                                
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="centerName">Center Name</label>
                                        <input type="text" name="center_name" placeholder="Center Name" class="form-control" value="{{$farmer->center_name}}">
                                    </div>
                                </div>
                                
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="personalSerialNumber">Personal Serial Number</label>
                                        <input type="text" name="personal_serial_number" placeholder="Personal Serial Number" class="form-control" value="{{$farmer->personal_serial_number}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" placeholder="Name" class="form-control" value="{{$farmer->name}}">
                                    </div>
                                </div>
                                
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        {!! Form::select('gender', $genders, $farmer->gender, ['class' => 'form-control c-select', 'placeholder' => 'Select a Gender']) !!}
                                    </div>
                                </div>
                                
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="age">Age</label>
                                        <input type="number" name="age" placeholder="Age" class="form-control" value="{{$farmer->age}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="maritalStatus">Marital Status</label>
                                        {!! Form::select('marital_status', $maritalstatus, $farmer->marital_status, ['class' => 'form-control c-select', 'placeholder' => 'Select a Marital Status']) !!}
                                    </div>
                                </div>
                                
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="farmSize">Farm Size</label>
                                        <input type="text" name="farm_size" placeholder="Farm Size" class="form-control" value="{{$farmer->farm_size}}">
                                    </div>
                                </div>
                                
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="householdSize">Household Size</label>
                                        <input type="text" name="household_size" placeholder="Household Size" class="form-control" value="{{$farmer->household_size}}">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="phoneNumber">Phone Number</label>
                                        <input type="text" class="form-control" placeholder="Phone Number" value="{{$farmer->phone_number}}" name="phone_number">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="nonAvgFarmingIncome">Non-Farming Avg. Income</label>
                                        <input type="text" class="form-control" placeholder="Non-farming average income" value="{{$farmer->avg_income_non_farming}}" name="avg_income_non_farming">
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="drySeasonBusiness">Dry Season Business</label>
                                        {!! Form::select('dry_season_business', $options, $farmer->dry_season_business, ['class' => 'form-control c-select', 'placeholder' => 'Select a Dry Season Business']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="majorCrops">Major Crops (Comma separated)</label>
                                        <input type="text" name="major_crops" placeholder="Major Crops" class="form-control" value="{{$farmer->major_crops}}">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="majorLiveStock">Major Livestock (Comma separated)</label>
                                        <input type="text" name="major_livestock" placeholder="Major Livestock" class="form-control" value="{{$farmer->major_livestock}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="cooperativeMembership">Cooperative Membership</label>
                                        <input type="text" class="form-control" placeholder="Cooperative Membership" value="{{$farmer->cooperative_membership}}" name="cooperative_membership">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="produceStorageCapacity">Produce Storage Capacity</label>
                                        <input type="text" class="form-control" placeholder="Produce Storage Capacity" value="{{$farmer->produce_storage_capacity}}" name="produce_storage_capacity">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="distanceToMarket">Distance To Market</label>
                                        <input type="text" class="form-control" placeholder="Distance to market" value="{{$farmer->distance_to_market}}" name="distance_to_market">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label for="farmingAvgIncome">Farming Avg. Income</label>
                                        <input type="text" class="form-control" placeholder="Farming average income" value="{{$farmer->avg_income_farming}}" name="avg_income_farming">
                                    </div>
                                </div>
                            </div>
                            
                            {{--CSRF TOKEN. Used in cascade JS script--}}
                            <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}" />
                            {{--FARM INPUTS. Will be sent as part of Request and stored in DB as JSON--}}
                            <input type="hidden" name="_farminputs" id="_farminputs" value="{{$farmer->inputs_and_quantities}}"/>
                            
                            {!! Form::submit('Update', ['class' => 'btn blue m-b', 'style' => 'color:#fff']) !!}
                            <button type="button" class="btn danger m-b" style="color:#fff;margin-left:10px;" data-toggle="modal" data-target="#m">
                                Delete
                            </button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            
            <div class="col-xs-4">
                <div class="box">
                    <div class="box-header">
                        <h2>Farm Inputs</h2>
                        <small>Enter details of the farm inputs</small>
                        <p style="color:red;" id="farm_input_error"></p>
                    </div>
                    <div class="box-divider m-a-0"></div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" placeholder="Enter name" id="farm_input_name">
                        </div>
                        
                        <div class="form-group">
                            <label for="inputQuantity">Quantity</label>
                            <input type="text" class="form-control" placeholder="Enter quantity" id="farm_input_quantity">
                        </div>
                        
                        <button type="button" id="farm_input_add" class="btn green m-b">Add</button>
                        <div class="box-divider m-a-0"></div>
                        <ul id="farm_input_list"></ul>
                    </div>
                </div>
            </div>
            
            @include('layouts.sessionmessages')
            @include('farmers.delete')
        </div>
    </div>
@stop