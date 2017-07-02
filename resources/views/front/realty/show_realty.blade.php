@extends('front.master')
@section('page_title', "Ad: " . $realty->description)

@section('content')

	<header class="jumbotron">
		<div class="container">
			<div class="col-md-10">
				<h1> Name </h1>
				<p><b> loGo</b></p>
			</div>
			<div class="col-md-2">
				<a href="/realty/create/" class="btn btn-primary">Add A Realty</a>
				@if(Auth::check())
					@if(Auth::user()->id == $realty->user_id)
						<!--Editing file-->
							<a href="/realty/{{$realty->id}}/edit" class="btn btn-info">Editing my realty</a>
						<!-- Deleting Form-->
							{!! Form::open(["url"=>"/realty/$realty->id", "method"=>"delete"]) !!}
							{!! Form::submit("Delete",["class"=>"btn btn-danger"])!!}
							{{ Form::close() }}
					@endif					
				@endif
			</div>
		</div>	
	</header>

	<div class="container">
		<div class="col-md-8 col-md-offset-2">
			<div class="well">
				<div> <h1>For images</h1></div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4><b>Address</b></h4>
					</div>
					<div class="panel-body">
						{{$realty->country}}, {{$realty->city}}, {{$realty->region}},{{$realty->house_no}} {{$realty->street}} st.
						@if(isset($realty->apartment))
						 	apartment number: {{$realty->apartment}}
						@endif 	
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4><b>For:</b></h4>
					</div>
					<div class="panel-body">
						{{$realty->type}}
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4><b>Area in meter square:</b></h4>
					</div>
					<div class="panel-body">
						{{$realty->area}} 
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4><b>Price:</b></h4>
					</div>
					<div class="panel-body">
						{{$realty->price}} $
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4><b>Description:</b></h4>
					</div>
					<div class="panel-body">
						{{$realty->description}}
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4><b>For more information:</b></h4>
					</div>
					<div class="panel-body">
						{{$realty->telephone}}
					</div>	
				</div>
				<div class="panel panel-info">
					<div class="panel-body">
						@if(Auth::check())
							<h4><span class="glyphicon glyphicon-comment"></span><a href="#" class="comment">Comment</a></h4>
						@else
							<?php //Session::put('comemnt_login_status', true);
							Session::put('id',$realty->id); ?>
							<h4><a href="/auth" class="InValidComment">Login to can set a Comment</a></h4>
						@endif
					</div>
				</div>	
				<div  class="panel panel-info" id="divComments">
					@if(Auth::check())
					<div id="edit" class="panel-body">
						<input type="text" id="txtComment" class="form-control" onkeypress="EnterAction({{$realty->id}})"/>
					</div>
					@endif
					<?php $comments = $realty->comments; ?>
						
						@if(count($comments) == 0)
							<h3 style="text-align:center">No comments yet</h3>
						@else
							@if(Auth::check())
								@foreach($comments as $comment)
									<div class="panel-heading descDiv">
										<a href="">	<b>	{{$comment->user->name}} </b><!--h6>He is stupid</h6--></a>
										   	{{$comment->comment}}
										    <div class="descBox">
										    @if( $comment->user->id != Auth::user()->id)
												<button class="btn btn-info messageBtn" onclick="location.href='/chat/index/{{$comment->user->id}}'">Message</button>
											@endif
											</div>
											
									</div>

								@endforeach
							@endif
						@endif
						<!--l7zat m3aya telefon back  swoerry for late ok tmam
						ahmed ana msh l2ya l comments :oو Ok tb yala nshof moshklt l
						login ? -->
				</div>
			</div>
		</div>
	</div>

	@if(isset($_GET['get_comment']))
		<script type="text/javascript">
			// thanks
			$(document).ready(function(){
				$("html, body").animate({
					scrollTop: $("#divComments").offset().top
				}, 1000);
				$("#txtComment").focus();
			});
		</script>
	@endif
@stop