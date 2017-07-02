@extends('front.master')
@section('page_title', "Create an Ad")

@section('head-js')
  <script type="text/javascript" src="./front/assets/js/googleMap/main.js"></script>
@stop

@section('content')

	@include('front.realty.add-ons.jumbotron')

	<div class="container">
		<div class="container">
	    	<h4>Search for ur ad in our map</h4>
	      	<input id="pac-input" class="form-controls" type="text" placeholder="Enter a location">
	  	  	<div id="map"></div>
	    </div> 
	    <br>
		<div class="col-md-8 col-md-offset-2">
			{!! Form::open(["url"=>"/realty" ,"id"=>"createRealty"]) !!}
			<table class="table table-hover">
				@if(count($errors)>0)
					<tr>
						<td colspan="2">
							<div class="alert alert-danger">
								<ul>	
									@foreach($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>	
							</div>
						</td>
					</tr>
				@endif
				<tr class="info">
					<th colspan="2">Creating a new realty</th>
				</tr>
				<tr class="active">
					<td><h3>Address</h3></td>
					<td>
						{!! Form::hidden('lat') !!}
						{!! Form::hidden('lng') !!}
						{!! Form::text('address1', '', ["class"=>"form-control address1","placeholder"=>"Address 1", "readonly"=>"true"]) !!}
						{!! Form::textarea('address2', '', ["class"=>"form-control","placeholder"=>"Enter full address 2"]) !!}
					</td>
				</tr>
				<tr class="active">
					<td><h3>For:</h3></td>
					<td>
						{!! Form::radio('type','rent',["class"=>"form-control"]) !!} Rent
						{!! Form::radio('type','sell',["class"=>"form-control"]) !!}  Sell
					</td>
				</tr> 
				<tr class="active">
					<td><h3>Area:</h3></td>
					<td>
						{!! Form::text('area','',["class"=>"form-control","placeholder"=>"in meter square"]) !!}
					</td>
				</tr>
				<tr class="active">
					<td><h3>price</h3></td>
					<td>
						{!! Form::text('price','',["class"=>"form-control","placeholder"=>""]) !!} -$
					</td>
				</tr>
				<tr class="active">
					<td><h3>Description:</h3></td>
					<td>
						{!! Form::textarea('description','',["class"=>"form-control","placeholder"=>"Descripe your department"]) !!}
					</td>
				</tr>
				<tr class="active">
					<td colspan="2">
						{!! Form::submit('Add',["class"=>"btn btn-info btn-block"]) !!}	
					</td>
				</tr>
			</table>
			{!! Form::close() !!}
		</div>
	</div>
@stop

@section('footer-js')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBo1G-3ZluUbXJQqY6HGiqFOixHx2m-kSk&libraries=places&callback=initMap" async defer></script>
@stop