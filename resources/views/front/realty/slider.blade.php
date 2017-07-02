<script type="text/javascript">
	$('.carousel').carousel({
			interval: 1000
	})
</script>

		
<div id="myCarousel" class="carousel slide" data-ride="carousel">

	<ol class="carousel-indicators">
    	@if(isset($files[0]))
    		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    @else
	    	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		    <li data-target="#myCarousel" data-slide-to="1"></li>
	    @endif

	    @if(isset($files[1]))
		    <li data-target="#myCarousel" data-slide-to="1"></li>
		@endif
		@if(isset($files[2]))    
		    <li data-target="#myCarousel" data-slide-to="2"></li>
		@endif
		@if(isset($files[3]))
		    <li data-target="#myCarousel" data-slide-to="3"></li>
		@endif
		@if(isset($files[4]))
		    <li data-target="#myCarousel" data-slide-to="4"></li>
		@endif
		@if(isset($files[5]))
		    <li data-target="#myCarousel" data-slide-to="5"></li>
		@endif
		@if(isset($files[6]))
		    <li data-target="#myCarousel" data-slide-to="6"></li>
		@endif			
	</ol>


	<div class="carousel-inner" role="listbox">		
		@if(isset($files[0]))	
			<div class="item active">	
				<img src="{{asset('front/images/'.$realty->id.'/1.jpg')}}" alt="" height="400" width="400" class="img-responsive center-block">
			</div>    
		@else
			<div class="item active">	
				<img src="{{asset('front/images/house.png')}}" alt="" height="400" width="400" class="img-responsive center-block">
			</div> 
			<div class="item">	
				<img src="{{asset('front/images/house.png')}}" alt="" height="400" width="400" class="img-responsive center-block">
			</div> 
		@endif

		@if(isset($files[1]))
			<div class="item">
				<img src="{{asset('front/images/'.$realty->id.'/2.jpg')}}" alt="" height="400" width="400" class="img-responsive center-block">
			</div>
		@endif

		@if(isset($files[2]))
			<div class="item">
				<img src="{{asset('front/images/'.$realty->id.'/3.jpg')}}" alt="" height="400" width="400" class="img-responsive center-block">
			</div>
		@endif	
	
		@if(isset($files[3]))
			<div class="item">
				<img src="{{asset('front/images/'.$realty->id.'/4.jpg')}}" alt="" height="400" width="400" class="img-responsive center-block">
			</div>
		@endif

		@if(isset($files[4]))
			<div class="item">
				<img src="{{asset('front/images/'.$realty->id.'/5.jpg')}}" alt="" height="400" width="400" class="img-responsive center-block">
			</div>
		@endif

		@if(isset($files[5]))
			<div class="item">
				<img src="{{asset('front/images/'.$realty->id.'/6.jpg')}}" alt="" height="400" width="400" class="img-responsive center-block">
			</div>
		@endif
		
		@if(isset($files[6]))	
			<div class="item">
				<img src="{{asset('front/images/'.$realty->id.'/7.jpg')}}" alt="" height="400" width="400" class="img-responsive center-block">
			</div>
		@endif	
	</div>

		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		</a>

</div>
<style type="text/css">
	
</style>