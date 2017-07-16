<?php
session_start();
include './Classes/Extras.class.php';
Extras::capture();
Extras::CheckLoggedInIndex();
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="HandheldFriendly" content="true">
	<meta name="MobileOptimized" content="320">
	<title>HPSC Chat - Login</title>
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/index.css">
	<script src="./assets/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./assets/js/tether.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./assets/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./assets/js/particles.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./assets/js/jquery.cookie.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="./assets/js/fingerprint2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdn.ravenjs.com/3.15.0/raven.min.js" crossorigin="anonymous"></script>
	<script type="text/javascript" charset="utf-8">
		Raven.config('[YOUR OWN SENTRY ID]').install();
	</script>
</head>
<body>
<iframe id="iframe" sandbox="allow-same-origin" style="display: none"></iframe>
<script src="./assets/js/index.js" type="text/javascript" charset="utf-8"></script>
	<div class="container">
        <div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Login</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="LoginCompassId" id="LoginCompassId" tabindex="1" class="form-control" placeholder="Compass Id" value="">
									</div>
									<div class="form-group">
										<input type="password" name="LoginPassword" id="LoginPassword" tabindex="2" class="form-control" placeholder="Password" value="">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="hidden" name="ip" id="ipAddress">
												<input type="submit" name="LoginSubmit" id="LoginSubmit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group text-left alert alert-danger" role="alert" style="display: none;" id="LoginErrorDiv">
										<p id="LoginError"></p>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="#" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="RegisterCompassId" id="RegisterCompassId" tabindex="1" class="form-control" placeholder="Compass Id" value="">
									</div>
									<div class="form-group">
										<input type="text" name="RegisterNickname" id="RegisterNickname" tabindex="2" class="form-control" placeholder="Nick Name" value="">
									</div>
									<div class="form-group">
										<input type="password" name="RegisterPassword" id="RegisterPassword" tabindex="4" class="form-control" placeholder="Chat Room Password">
									</div>
									<div class="form-group">
										<input type="password" name="RegisterConfirmPassword" id="RegisterConfirmPassword" tabindex="5" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group text-left">
										<p class="black"><input type="checkbox" name="ReigsterTerm" tabindex="6" id="ReigsterTerm"> I agree to the <a href="./term.php" title="Term of Use" class="text center-text black">Term of Use</a></p>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="RegisterSubmit" id="RegisterSubmit" tabindex="7" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
									<div class="form-group text-left alert alert-danger" role="alert" style="display: none;" id="RegisterErrorDiv">
										<p id="RegisterError"></p>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="particles-js"></div>
</body>
</html>