<?php
session_start();
require_once './vendor/autoload.php';
Raven_Autoloader::register();
$client = new Raven_Client('[YOUR OWN SENTRY ID]');
$error_handler = new Raven_ErrorHandler($client);
$error_handler->registerExceptionHandler();
$error_handler->registerErrorHandler();
$error_handler->registerShutdownFunction();
include './Classes/LoginRegister.php';
Extras::TimeZone();

if (Extras::IsAjax() == true) {
	$LoginRegister = new LoginRegister();
	if ($_POST['Type'] == 'Login') {
		echo $LoginRegister->Login($_POST['CompassId'], $_POST['Password']);
		$LoginRegister->LogLogin($_POST);
	} else if ($_POST['Type'] == 'Register') {
		$LoginRegister->Register($_POST['CompassId'], $_POST['Nickname'], $_POST['Password'], $_POST['ConfirmPassword']);
		$LoginRegister->LogRegister($_POST);
	} else if ($_POST['Type'] == 'AddStatus') {
		echo $LoginRegister->InsertStatus($_FILES, $_POST);
	} else if ($_POST['Type'] == 'like-unlike') {
		echo $LoginRegister->like($_POST['StatusId'], $_POST['case']);
	} else if ($_POST['Type'] == 'searchname') {
		echo $LoginRegister->SearchUser($_POST['name']);
	} else if ($_POST['Type'] = 'LoginAttempt') {
		$LoginRegister->LogLogin($_POST);
	} else if ($_POST['Type'] == 'RegisterAttempt') {
		$LoginRegister->LogRegister($_POST);
	}
}


?>