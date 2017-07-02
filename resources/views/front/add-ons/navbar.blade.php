<nav id="navbar-bs" class="navbar navbar-inverse" style="border-radius: 0; margin-bottom: 0">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Realties</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/realty">All realties <span class="sr-only">(current)</span></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @include('front.add-ons.search')
      	@if(Auth::check())
    			<li role="presentation">
    				<a href="#" onclick="return false;"><b>Hello: {{ Auth::user()->name}}</b></a>
    			</li>
    			<li role="presentation"><a href="/auth/logout">Logout</a></li>
		    @else
      	 <li role="presentation"><a href="/auth">Login / Register</a></li>
    	  @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>	

<script type="text/javascript">
  // Ahmed Sayed
  // To make activation for any navbar li title
  $(document).ready(function(){
    $('.navbar .navbar-nav a[href="/{{Request::path()}}"]').parent().addClass('active');
  });
</script>