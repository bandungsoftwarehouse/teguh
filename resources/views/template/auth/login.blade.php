@extends('layouts.app')
@section('content')
<div id="login-page">
	<div class="container">

		<form method="POST" class="form-login" action="{{ route('login') }}">
		@csrf
		<h2 class="form-login-heading">sign in now sekarang</h2>
		<div class="login-wrap">
			<input id="email" type="text" name="email" class="form-control" placeholder="User ID" autofocus>
			<br>
			<input id="password" type="password"  name="password" class="form-control" placeholder="Password">
			<label class="checkbox">
				<span class="pull-right">
					<a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>

				</span>
			</label>
			{{-- <button class="btn btn-theme btn-block" href="{{ route('login') }}" type="submit"> --}}
			<button class="btn btn-theme btn-block" type="submit">
				<i class="fa fa-lock"></i> {{ __('Login') }}
			</button>
			<hr>
{{--			
			<div class="login-social-link centered">
			<p>or you can sign in via your social network</p>
				<button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
				<button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
			</div>
--}}
			<div class="registration">
				Don't have an account yet?<br/>
				<a class="" href="#">
					Create an account
				</a>
			</div>

		</div>

			<!-- Modal -->
			<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Forgot Password ?</h4>
						</div>
						<div class="modal-body">
							<p>Enter your e-mail address below to reset your password.</p>
							<input type="text" name="myemail" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

						</div>
						<div class="modal-footer">
							<button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
							<button class="btn btn-theme" type="button">Submit</button>
						</div>
					</div>
				</div>
			</div>
			<!-- modal -->

		</form>	  	

	</div>
</div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="js/jquery.backstretch.min.js"></script>
  <script>
      $.backstretch("img/login-bg.jpg", {speed: 500});
  </script>
@endsection
