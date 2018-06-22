@extends('layouts.master')

@section('title')
    Farmers in {{$lga->name}}
@stop

@section('lgas_active')
    active
@stop

@section('navbar')
    @include('lgas.navbar')
@stop

@section('sidebar')
    @include('layouts.sidebar')
@stop

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Farmers in <strong>{{$lga->name}}</strong></h2>
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
                        @php
                            $count = 0
                        @endphp
                        @foreach($farmers as $farmer)
                            @foreach($farmer as $farmer1)
                                <tr>
                                    <td>{{++$count}}</td>
                                    <td>{{$farmer1->name}}</td>
                                    <td>{{$farmer1->phone_number}}</td>
                                    <td>{{$farmer1->barcode}}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
            	</table>
            </div>
        </div>
    </div>
@stop
