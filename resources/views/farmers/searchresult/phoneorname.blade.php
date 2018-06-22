@extends('layouts.master')

@section('title')
    Search Term: {{$searchterm}}
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

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Search Term: <strong>{{$searchterm}}</strong></h2>
            </div>
            <div class="table-responsive" id="datatable">
                <table data-ui-jp="dataTable" data-ui-options="{
                    buttons: [, 'excel', 'pdf' ],
                    'initComplete': function () {
                        this.api().buttons().container()
                        .appendTo( '#datatable .col-md-6:eq(0)' );
                    }
                }" class="table table-striped b-t b-b">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Farm Size</th>
                            <th>Avg. Farming Income</th>
                            <th>Major Crops</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($farmers as $farmer)
                            <tr>
                                <td>{{$farmer->name}}</td>
                                <td>{{$farmer->age}} years</td>
                                <td>{{$farmer->farm_size}}</td>
                                <td>&#8358;{{$farmer->avg_income_farming}}</td>
                                <td>{{$farmer->major_crops}}</td>
                                <td>
                                    <button onclick="window.location='{{route('edit_farmer', $farmer->id)}}'" class="btn btn-sm blue">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
