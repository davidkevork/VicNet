<?php
session_start();
date_default_timezone_set('Australia/Melbourne');
require_once './vendor/autoload.php';
Raven_Autoloader::register();
$client = new Raven_Client('[YOUR OWN SENTRY ID]');
$error_handler = new Raven_ErrorHandler($client);
$error_handler->registerExceptionHandler();
$error_handler->registerErrorHandler();
$error_handler->registerShutdownFunction();
$client->user_context(array(
    'Id' => $_SESSION['Id'],
    'UserId' => $_SESSION['UserId'],
    'NickName' => $_SESSION['NickName'],
));
include './Classes/LoginRegister.php';
Extras::capture();
Extras::CheckLoggedIn();
$LoginRegister = new LoginRegister;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="HandheldFriendly" content="true">
	<meta name="MobileOptimized" content="320">
	<title>HPSC Chat - Login</title>
	<link rel="icon" href="./assets/img/vicnetLogo.png" type="image/png">
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/neon-core.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/neon-theme.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/neon-forms.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/home.css">
	<link rel="stylesheet" type="text/css" href="./assets/css/jquery-ui.css">
	<!--[if lt IE 9]><script src="./assets/js/ie8-responsive-file-warning.js" type="text/javascript" charset="utf-8"></script><![endif]-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" type="text/javascript" charset="utf-8"></script>
	<![endif]-->
</head>
<body class="page-body">
<div class="page-container chat-visible">
	<div class="main-content">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-8 cleafix">
				<form class="navbar-form navbar-left" role="search" method="post" id="HomeSearch">
					<div class="form-group">
						<input type="text" class="form-control home-search" placeholder="Search" id="search">
						<input type="hidden" name="csrf" value="<?php echo Extras::token(); ?>" class="csrf">
					</div>
				</form>
			</div>
			<!-- Profile Info and Notifications -->
			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-4 clearfix">
				<ul class="user-info pull-left pull-none-xsm">
				<?php
					echo $LoginRegister->ShowFriendNotification();
				?>
				</ul>
				<ul class="user-info pull-left pull-none-xsm">
				<?php
					echo $LoginRegister->ShowNotification();
				?>
				</ul>
				<ul class="user-info pull-right pull-none-xsm">
					<!-- Profile Info -->
					<li class="profile-info pull-right dropdown"><!-- add class "pull-right" if you want to place this from right -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
							<img src="<?php echo $_SESSION['ProfilePicture']; ?>" alt="" class="img-circle" width="44">
							<?php echo Extras::NickNameSession(); ?>
						</a>
						<ul class="dropdown-menu">
							<!-- Reverse Caret -->
							<li class="caret"></li>
							<!-- Profile sub-links -->
							<li>
								<a href="./profile?id=<?php echo $_SESSION['UserId']; ?>">
									<i class="entypo-user"></i>
									Profile
								</a>
							</li>
							<li>
								<a href="./home">
									<i class="entypo-home"></i>
									Home
								</a>
							</li>
							<li>
								<a href="#" data-toggle="chat" data-collapse-sidebar="1">
									<i class="entypo-chat"></i>Chat<span class="badge badge-success chat-notifications-badge">0</span>
								</a>
							</li>
							<li>
								<a href="./logout">
									Log Out <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
		<hr>
		<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs12 clearfix">
			<form method="post" id="Status" role="form" enctype="multipart/form-data" class="form-lg form-vertical">
				<div class="form-group text-center">
					<a href="./emojis" target="_blank">Emojis List</a>
				</div>
				<div class="form-group">
					<textarea class="form-control StatusTextArea" name="status"></textarea>
					<input type="hidden" name="csrf" value="<?php echo Extras::token(); ?>" class="csrf">
					<input type="hidden" name="Type" value="AddStatus">
				</div>
				<div class="form-group form-inline">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 PostPicture">
						<label class="filebutton col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-12 col-xs-offset-0">
							<span class="file">
								<input type="file" name="PostPicture" id="StatusImage" accept="image/*">
							</span>
						</label>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 right">
						<input type="submit" value="Post" name="submit" class="btn btn-primary right StatusButton">
					</div>
				</div>
			</form>
		</div>
		<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1" id="StatusError"></div>
		</div>
		<hr>
		<div class="center append">
		<?php
			echo $LoginRegister->ShowPosts();
		?>
		</div>
	</div>
	<div id="chat" class="fixed" data-current-user="<?php echo $_SESSION['UserId']; ?>" data-order-by-status="1" data-max-chat-history="200">
		<div class="chat-inner">
			<h2 class="chat-header">
			<a href="#" class="chat-close"><i class="entypo-cancel"></i></a>
			<i class="entypo-users"></i>
			Chat
			<span class="badge badge-success is-hidden">0</span>
			</h2>
			<div class="chat-group" id="group-1">
				<?php
					echo $LoginRegister->ListFriendsChat();
				?>
			</div>
		</div>
		<!-- conversation template -->
		<div class="chat-conversation">
			<div class="conversation-header">
				<a href="#" class="conversation-close"><i class="entypo-cancel"></i></a>
				<span class="user-status"></span>
				<span class="display-name"></span> 
				<small></small>
			</div>
			<ul class="conversation-body">
			</ul>
			<div class="chat-textarea">
				<textarea class="form-control autogrow" placeholder="Type your message"></textarea>
			</div>
		</div>
	</div>
	<?php
		echo $LoginRegister->ListChat();
	?>
</div>
<script src="https://cdn.ravenjs.com/3.15.0/raven.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf-8">
	Raven.config('[YOUR OWN SENTRY ID]').install();
	Raven.setUserContext({Id:'<?php echo $_SESSION['Id']; ?>', UserId:'<?php echo $_SESSION['UserId']; ?>', NickName:'<?php echo $_SESSION['NickName']; ?>'});
</script>
<script src="./assets/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/tether.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/gsap/TweenMax.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/joinable.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/resizeable.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/neon-api.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/toastr.js" type="text/javascript" charset="utf-8"></script>
<script src='./assets/js/fancywebsocket.js' type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/neon-chat.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/neon-custom.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/jquery.timeago.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/jquery.cookie.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/fingerprint2.min.js" type="text/javascript" charset="utf-8"></script>
<script src="./assets/js/home.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
new Fingerprint2().get(function(result) { $.cookie('uid', result, { expires : 30 }); });
$("abbr.timeago").timeago();
$("span.time").timeago();
var Server;
Server = new FancyWebSocket('ws://127.0.0.1:1915');
function salt()
{
if (Server.send('oath', '<?php echo $_SESSION['Salt'] ?>')) {return true;} else {return false;}
}
Server.bind('open', function() {if (salt()) {return true;} else {salt();}});
Server.bind('close', function(data) {});
Server.bind('message', function(payload) {
	var data = JSON.parse(payload);
	var from = data.from;
	var to = data.to;
	var message = data.message;
	var CurrentUser = "<?php echo $_SESSION['UserId']; ?>";
	var $chat = $("#chat");
	if (data.type == 'status') {
		neonChat.setStatus(data.user, data.status);
	} else {
		neonChat.showChat();
		if (from == CurrentUser) {
			neonChat.open(".chat-group a#"+to);
			neonChat.pushMessage(to, (message).replace( /<.*?>/g, '' ), to, new Date());
			neonChat.renderMessages(to);
		} else {
			neonChat.open(".chat-group a#"+from);
			neonChat.pushMessage(from, (message).replace( /<.*?>/g, '' ), from, new Date());
			neonChat.renderMessages(from);
		}
	}
});
Server.connect();
</script>
</body>
</html>