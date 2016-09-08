@extends('layouts.master')

@section('title', 'Invoice')

@section('header')
@stop

@section('body')
	<section id="invoice" class="section-shadow">
		<div class="container">
			<div class="card">
				<div class="card-head">
					<div class="tools">
						<div class="btn-group">
							<a class="btn btn-primary" href="{{ route('invoice.download', $invoice->code) }}"><i class="fa fa-download"></i></a>
							<a class="btn btn-primary" href="{{ route('customer.index') }}">My Panel</a>
						</div>
					</div>
				</div><!--end .card-head -->
				<div class="card-body">
					@include('partials.invoice')
				</div>
			</div><!--end .card -->
		</div>
	</section>
@stop
