@extends('layouts.master')

@section('title')
    Wards in {{$center->name}} Center
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
                <h2>Wards in <strong>{{$center->name}}</strong> Center</h2>
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
            				<th>Ward Name</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($wards as $ward)
                            <tr>
                				<td>{{$ward->name}}</td>
                			</tr>
                        @endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
@stop
