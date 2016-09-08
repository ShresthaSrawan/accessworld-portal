<div class="row">
	<div class="col-xs-6">
		<div class="table-info"> 
			Showing {!! $records->count() !!} of {!! $records->total() !!} entries
		</div>
	</div>
	<div class="col-xs-6 text-right"> 
    	{!! $records->render() !!}
    </div>
</div>