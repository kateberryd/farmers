@extends('layouts.master')

@section('title')
    Local Governments Report
@stop

@section('reports_active')
    active
@stop

@section('navbar')
    @include('reports.navbar')
@stop

@section('sidebar')
    @include('layouts.sidebar')
@stop

@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2>Local Governments Report</h2>
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
            				<th>Local Government Name</th>
                            <th>Number of Farmers</th>
                            {{--<th>Number of Wards</th>
                            <th>Actions</th>--}}
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($lgas as $lga)
                            <tr>
                				<td>{{$lga->name}}</td>
                                <td>{{$farmerscount[$lga->id]}}</td>
                                {{--<td>{{$wardscount[$center->unique_center_id]}}</td>
                                <td>
                                    <button onclick="window.location='{{route('center_wards', $center->unique_center_id)}}'" class="btn btn-sm blue">
                                        Show Wards
                                    </button>
                                    
                                    <button onclick="window.location='{{route('center_farmers', $center->unique_center_id)}}'" class="btn btn-sm warn">
                                        Show Farmers
                                    </button>
                                </td>--}}
                			</tr>
                        @endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
@stop
