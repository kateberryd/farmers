@extends('layouts.master')

@section('title')
    Search by Phone/Name
@stop

@section('farmers_search_active')
    active
@stop

@section('navbar')
    @include('farmers.navbar')
@stop

@section('sidebar')
    @include('layouts.sidebar')
@stop

@section('content')
    <div class="padding">
        @include('layouts.errors12')
        
        {!! Form::open(['route' => 'do_farmer_phone_search', 'method' => 'POST', 'class' => 'm-b-md']) !!}
        <div class="input-group input-group-lg">
            <label for="phoneNameSearch">Search by farmer's name or phone number</label>
            <input type="text" class="form-control" placeholder="Type name or phone number" name="search_term">
            <span class="input-group-btn">
                {!! Form::submit('Search', ['class' => 'btn b-a no-shadow white', 'style' => 'margin-top: 29px;']) !!}
            </span>
        </div>
        {!! Form::close() !!}
        
        {!! Form::open(['route' => 'do_farmer_livestock_search', 'method' => 'POST', 'class' => 'm-b-md']) !!}
        <div class="input-group input-group-lg">
            <label for="livestockSearch">Search by livestock (Comma separated)</label>
            <input type="text" class="form-control" placeholder="Type livestock to search for" name="search_term">
            <span class="input-group-btn">
                {!! Form::submit('Search', ['class' => 'btn b-a no-shadow white', 'style' => 'margin-top: 29px;']) !!}
            </span>
        </div>
        {!! Form::close() !!}
        
        {!! Form::open(['route' => 'do_farmer_crops_search', 'method' => 'POST', 'class' => 'm-b-md']) !!}
        <div class="input-group input-group-lg">
            <label for="cropsSearch">Search by crops (Comma separated)</label>
            <input type="text" class="form-control" placeholder="Type crops to search for" name="search_term">
            <span class="input-group-btn">
                {!! Form::submit('Search', ['class' => 'btn b-a no-shadow white', 'style' => 'margin-top: 29px;']) !!}
            </span>
        </div>
        {!! Form::close() !!}
    </div>
@stop
