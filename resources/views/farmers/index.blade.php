@extends('layouts.master')

@section('title')
    Plateau State Farmers
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
                <h2>Plateau State Farmers</h2>
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
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Barcode</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($farmers as $farmer)
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$farmer->name}}</td>
                                <td>{{$farmer->phone_number}}</td>
                                <td>{{$farmer->barcode}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
