@extends('front.master')
@section('page_title', 'Edit the Ad')

@section('content')

	@include('front.realty.add-ons.style')
	@include('front.realty.add-ons.jumbotron')

	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="well">
				@foreach($realties as $realty)
					{!! Form::open(["url"=>"realty/$realty->id","method"=>"patch"]) !!}
						<div> <h1>For images</h1></div>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4><b>Address</b></h4>
							</div>
							<div class="panel-body">
								{!! Form::text("country","$realty->country",["class"=>"form-control"]) !!} , 
								{!! Form::text("city","$realty->city",["class"=>"form-control"]) !!} ,
								{!! Form::text("region","$realty->region",["class"=>"form-control"]) !!} , 
								{!! Form::text("house_no","$realty->house_no",["class"=>"form-control"]) !!} , 
								{!! Form::text("street","$realty->street",["class"=>"form-control"]) !!} st . 
								@if(isset($realty->apartment))
								 	apartment number: {!! Form::text("apartment_no","$realty->apartment_no",["class"=>"form-control"]) !!}
								@endif
							</div>
						</div>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4><b>For:</b></h4>
							</div>
							<div class="panel-body">
								{!! Form::radio('type','rent',["class"=>"form-control"]) !!} Rent
								{!! Form::radio('type','sell',["class"=>"form-control"]) !!}  Sell
							</div>
						</div>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4><b>Area in meter square:</b></h4>
							</div>
							<div class="panel-body">
								{!! Form::text("area","$realty->area",["class"=>"form-control"]) !!} 
							</div>
						</div>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4><b>Price:</b></h4>
							</div>
							<div class="panel-body">
								{!! Form::text("price","$realty->price",["class"=>"form-control"]) !!} $
							</div>
						</div>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4><b>Description:</b></h4>
							</div>
							<div class="panel-body">
								{!! Form::textarea('description','',["class"=>"form-control"]) !!}
							</div>
						</div>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4><b>For more information:</b></h4>
							</div>
							<div class="panel-body">
								{!! Form::text("telephone","$realty->teltephone",["class"=>"form-control"]) !!} $
							</div>
						</div>	
					{!! Form::submit("Edit",["class"=>"btn btn-info"]) !!}	
					{!! Form::close() !!}
				@endforeach					
			</div>
		</div>
	</div>

@stop