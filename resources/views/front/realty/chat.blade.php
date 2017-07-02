<!--script type="text/javascript" src="{{asset('js/chatScript.js')}}"></script-->
<!-- problem with chatScript ==Kill Auth Session== -->
<?php $page_title = "Chat" ?>
@extends('front.master')
@section('content')
<div class="container" token="{{csrf_token()}}">
	<div class="row">
		<div class="col-md-8">
			<div class="well">
				<div id = "content" class="modal-content panel panel-info">
				<!--div class="loginRequest"><h3>Login to set message</h3>
					<button class="btn btn-info" style="align:right;" onclick='window.location.href="{{$friend_id}}";'>Login</button></div-->
					<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-hidden="true" style='display:none;'>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Welcome</h4>
        </div>
        <div class="modal-body">
          <p>Please Login to send message</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" onclick='window.location.href="{{$friend_id}}";'>Login</button>
        </div>
      </div>  
  	</div>
  </div>
				<!--div  id = "content" style="padding: 10px"-->
					@if(count((array)$msgs) > 0)
						@foreach($msgs as $m)
							@if($m[0] == $user_id)
							 	<div style="margin-left:7px;color:black;"><b>me: {{$m[1]}}</b></div>
							@else
								<div style="margin-left:7px;color:royalblue;"><b>Friend: {{$m[1]}}</b></div>
							@endif
						@endforeach
					@else
						<h3 style="text-align:center;" id="noMsgs">No Messages</h3>
					@endif
				</div>
				<br>
				<textarea class="panel panel-info" id="textbox" onkeypress="EnterPress()"  placeholder="Enter your message here...."></textarea>
				<br>
				<div class="row">
					<div class="col-md-6"><input type="checkbox" id="enter" checked /><label>Send on enter</label></div>
						<div class="col-md-6 text-right"><button class="btn btn-primary" id="send" data-toggle="modal">Send</button></div>
				</div>
			</div>	
		</div>
	</div>
</div>

<script type="text/javascript">
			// thanks
	$(document).ready(function(){
		$('#content').animate({scrollTop: $('#content').prop("scrollHeight")}, 10);
	});
</script>
@stop
