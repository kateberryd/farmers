@extends('layouts.master')

@section('title')
    Redemption Centers
@stop

@section('centers_active')
    active
@stop

@section('navbar')
    @include('centers.navbar')
@stop

@section('sidebar')
    @include('layouts.sidebar')
@stop

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Redemption Centers</h2>
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
            			    <th>Center Name</th>
            			    <th>Unique Center ID</th>
            				<th>Number of Farmers</th>
            				<th>Actions</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($centers as $center)
            			    <tr>
                				<td>{{$center->name}}</td>
                				<td>{{$center->unique_center_id}}</td>
                				<td>{{$farmerscount[$center->unique_center_id]}}</td>
                				<td>
                                    <button onclick="window.location='{{route('center_farmers', $center->unique_center_id)}}'" class="btn btn-sm warn">
                                        Show Farmers
                                    </button>
                                    
                                    <button onclick="window.location='{{route('center_farmer_payments', $center->unique_center_id)}}'" class="btn btn-sm green">
                                        Show Payments
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
