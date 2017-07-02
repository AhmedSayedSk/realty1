@extends('front.master')
@section('page_title', 'Realties')

@section('content')

	@include('front.realty.add-ons.jumbotron')

  <div id="index-page">
  	<div class="container">
  		<div class="col-md-8 col-md-offset-2">
  			@foreach($realties as $realty)	
  				<div class="well">	
  					<div class="media">
  						<div class="media-left">
  						    <a href="#">
  						    	<img class="media-object" src="http://placehold.it/120x120/2d2d2d/fff" alt="Demo image">
  						    </a>
  						</div>
  						<div class="media-body">
  						    <h4 class="media-heading">For {{$realty->type}}</h4>
  						    <h5>Our apartment at {{$realty->country}}, {{$realty->city}}, {{$realty->region}},{{$realty->house_no}} {{$realty->street}} st.</h5>					    
  						</div>
  						<div class="media-right">
  							<a href="/realty/{{$realty->id}}" class="btn btn-primary">Show the apartment </a>
  						</div>
  					</div>
  				</div>	
  			@endforeach		
  		</div>
  	</div>
  	<div class="container text-center">
  		{!! $realties->render() !!}
  	</div>
  </div>

@stop