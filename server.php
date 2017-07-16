<?php
// prevent the server from timing out
set_time_limit(0);
require_once './vendor/autoload.php';
Raven_Autoloader::register();
$client = new Raven_Client('[YOUR OWN SENTRY ID]');
$error_handler = new Raven_ErrorHandler($client);
$error_handler->registerExceptionHandler();
$error_handler->registerErrorHandler();
$error_handler->registerShutdownFunction();

// include the web sockets server script (the server is started at the far bottom of this file)
require './Classes/class.PHPWebSocket.php';
require './Classes/LoginRegister.php';
$LoginRegister = new LoginRegister;
$UserDataArray = [];


function wsOnOpen($clientID) {
	global $Server, $LoginRegister;
	$ip = long2ip($Server->wsClients[$clientID][6]);
	$Server->log("$ip ($clientID) has connected.");
}

function wsOnClose($clientID, $status) {
	global $Server, $LoginRegister, $UserDataArray;
	$ip = long2ip($Server->wsClients[$clientID][6]);
	$Server->log("$ip ($clientID) has disconnected.");
	$LoginRegister->RemoveWebSocketClient($clientID);
	$UserData = $LoginRegister->GetUserDetailsWS($UserDataArray[$clientID]);
	$UserFriends = unserialize($LoginRegister->ListFriendsChat(true, $UserData['UserId']));
	$FriendsClientId = $LoginRegister->GetFriendsClientId($UserFriends);
	foreach ($FriendsClientId as $key => $value) {
		$Server->wsSend($value, json_encode(array('user' => $UserData['UserId'], 'status' => 'offline', 'type' => 'status')));
	}
}

function wsOnMessage($clientID, $message, $messageLength, $binary) {
	global $Server, $LoginRegister, $UserDataArray;
	$ip = long2ip( $Server->wsClients[$clientID][6] );
	if ($messageLength == 0) {
		$Server->wsClose($clientID);
		return;
	}
	$data = json_decode($message, true);
	if (!isset($data['type']) && !isset($data['data'])) {
		$Server->wsClose($clientID);
		return;
	}
	if ($data['type'] == 'oath') {
		$UserData = $LoginRegister->GetUserDetailsWS($data['data']);
		$Server->log("$ip ($clientID) is: ".$UserData['UserId']." - ".$UserData['NickName']);
		$LoginRegister->AddWebSocketClient($UserData['UserId'], $ip, $clientID);
		$UserDataArray[$clientID] = $data['data'];;
		$UserFriends = unserialize($LoginRegister->ListFriendsChat(true, $UserData['UserId']));
		$FriendsClientId = $LoginRegister->GetFriendsClientId($UserFriends);
		foreach ($FriendsClientId as $key => $value) {
			$Server->wsSend($value, json_encode(array('user' => $UserData['UserId'], 'status' => 'online', 'type' => 'status')));
		}
	} else if ($data['type'] == 'message') {
		if (!isset($UserDataArray[$clientID])) {
			return false;
		} else {
			$messages = json_decode($data['data'], true);
			$UserData = $LoginRegister->GetUserDetailsWS($UserDataArray[$clientID]);
			if ($LoginRegister->CheckFriendsChat($UserData['UserId'], $messages['id'])) {
				$Sessions = $LoginRegister->InsertChat($UserData['UserId'], $messages['id'], $messages['message'], $ip, $clientID);
				$Sessions = unserialize($Sessions);
				$Server->log($ip.' ('.$clientID.') - '.$UserData['UserId'].' sent message to '.$messages['id'].' : '.$messages['message']);
				foreach ($Sessions as $key => $value) {
					$Server->wsSend($value[1], json_encode(array('from'=>$UserData['UserId'],'to'=>$messages['id'],'message'=>$messages['message'], 'type' => 'message')));
					$Server->log(json_encode(array('from'=>$UserData['UserId'],'to'=>$messages['id'],'message'=>$messages['message'])));
				}

			}
		}
	}
}

// start the server
$Server = new PHPWebSocket();
$Server->bind('message', 'wsOnMessage');
$Server->bind('open', 'wsOnOpen');
$Server->bind('close', 'wsOnClose');
// for other computers to connect, you will probably need to change this to your LAN IP or external IP,
// alternatively use: gethostbyaddr(gethostbyname($_SERVER['SERVER_NAME']))
$Server->wsStartServer('127.0.0.1', 1915);

?>