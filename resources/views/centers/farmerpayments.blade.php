@extends('layouts.master')

@section('title')
    Payments made in {{$center->name}} Redemption Center
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
                <h2>Payments made in <strong>{{$center->name}}</strong> Redemption Center</h2>
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
            			    <th>Transaction ID</th>
            				<th>Unique Farmer Identifier</th>
            			</tr>
            		</thead>
            		<tbody>
            			@foreach($farmerpayments as $farmerpayment)
            			    <tr>
                				<td>{{$farmerpayment->name}}</td>
                				<td>{{$farmerpayment->transaction_id}}</td>
                				<td>{{$farmerpayment->barcode}}</td>
                			</tr>
                        @endforeach
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
@stop
