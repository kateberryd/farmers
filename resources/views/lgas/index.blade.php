@extends('layouts.master')

@section('title')
    Plateau State Local Governments
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
                <h2>Plateau State Local Governments</h2>
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
            				<th>Number of Farmers</th>
            				<th>Number of Centers</th>
            				<th>Number of Wards</th>
                            <th>Actions</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($lgas as $lga)
                            <tr>
                				<td>{{$lga->name}}</td>
                				<td>{{$farmerscount[$lga->id]}}</td>
                				<td>{{$centerscount[$lga->id]}}</td>
                				<td>{{$wardscount[$lga->id]}}</td>
                                <td>
                                    <button onclick="window.location='{{route('lga_centers', $lga->id)}}'" class="btn btn-sm blue">
                                        Show Centers
                                    </button>
                                    
                                    <button onclick="window.location='{{route('lga_farmers', $lga->id)}}'" class="btn btn-sm warn">
                                        Show Farmers
                                    </button>
                                    
                                    <button onclick="window.location='{{route('lga_wards', $lga->id)}}'" class="btn btn-sm pink">
                                        Show Wards
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
