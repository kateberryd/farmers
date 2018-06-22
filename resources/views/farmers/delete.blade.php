<div id="m" class="modal" data-backdrop="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Modal</h5>
			</div>
			<div class="modal-body text-center p-lg">
				<p>Are you sure to delete this record?</p>
			</div>
			{!! Form::open(['route' => ['delete_farmer', $farmer->id], 'method' => 'DELETE', 'role' => 'form']) !!}
    			<div class="modal-footer">
    				<button type="button" class="btn dark-white p-x-md" data-dismiss="modal">No</button>
    				{!! Form::submit('Yes', ['class' => 'btn danger p-x-md']) !!}
    			</div>
    		{!! Form::close() !!}
		</div>
	</div>
</div>