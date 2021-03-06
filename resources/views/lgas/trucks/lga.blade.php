@extends('layouts.master')

@section('title')
    Trucks sent to {{$lga->name}}
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
        <div class="box">
            <div class="box-header">
                <h2>Trucks sent to <strong>{{$lga->name}}</strong></h2>
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
            				<th>Date</th>
            				<th>Time</th>
            				<th>Number of Trucks</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($lgatrucks as $lgatruck)
                            <tr>
                				<td>{{ date('jS F, Y', strtotime($lgatruck->date)) }}</td>
                				<td>{{ date('h:i A', strtotime($lgatruck->time)) }}</td>
                				<td>{{$lgatruck->number}}</td>
                			</tr>
                        @endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
@stop
