<?php $page_title = "searchResults" ?>

@extends('front.master')

@section('content')

	@include('front.realty.add-ons.style')
	@include('front.realty.add-ons.jumbotron')

	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			@if(!empty($search_results))	
				@foreach($search_results as $realty)	
					<div class="well">	
						<div class="media">
							<div class="media-left">
							    <a href="#">
									@if(file_exists(public_path('images/front/'.$realty->id.'/1.jpg')))
							    		<img class="media-object" height="120" width="120" src="{{asset('front/images/'.$realty->id.'/1.jpg')}}" alt="Demo image">
							    	@else
							    		<img class="media-object" src="{{asset('front/images/house.png')}}" height="120" width="120" alt="Demo image">
							    	@endif
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
			@else
				<div class="well">
					<h3><center>No Results Found</center></h3><br>
						<center><a href="#" class="media-">
						    	<img class="media-object" src="{{asset('front/images/sady.jpg')}}" alt="Demo image">
						</a></center>
				</div>
			@endif
		</div>
	</div>

@stop