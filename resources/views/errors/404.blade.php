@extends('errors.layout')

@section('title', '404')

@section('body')
	<!-- BEGIN 404 MESSAGE -->
	<section>
		<div class="section-body contain-lg">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h1><span class="text-xxxl text-light">404 <i class="fa fa-bug text-primary"></i></span></h1>
					<h2>This page does not exist</h2>
					<a href="#" class="text-primary" onclick="history.go(-1);return false;">Go back to previous page</a>
				</div><!--end .col -->
			</div><!--end .row -->
		</div><!--end .section-body -->
	</section>
	<!-- END 404 MESSAGE -->
@stop