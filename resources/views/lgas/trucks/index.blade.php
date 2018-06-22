@extends('layouts.master')

@section('title')
    Local Government Trucks
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
                <h2>Local Government Trucks</h2>
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
            				<th>L.G.A Name</th>
            				<th>Total Number of Trucks</th>
                            <th>Actions</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($lgas as $lga)
                            <tr>
                				<td>{{$lga->name}}</td>
                				<td>{{$truckscount[$lga->id]}}</td>
                                <td>
                                    <button onclick="window.location='{{route('lga_trucks', $lga->id)}}'" class="btn btn-sm info">
                                        Show Trucks Details
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
