<header class="jumbotron" style="box-shadow: 1px 1px 1px rgba(45,45,45,.5)">
	<div class="container">
		<div class="col-md-10">
			<p><b>loGo</b></p>
			<p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
			<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
		</div>
		@if(!Request::is('realty/create'))
			<div class="col-md-2">
				<a href="/realty/create/" class="btn btn-primary">Add A Realty</a>
			</div>
		@endif
	</div>	
</header>