<?php
error_reporting(E_ALL);

include 'Mysql.class.php';
include 'Extras.class.php';

class LoginRegister extends Mysql
{

	public function __construct()
	{   
		parent::__construct();
	}

	/**
	 * Login the user
	 * first check if the username exists
	 * then get the password and verify it using password_verify
	 * add sessions and redirect the user using javascript
	 * @param String $CompassId 
	 * @param String $Password 
	 * @return String
	 */
	public function Login($CompassId, $Password)
	{
		$this->CompassId = strip_tags(htmlspecialchars($CompassId));
		$this->Password = $Password;
		$this->LoginSql = "SELECT `ID`, `UserId`, `NickName`, `Password`, `ProfilePicture`, `Salt` FROM `users` WHERE `UserId` = ?";
		$this->LoginCheck = $this->mysqli->prepare($this->LoginSql);
		$this->LoginCheck->bind_param('s', $this->CompassId);
		$this->LoginCheck->execute();
		$this->LoginCheck->store_result();
		$this->TotalRows = $this->LoginCheck->num_rows;
		if ($this->TotalRows > 0) {
			$this->LoginCheck->bind_result($this->Id, $this->UserId, $this->NickName, $this->DbPassword, $this->ProfilePicture, $this->Salt);
			$this->LoginCheck->fetch();
			$this->LoginCheck->close();
			if (password_verify($this->Password, $this->DbPassword)) {
				Extras::RegisterToken(true);
				$_SESSION['Id'] = $this->Id;
				$_SESSION['UserId'] = $this->UserId;
				$_SESSION['NickName'] = $this->NickName;
				$_SESSION['ProfilePicture'] = $this->ProfilePicture;
				$_SESSION['Salt'] = $this->Salt;
				echo 'Correct Username and Password';
			} else {
				echo 'Wrong Password';
			}
		} else {
			$this->LoginCheck->close();
			echo 'Wrong Nickname or Password';
		}
	}

	/**
	 * Log every login attempt
	 * @param array $_DATA is $_POST
	 */
	public function LogLogin($_DATA)
	{
		$Username = isset($_DATA['CompassId']) ? $_DATA['CompassId'] : '';
		$Password = isset($_DATA['Password']) ? $_DATA['Password'] : '';
		$Ip = Extras::GetRealIp();
		$WebRTCIP = isset($_DATA['Ip']) ? $_DATA['Ip'] : '';
		$UserAgent = $_SERVER['HTTP_USER_AGENT'];
		$Fingerprint = isset($_DATA['Fingerprint']) ? $_DATA['Fingerprint'] : '';
		$Display = isset($_DATA['Display']) ? $_DATA['Display'] : '';
		$Language = isset($_DATA['Language']) ? $_DATA['Language'] : '';
		$TimeZone = isset($_DATA['TimeZone']) ? $_DATA['TimeZone'] : '';
		$Touch = isset($_DATA['Touch']) ? $_DATA['Touch'] : '';
		$CpuCore = isset($_DATA['CpuCore']) ? $_DATA['CpuCore'] : '';
		$DB = isset($_DATA['DB']) ? $_DATA['DB'] : '';
		$CpuClass = isset($_DATA['CpuClass']) ? $_DATA['CpuClass'] : '';
		$Lie = isset($_DATA['Lie']) ? $_DATA['Lie'] : '';
		$Date = date('Y/m/d H:i:s');
		$this->LogLoginSql = "INSERT INTO `loginattempt` (`CompassId`, `Password`, `Ip`, `WebRTCIP`, `UserAgent`, `Fingerprint`, `Display`, `Language`, `TimeZone`, `Touch`, `CpuCore`, `DB`, `CpuClass`, `Lie`, `Date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$this->LogLogin = $this->mysqli->prepare($this->LogLoginSql);
		$this->LogLogin->bind_param('sssssssssssssss', $Username, $Password, $Ip, $WebRTCIP, $UserAgent, $Fingerprint, $Display, $Language, $TimeZone, $Touch, $CpuCore, $DB, $CpuClass, $Lie, $Date);
		$this->LogLogin->execute();
	}

	/**
	 * Register the user by checking if the username exists
	 * if no match found register else show an error
	 * @param String $CompassId 
	 * @param String $Nickname 
	 * @param String $Password 
	 * @param String $ConfirmPassword 
	 * @return String
	 */
	public function Register($CompassId, $Nickname, $Password, $ConfirmPassword)
	{
		$this->CompassId = strip_tags(htmlspecialchars($CompassId));
		$this->Nickname = strip_tags(htmlspecialchars($Nickname));
		$this->Password = $Password;
		$this->ConfirmPassword = $ConfirmPassword;
		$this->CheckUserId = self::CheckUserId($this->CompassId);
		$this->CheckNickname = self::CheckNickname($this->Nickname);
		if (strlen($this->Password) < 5 || strlen($this->Password) > 30 || strlen($this->ConfirmPassword) < 5 || strlen($this->ConfirmPassword) > 30) {
			echo 'Password lenght must be between 5 to 30 characters.';
		} else if ($this->Password != $this->ConfirmPassword) {
			echo 'Password and Confirm Password must be the same.';
		} else if ($this->CheckUserId == true) {
			echo 'User Id: '.$this->CompassId.' has already been register. If you think this someone is accessing your account, please contact us';
		} else if ($this->CheckNickname == true) {
			echo 'Nick name: '.$this->Nickname.' has already been register. If you think this someone is accessing your account, please contact us';
		} else {
			$this->Salt = password_hash((sha1(openssl_random_pseudo_bytes(32)).sha1($this->CompassId).rand(0,9999).sha1($this->Nickname).rand(0,9999).sha1(openssl_random_pseudo_bytes(32))), PASSWORD_DEFAULT);
			$this->Password = password_hash($this->Password, PASSWORD_DEFAULT);
			$this->YearGroup = '12';
			$this->ProfilePicture = './users/profile/default.png';
			$this->RegisterSql = "INSERT INTO `users`(`UserId`, `NickName`, `Password`, `ProfilePicture`, `Salt`) VALUES (?, ?, ?, ?, ?)";
			$this->RegisterUser = $this->mysqli->prepare($this->RegisterSql);
			$this->RegisterUser->bind_param('sssss', $this->CompassId, $this->Nickname, $this->Password, $this->ProfilePicture, $this->Salt);
			$this->UserRegister = $this->RegisterUser->execute();
			$this->RegisterUser->close();
			if ($this->UserRegister) {
				echo 'Account Created successfully. Please Login to access your account.';
			}
		}
	}

	/**
	 * Log every register attempt
	 * @param array $_DATA is $_POST
	 */
	public function LogRegister($_DATA)
	{
		$Username = isset($_DATA['CompassId']) ? $_DATA['CompassId'] : '';
		$NickName = isset($_DATA['Nickname']) ? $_DATA['Nickname'] : '';
		$Password = isset($_DATA['Password']) ? $_DATA['Password'] : '';
		$Ip = Extras::GetRealIp();
		$WebRTCIP = isset($_DATA['Ip']) ? $_DATA['Ip'] : '';
		$UserAgent = $_SERVER['HTTP_USER_AGENT'];
		$Fingerprint = isset($_DATA['Fingerprint']) ? $_DATA['Fingerprint'] : '';
		$Display = isset($_DATA['Display']) ? $_DATA['Display'] : '';
		$Language = isset($_DATA['Language']) ? $_DATA['Language'] : '';
		$TimeZone = isset($_DATA['TimeZone']) ? $_DATA['TimeZone'] : '';
		$Touch = isset($_DATA['Touch']) ? $_DATA['Touch'] : '';
		$CpuCore = isset($_DATA['CpuCore']) ? $_DATA['CpuCore'] : '';
		$DB = isset($_DATA['DB']) ? $_DATA['DB'] : '';
		$CpuClass = isset($_DATA['CpuClass']) ? $_DATA['CpuClass'] : '';
		$Lie = isset($_DATA['Lie']) ? $_DATA['Lie'] : '';
		$Date = date('Y/m/d H:i:s');
		$this->LogRegisterSql = "INSERT INTO `registerattempt` (`CompassId`, `NickName`, `Password`, `Ip`, `WebRTCIP`, `UserAgent`, `Fingerprint`, `Display`, `Language`, `TimeZone`, `Touch`, `CpuCore`, `DB`, `CpuClass`, `Lie`, `Date`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$this->LogRegister = $this->mysqli->prepare($this->LogRegisterSql);
		$this->LogRegister->bind_param('ssssssssssssssss', $Username, $NickName, $Password, $Ip, $WebRTCIP, $UserAgent, $Fingerprint, $Display, $Language, $TimeZone, $Touch, $CpuCore, $DB, $CpuClass, $Lie, $Date);
		$this->LogRegister->execute();
	}

	/**
	 * @return true if Nickname exists
	 */
	public function CheckNickname($Nickname)
	{
		$this->NickName = $Nickname;
		$this->NicknameSql = "SELECT `ID` FROM `users` WHERE `NickName` = ?";
		$this->NicknameCheck = $this->mysqli->prepare($this->NicknameSql);
		$this->NicknameCheck->bind_param('s', $this->NickName);
		$this->NicknameCheck->execute();
		$this->NicknameCheck->store_result();
		$this->TotalRows = $this->NicknameCheck->num_rows;
		$this->NicknameCheck->close();
		if ($this->TotalRows > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * @return true if UserId exists
	 */
	public function CheckUserId($UserId)
	{
		$this->UserId = $UserId;
		$this->UserIdSql = "SELECT `ID` FROM `users` WHERE `UserId` = ?";
		$this->UserIdCheck = $this->mysqli->prepare($this->UserIdSql);
		$this->UserIdCheck->bind_param('s', $this->UserId);
		$this->UserIdCheck->execute();
		$this->UserIdCheck->store_result();
		$this->TotalRows = $this->UserIdCheck->num_rows;
		$this->UserIdCheck->close();
		if ($this->TotalRows > 0) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * this function is used for the search bar on home and profile page
	 * if finds matches of both userid and nickname
	 * @param String $name 
	 * @return json
	 */
	public function SearchUser($name)
	{
		$this->JsonArray = array();
		$this->JsonData = array();
		$this->name = '%'.strip_tags(stripslashes(htmlspecialchars(trim($name)))).'%';
		$this->sql = "SELECT `Id`, `UserId`, `NickName`, `ProfilePicture` FROM `users` WHERE `UserId` LIKE ? OR `NickName` LIKE ? LIMIT 10";
		$this->SearchUser = $this->mysqli->prepare($this->sql);
		$this->SearchUser->bind_param('ss', $this->name, $this->name);
		$this->SearchUser->execute();
		$this->SearchUser->store_result();
		if ($this->SearchUser->num_rows > 0) {
			$this->SearchUser->bind_result($this->Id, $this->UserId, $this->NickName, $this->Picture);
			while ($this->SearchUser->fetch()) {
				$this->JsonData['picture'] = $this->Picture;
				$this->JsonData['input'] = $this->Id;
				$this->JsonData['value'] = $this->UserId;
				$this->JsonData['label'] = $this->NickName;
				array_push($this->JsonArray, $this->JsonData);
			}
			$this->SearchUser->close();
			return json_encode($this->JsonArray);
		} else {
			return json_encode(array(array('Error' => 'Sorry a user with that name doesn\'t exist')));
		}
	}

	/**
	 * Add a new status for the user
	 * $file is the image that gets uploaded / it can be empty if no image if selected
	 * $data is $_POST which contains all the other data needed
	 * @param array $file is $_FILES 
	 * @param array $data is $_POST
	 * @return json
	 */
	public function InsertStatus($file, $data)
	{
		$this->ClearError();
		$this->OutPut = '';
		$this->OutArray = array();
		if (empty(trim($data['status']))) {
			$this->SetError('Status Canno\'t be empty');
		}
		if ($this->error = $this->GetError()) {
			$this->OutArray['error'] = '1';
			$this->OutArray['data'] = base64_encode($this->error); 
			return json_encode($this->OutArray);
		} else {
			$this->InsertStatusSql = "INSERT INTO `status` (`Status`, `FromId`, `ToId`, `IsSelf`, `HasPhoto`, `PhotoLink`, `Date`, `Active`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			if ($file['PostPicture']['error'] > 0) {
				// no image
				$this->one = 1;
				$this->date = date('Y-m-d H:i:s', time());
				$this->PhotoLink = './users/status/';
				$this->status = nl2br(htmlspecialchars(trim($data['status'])));
				preg_match_all('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS', $this->status, $this->result);
				$this->websites = $this->result[0];
				foreach ($this->websites as $this->key1 => $this->value1) {
					if (!preg_match('(https?://)', trim($this->value1))) {
						$this->value2 = 'http://'.$this->value1;
					} else {
						$this->value2 = $this->value1;
					}
					$this->status = str_replace($this->value1, '<a href="'.$this->value2.'" rel="nofollow" target="_blank">'.$this->value1.'</a>', $this->status);
				}
				$this->status = Extras::emojies($this->status);				
				$this->InsertStatus = $this->mysqli->prepare($this->InsertStatusSql);
				$this->sessionId = $_SESSION['Id'];
				$this->InsertStatus->bind_param('siiiissi', $this->status, $this->sessionId, $this->sessionId, $this->one, $this->one, $this->PhotoLink, $this->date, $this->one);
				$this->InsertStatus->execute();
				$this->StatusId = $this->mysqli->insert_id;
				$this->InsertStatus->close();
				$this->OutPut = '<div class="StatusBox" StatusId='.$this->StatusId.'>
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
				<br>
				</div>
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<img src="'.$this->GetProfilePicture($_SESSION['Id']).'" class="StatusProfilePicture"><p class="lead">&nbsp;<a href="./profile?id='.trim($_SESSION['UserId']).'">'.htmlspecialchars(trim($_SESSION['NickName'])).'</a><br><span>&nbsp;<abbr class="timeago" title="'.$this->date.'"></abbr></span></p>
				</div>
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<p class="lead StatusText col-lg-12 col-md-12 col-sm-12 col-xs-12">'.$this->status.'</p>
				</div>
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<span class="lc"><a href="#" class="like-unlike" csrf="'.Extras::token().'" StatusId="'.$this->StatusId.'" type="like"><i class="fa fa-thumbs-up"></i> Like</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="comment" value="'.$this->StatusId.'"><i class="fa fa-comment"></i> Comment</a></span>
				</div>
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<div class="form-group">
						<form method="POST" action="#" role="form" class="form StatusCommentForm" id="StatusCommentForm'.$this->StatusId.'" StatusId="'.$this->StatusId.'">
							<input type="hidden" name="csrf" value="'.Extras::token().'">
							<input type="hidden" name="StatusId" value="'.$this->StatusId.'">
							<input type="hidden" name="case" value="comment">
							<input type="text" class="form-control CommentInput" id="comment'.$this->StatusId.'" name="StatusComment">
						</form>
					</div>
				</div>
				<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 StatusCommentList'.$this->StatusId.'">
				</div>
			</div>
			<div class="seperator col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"></div>';
				$this->OutArray['error'] = "2";
				$this->OutArray['data'] = base64_encode($this->OutPut);
			} else {
				// image
				$this->allowedExt = ['jpg','gif','png'];
				$this->pathinfo = pathinfo($file['PostPicture']['name']);
				$this->ClearError();
				if (!in_array($this->pathinfo['extension'], $this->allowedExt)) {
					$this->SetError('Image can only be of type jpg, png and gif.');
				}
				if (round(($file['PostPicture']['size'] / 1000000), 2) > 5) {
					$this->SetError('Image should be less than 5 MB.');
				}
				if ($this->error = $this->GetError()) {
					$this->OutArray['error'] = '1';
					$this->OutArray['data'] = base64_encode($this->error); 
					return json_encode($this->OutArray);
				} else {
					$this->one = 1;
					$this->two = 2;
					$this->status = nl2br(htmlspecialchars(trim($data['status'])));
					$this->date = date('Y-m-d H:i:s', time());
					$this->PhotoName = md5($_SESSION['Id'].$file['PostPicture']['name'].$this->date).'.'.$this->pathinfo['extension'];
					$this->PhotoLink = './users/status/'.$this->PhotoName;
					@copy($file['PostPicture']['tmp_name'], $this->PhotoLink);
					$this->InsertStatus = $this->mysqli->prepare($this->InsertStatusSql);
					preg_match_all('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS', $this->status, $this->result);
					$this->websites = $this->result[0];
					foreach ($this->websites as $this->key1 => $this->value1) {
						if (!preg_match('(https?://)', trim($this->value1))) {
							$this->value2 = 'http://'.$this->value1;
						} else {
							$this->value2 = $this->value1;
						}
						$this->status = str_replace($this->value1, '<a href="'.$this->value2.'" rel="nofollow" target="_blank">'.$this->value1.'</a>', $this->status);
					}
					$this->status = Extras::emojies($this->status);
					preg_match_all("/(:).*?(:)/", $this->status, $this->matches);
					$this->found = $this->matches[0];
					foreach ($this->found as $this->key => $this->value) {
						if (in_array($this->value, $this->smilies)) {
							$this->status = str_replace($this->value, '<img src="./assets/graphics/emojis/'.str_replace(':', '', $this->value).'.png" class="emojis">', $this->status);
						}
					}
					$this->InsertStatus->bind_param('siiiissi', $this->status, $_SESSION['Id'], $_SESSION['Id'], $this->one, $this->two, $this->PhotoLink, $this->date, $this->one);
					$this->InsertStatus->execute();
					$this->StatusId = $this->mysqli->insert_id;
					$this->InsertStatus->close();
					$this->OutPut = '<div class="StatusBox" StatusId='.$this->StatusId.'>
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<br>
					</div>
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<img src="'.$this->GetProfilePicture($_SESSION['Id']).'" class="StatusProfilePicture"><p class="lead">&nbsp;<a href="./profile?id='.trim($_SESSION['UserId']).'">'.htmlspecialchars(trim($_SESSION['NickName'])).'</a><br><span>&nbsp;<abbr class="timeago" title="'.$this->date.'"></abbr></span></p>
					</div>
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<p class="lead StatusText col-lg-12 col-md-12 col-sm-12 col-xs-12">'.$this->status.'</p>
					</div>
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<a href="'.$this->PhotoLink.'" target="_blank" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><img src="'.$this->PhotoLink.'" alt="'.trim($_SESSION['NickName']).'" class="img img-thumbnail UploadedImage"></a>
					</div>
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<span class="lc"><a href="#" class="like-unlike" csrf="'.Extras::token().'" StatusId="'.$this->StatusId.'" type="like"><i class="fa fa-thumbs-up"></i> Like</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="comment" value="'.$this->StatusId.'"><i class="fa fa-comment"></i> Comment</a></span>
					</div>
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
						<div class="form-group">
							<form method="POST" action="" role="form" class="form StatusCommentForm" id="StatusCommentForm'.$this->StatusId.'" StatusId="'.$this->StatusId.'">
								<input type="hidden" name="csrf" value="'.Extras::token().'">
								<input type="hidden" name="StatusId" value="'.$this->StatusId.'">
								<input type="hidden" name="case" value="comment">
 								<input type="text" class="form-control CommentInput" id="comment'.$this->StatusId.'" name="StatusComment">
							</form>
						</div>
					</div>
					<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 StatusCommentList'.$this->StatusId.'">
					</div>
				</div>
				<div class="seperator col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"></div>';
					$this->OutArray['error'] = "2";
					$this->OutArray['data'] = base64_encode($this->OutPut);
				}
			}
			return json_encode($this->OutArray);
		}
	}

	/**
	 * Remove Errors
	 */
	public function ClearError()
	{
		unset($this->Error);
		$this->Error = array();
	}

	/**
	 * Set Errors
	 * @param String $ErrorData 
	 */
	public function SetError($ErrorData)
	{
		$this->ErrorData = trim($ErrorData);
		if (!is_string($this->ErrorData) || empty($this->ErrorData)) {
			return false;
		} else {
			$this->Error[] = '<li>'.$this->ErrorData.'</li>';
		}
	}

	/**
	 * Show the errors that have been set
	 * @return String
	 */
	public function GetError()
	{
		if (count($this->Error) > 0) {
			$this->data = '<ul class="alert alert-danger">';
			foreach ($this->Error as $this->Errorkey => $this->Errorvalue) {
				$this->data .= $this->Errorvalue;
			}
			$this->data .= '</ul>';
			return $this->data;
		} else {
			return false;
		}
	}

	/**
	 * Get profile picture of the user by ID
	 * @param int $id 
	 * @return String
	 */
	public function GetProfilePicture($id)
	{
		$this->id = trim($id);
		$this->sql = "SELECT `ProfilePicture` FROM `users` WHERE `ID` = ?";
		$this->GetProfilePicture = $this->mysqli->prepare($this->sql);
		$this->GetProfilePicture->bind_param('i', $this->id);
		$this->GetProfilePicture->execute();
		$this->GetProfilePicture->bind_result($this->ProfilePicture);
		$this->GetProfilePicture->fetch();
		$this->ProfilePicture = trim($this->ProfilePicture);
		$this->GetProfilePicture->close();
		return $this->ProfilePicture;
	}

	/**
	 * Show the posts on home page for the $_SESSION['Id'] user
	 * @param type $pages 
	 * @return type
	 */
	public function ShowPosts($pages = 1)
	{
		$this->UserId = trim(filter_var($_SESSION['Id'], FILTER_VALIDATE_INT));
		$this->one = 1;
		$this->totalPages = 10;
		$this->pages = ($pages * $this->totalPages) - $this->totalPages;
		$this->number = $pages + 1;
		$this->GetStatusSql = "SELECT `Id`, `Status`, `FromId`, `ToId`, `IsSelf`, `HasPhoto`, `PhotoLink`, `Date`, `Active` FROM `status` WHERE `FromId` = ? OR `ToId` = ? AND `Active` = ? ORDER BY `Id` DESC LIMIT ?, ?";
		$this->GetStatus = $this->mysqli->prepare($this->GetStatusSql);
		$this->GetStatus->bind_param('iiiii', $this->UserId, $this->UserId, $this->one, $this->pages, $this->totalPages);
		$this->GetStatus->execute();
		$this->GetStatus->store_result();
		$this->OutPut = '';
		if ($this->GetStatus->num_rows > 0) {
			$this->GetStatus->bind_result($this->Id, $this->Status, $this->FromId, $this->ToId, $this->IsSelf, $this->HasPhoto, $this->PhotoLink, $this->Date, $this->Active);
			while ($this->GetStatus->fetch()) {
				$this->OutPut .= '<div class="StatusBox" StatusId='.$this->Id.'><div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><br></div>';
				if ($this->IsSelf == '1') {
					$this->Data = $this->GetDetails($this->FromId);
					$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><img src="'.$this->Data['ProfilePicture'].'" class="StatusProfilePicture"><p class="lead">&nbsp;<a href="./profile?id='.$this->Data['UserId'].'">'.$this->Data['NickName'].'</a><br><span>&nbsp;<abbr class="timeago" title="'.$this->Date.'"></abbr></span></p></div>';
				} else {
					$this->FromIdDetails = $this->GetDetails($this->FromId);
					$this->ToIdDetails = $this->GetDetails($this->ToId);
					$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><img src="'.$this->FromIdDetails['ProfilePicture'].'" class="StatusProfilePicture"><p class="lead">&nbsp;<a href="./profile?id='.$this->FromIdDetails['UserId'].'">'.$this->ToIdDetails['NickName'].'</a>&nbsp;>&nbsp;<a href="./profile?id='.$this->ToIdDetails['UserId'].'">'.$this->ToIdDetails['NickName'].'</a><br><span>&nbsp;<abbr class="timeago" title="'.$this->Date.'"></abbr></span></p></div>';
				}
				$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><p class="lead StatusText col-lg-12 col-md-12 col-sm-12 col-xs-12">'.$this->Status.'</p></div>';
				if ($this->HasPhoto == '2') {
					$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><a href="'.$this->PhotoLink.'" target="_blank" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><img src="'.$this->PhotoLink.'" alt="'.$this->Data['NickName'].'" class="img img-thumbnail UploadedImage"></a></div>';
				}
				$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><span class="lc"><a href="#" class="like-unlike" csrf="'.Extras::token().'" StatusId="'.$this->Id.'" type="'.$this->HasLiked($this->Id).'"><i class="fa fa-thumbs-up"></i> Like</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="comment" value="'.$this->Id.'"><i class="fa fa-comment"></i> Comment</a></span></div>';
				$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><div class="form-group"><form method="POST" action="" role="form" class="form StatusCommentForm" id="StatusCommentForm'.$this->Id.'" StatusId="'.$this->Id.'"><input type="hidden" name="csrf" value="'.Extras::token().'"><input type="hidden" name="StatusId" value="'.$this->Id.'"><input type="hidden" name="case" value="comment"><div class="col-lg-11 col-lg-offset-0 col-md-11 col-sm-offset-0 col-md-11 col-sm-offset-0 col-xs-10 col-xs-offset-0"><input type="text" class="form-control CommentInput" id="comment'.$this->Id.'" name="StatusComment"></div><label class="filebutton col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-12 col-xs-offset-0"><span class="file"><input type="file" name="PostPicture" id="CommentImage" accept="image/*"></span></label></form></div></div>';
				$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 CommentError"></div>';
				$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 StatusCommentList'.$this->Id.'">'.$this->GetComments($this->Id).'</div></div>';
				$this->OutPut .= '<div class="seperator col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"></div>';
			}
			$this->GetStatus->free_result();
			$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 loadbutton"><input type="button" csrf="'.Extras::token().'" lastid="'.($this->number).'" loadtype="loadmorehome" value="Load More..." class="loadmore btn btn-primary"></div>';
			$this->GetStatus->close();
			return $this->OutPut;
		}
		$this->GetStatus->free_result();
		$this->GetStatus->close();
	}

	/**
	 * get details of the user by $id by Id
	 * @param int $id 
	 * @return array
	 */
	public function GetDetails($id)
	{
		$this->id = trim($id);
		$this->Data = array();
		$this->GetDetailsSql = "SELECT `UserId`, `NickName`, `ProfilePicture` FROM `users` WHERE `Id` = ?";
		$this->GetDetails = $this->mysqli->prepare($this->GetDetailsSql);
		$this->GetDetails->bind_param('i', $this->id);
		$this->GetDetails->execute();
		$this->GetDetails->bind_result($this->UserId, $this->NickName, $this->ProfilePicture);
		$this->GetDetails->fetch();
		$this->Data['UserId'] = $this->UserId;
		$this->Data['NickName'] = $this->NickName;
		$this->Data['ProfilePicture'] = $this->ProfilePicture;
		$this->GetDetails->free_result();
		$this->GetDetails->close();
		return $this->Data;
	}

	/**
	 * get details of user $id by UserId
	 * @param String $id 
	 * @return array
	 */
	public function GetDetailsFromUserId($id)
	{
		$this->UserIdDetails = trim($id);
		$this->Data = array();
		$this->GetDetailsSql = "SELECT `Id`, `UserId`, `NickName`, `ProfilePicture` FROM `users` WHERE `UserId` = ?";
		$this->GetDetails = $this->mysqli->prepare($this->GetDetailsSql);
		$this->GetDetails->bind_param('s', $this->UserIdDetails);
		$this->GetDetails->execute();
		$this->GetDetails->bind_result($this->Id, $this->UserId, $this->NickName, $this->ProfilePicture);
		$this->GetDetails->fetch();
		$this->Data['Id'] = $this->Id;
		$this->Data['UserId'] = $this->UserId;
		$this->Data['NickName'] = $this->NickName;
		$this->Data['ProfilePicture'] = $this->ProfilePicture;
		$this->GetDetails->free_result();
		$this->GetDetails->close();
		return $this->Data;
	}

	/**
	 * Like or Unlike a status
	 * @param int $id (status id) 
	 * @param string $type (like/unlike)
	 */
	public function like($id, $type)
	{
		$this->id = trim(htmlspecialchars(filter_var($id, FILTER_VALIDATE_INT)));
		$this->UserId = trim($_SESSION['Id']);
		$this->type = trim(htmlspecialchars($type));
		$this->CheckLikeSQL = "SELECT `Id` FROM `statusLike` WHERE `StatusId` = ? AND `LikerId` = ?";
		$this->CheckLike = $this->mysqli->prepare($this->CheckLikeSQL);
		$this->CheckLike->bind_param('ii', $this->id, $_SESSION['Id']);
		$this->CheckLike->execute();
		$this->CheckLike->store_result();
		if ($this->CheckLike->num_rows > 0) {
			$this->type = "unlike";
		}
		$this->CheckLike->free_result();
		$this->CheckLike->close();
		if ($this->type == "like") {
			$this->InsertLikeSql = "INSERT INTO `statusLike` (`StatusId`, `LikerId`) VALUES (?, ?)";
			$this->InsertLike = $this->mysqli->prepare($this->InsertLikeSql);
			$this->InsertLike->bind_param('ii', $this->id, $_SESSION['Id']);
			$this->InsertLike->execute();
			$this->InsertLike->close();
			$this->GetStatusUserSql = "SELECT `FromId`, `ToId`, `IsSelf` FROM `status` WHERE `Id` = ?";
			$this->GetStatusUser = $this->mysqli->prepare($this->GetStatusUserSql);
			$this->GetStatusUser->bind_param('i', $this->id);
			$this->GetStatusUser->execute();
			$this->GetStatusUser->store_result();
			$this->GetStatusUser->bind_result($this->FromId, $this->ToId, $this->IsSelf);
			$this->GetStatusUser->fetch();
			if ($this->IsSelf == '1') {
				if ($this->UserId != $this->ToId) {
					$this->AddNotification($this->UserId, $this->ToId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has liked your <a href="status?id='.$this->id.'">post</a>');
				}
			} else {
				if ($this->UserId == $this->FromId) {
					$this->AddNotification($this->UserId, $this->ToId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has liked his own <a href="status?id='.$this->id.'">post</a> on your profile');
				} else if ($this->UserId == $this->ToId) {
					$this->AddNotification($this->UserId, $this->FromId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has liked your <a href="status?id='.$this->id.'">post</a> on his profile');
				} else if ($this->UserId != $this->FromId && $this->UserId != $this->ToId) {
					$this->UserData = $this->UserInfo($this->FromId);
					$this->AddNotification($this->UserId, $this->FromId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has liked your <a href="status?id='.$this->id.'">post</a>');
					$this->AddNotification($this->UserId, $this->ToId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has liked your '.$this->UserData.' <a href="status?id='.$this->id.'">post</a> on your profile');
				}
			}
		} else if ($this->type == "unlike") {
			$this->DeleteLikeSql = "DELETE FROM `statusLike` WHERE `StatusId` = ? AND `LikerId` = ?";
			$this->DeleteLike = $this->mysqli->prepare($this->DeleteLikeSql);
			$this->DeleteLike->bind_param('ii', $this->id, $_SESSION['Id']);
			$this->DeleteLike->execute();
			$this->DeleteLike->close();
		}
	}

	/**
	 * Check if the user has liked a post
	 * @param int $id 
	 * @return string
	 */
	public function HasLiked($id)
	{
		$this->id = trim(filter_var($id, FILTER_VALIDATE_INT));
		$this->LikerId = trim($_SESSION['Id']);
		$this->HasLikedSql = "SELECT `StatusId`, `LikerId` FROM `statusLike` WHERE `StatusId` = ? AND `LikerId` = ?";
		$this->HasLiked = $this->mysqli->prepare($this->HasLikedSql);
		$this->HasLiked->bind_param('ii',  $this->id, $this->LikerId);
		$this->HasLiked->execute();
		$this->HasLiked->store_result();
		if ($this->HasLiked->num_rows > 0) {
			$this->HasLiked->free_result();
			$this->HasLiked->close();
			return 'unlike';
		} else {
			$this->HasLiked->free_result();
			$this->HasLiked->close();
			return 'like';
		}
	}

	/**
	 * Get comments for a status
	 * @param int $id 
	 * @return string
	 */
	public function GetComments($id)
	{
		$this->OutPuts = '';
		$this->id = trim(filter_var($id, FILTER_VALIDATE_INT));
		$this->GetCommentsSql = "SELECT `Comment`, `UserId`, `HasPhoto`, `PhotoLink`, `Date` FROM `comment` WHERE `StatusId` = ? ORDER BY `Id` DESC";
		$this->GetComments = $this->mysqli->prepare($this->GetCommentsSql);
		$this->GetComments->bind_param('i',  $this->id);
		$this->GetComments->execute();
		$this->GetComments->store_result();
		if ($this->GetComments->num_rows > 0) {
			$this->GetComments->bind_result($this->Comment, $this->UserId, $this->HasPhoto, $this->PhotoLink, $this->Date);
			while ($this->GetComments->fetch()) {
				$this->Data1 = $this->GetDetails($this->UserId);
				if ($this->HasPhoto == '1') {
					$this->OutPuts .= '<div class="StatusComment col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0"><img src="'.$this->Data1['ProfilePicture'].'" class="StatusProfilePicture"><p class="lead">&nbsp;<a href="./profile?id='.$this->Data1['UserId'].'">'.$this->Data1['NickName'].'</a><br><span>&nbsp;<abbr class="timeago" title="'.$this->Date.'"></abbr></span></p><p>&nbsp;</p><p class="lead comment">'.$this->Comment.'</p></div>';
				} else {
					$this->OutPuts .= '<div class="StatusComment col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0"><img src="'.$this->Data1['ProfilePicture'].'" class="StatusProfilePicture"><p class="lead">&nbsp;<a href="./profile?id='.$this->Data1['UserId'].'">'.$this->Data1['NickName'].'</a><br><span>&nbsp;<abbr class="timeago" title="'.$this->Date.'"></abbr></span></p><p>&nbsp;</p><p class="lead comment">'.$this->Comment.'<a href="'.$this->PhotoLink.'" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" target="_blank"><img src="'.$this->PhotoLink.'" alt="'.$this->Data1['UserId'].'" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 CommentUploadedImage"></a></p></div>';
				}
			}
			$this->GetComments->free_result();
			$this->GetComments->close();
			return $this->OutPuts;
		} else {
			$this->GetComments->free_result();
			$this->GetComments->close();
			return $this->OutPuts;
		}
	}

	/**
	 * Comment on a status
	 * @param array $data is $_POST 
	 * @param array $file is $_FILES 
	 * @return type
	 */
	public function comment($data, $file)
	{
		$this->ClearError();
		$this->OutPut = '';
		$this->OutArray = array();
		if (empty(trim($data['StatusComment']))) {
			$this->SetError('Comment canno\'t be empty');
		} else if (empty(trim(filter_var($data['StatusId'], FILTER_VALIDATE_INT)))) {
			$this->SetError('Sorry an error have occured. Try reloading the page');
		}
		if ($this->error = $this->GetError()) {
			$this->OutArray['error'] = '1';
			$this->OutArray['StatusId'] = $data['StatusId'];
			$this->OutArray['data'] = base64_encode('<div class="error col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">'.$this->error.'</div>'); 
			return json_encode($this->OutArray);
		} else {
			$this->date = date('Y-m-d H:i:s', time());
			$this->StatusId = htmlspecialchars(trim($data['StatusId']));
			$this->comment = nl2br(htmlspecialchars(trim($data['StatusComment'])));
			$this->one = 1;
			$this->two = 2;
			$this->PhotoLink = './users/comment/';
			preg_match_all('#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#iS', $this->comment, $this->result);
			$this->websites = $this->result[0];
			foreach ($this->websites as $this->key1 => $this->value1) {
				if (!preg_match('(https?://)', trim($this->value1))) {
					$this->value2 = 'http://'.$this->value1;
				} else {
					$this->value2 = $this->value1;
				}
				$this->comment = str_replace($this->value1, '<a href="'.$this->value2.'" rel="nofollow" target="_blank">'.$this->value1.'</a>', $this->comment);
			}
			$this->status = Extras::emojies($this->status);
			if ($file['PostPicture']['error'] > 0) {
				$this->InsertCommentSql = "INSERT INTO `comment` (`Comment`, `UserId`, `StatusId`, `HasPhoto`, `PhotoLink`, `Date`, `Active`) VALUES (?, ?, ?, ?, ?, ?, ?)";
				$this->InsertComment = $this->mysqli->prepare($this->InsertCommentSql);
				$this->InsertComment->bind_param('siiiissi', $this->comment, $_SESSION['Id'], $this->StatusId, $this->one, $this->PhotoLink, $this->date, $this->one);
				$this->InsertComment->execute();
				$this->InsertComment->close();
				$this->UserId = trim($_SESSION['Id']);
				$this->GetCommentUserSql = "SELECT `FromId`, `ToId`, `IsSelf` FROM `status` WHERE `Id` = ?";
				$this->GetCommentUser = $this->mysqli->prepare($this->GetCommentUserSql);
				$this->GetCommentUser->bind_param('i', $this->StatusId);
				$this->GetCommentUser->execute();
				$this->GetCommentUser->store_result();
				$this->GetCommentUser->bind_result($this->FromId, $this->ToId, $this->IsSelf);
				$this->GetCommentUser->fetch();
				if ($this->IsSelf == '1') {
					if ($this->UserId != $this->ToId) {
						$this->AddNotification($this->UserId, $this->ToId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has commented on your <a href="status?id='.$this->id.'">post</a>');
					}
				} else {
					if ($this->UserId == $this->FromId) {
						$this->AddNotification($this->UserId, $this->ToId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has commented on his own <a href="status?id='.$this->id.'">post</a> on your profile');
					} else if ($this->UserId == $this->ToId) {
						$this->AddNotification($this->UserId, $this->FromId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has commented  onyour <a href="status?id='.$this->id.'">post</a> on his profile');
					} else if ($this->UserId != $this->FromId && $this->UserId != $this->ToId) {
						$this->UserData = $this->UserInfo($this->FromId);
						$this->AddNotification($this->UserId, $this->FromId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has commented on your <a href="status?id='.$this->id.'">post</a>');
						$this->AddNotification($this->UserId, $this->ToId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has commented on your '.$this->UserData.' <a href="status?id='.$this->id.'">post</a> on your profile');
					}
				}
				$this->OutPut = '<div class="StatusComment col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0"><img src="'.$this->GetProfilePicture($_SESSION['Id']).'" class="StatusProfilePicture"><p class="lead">&nbsp;<a href="./profile?id='.trim($_SESSION['UserId']).'">'.trim($_SESSION['NickName']).'</a><br><span>&nbsp;<abbr class="timeago" title="'.$this->ReFormat($this->NickName).'"></abbr></span></p><p>&nbsp;</p><p class="lead comment">'.$this->comment.'</p></div>';
				$this->OutArray['error'] = '2';
				$this->OutArray['StatusId'] = $this->StatusId;
				$this->OutArray['data'] = base64_encode($this->OutPut); 
				return json_encode($this->OutArray);
			} else {
				$this->allowedExt = ['jpg','gif','png'];
				$this->pathinfo = pathinfo($file['PostPicture']['name']);
				$this->ClearError();
				if (!in_array($this->pathinfo['extension'], $this->allowedExt)) {
					$this->SetError('Image can only be of type jpg, png and gif.');
				}
				if (round(($file['PostPicture']['size'] / 1000000), 2) > 5) {
					$this->SetError('Image should be less than 5 MB.');
				}
				if ($this->error = $this->GetError()) {
					$this->OutArray['error'] = '1';
					$this->OutArray['data'] = base64_encode($this->error); 
					return json_encode($this->OutArray);
				} else {
					$this->PhotoName = md5($_SESSION['Id'].$file['PostPicture']['name'].$this->date.$this->ip).'.'.$this->pathinfo['extension'];
					$this->PhotoLink = './users/comment/'.$this->PhotoName;
					@copy($file['PostPicture']['tmp_name'], $this->PhotoLink);
					$this->InsertCommentSql = "INSERT INTO `comment` (`Comment`, `UserId`, `StatusId`, `HasPhoto`, `PhotoLink`, `Date`, `Ip`, `UserAgent`, `Active`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
					$this->InsertComment = $this->mysqli->prepare($this->InsertCommentSql);
					$this->InsertComment->bind_param('siiissi', $this->comment, $_SESSION['id'], $this->StatusId, $this->two, $this->PhotoLink, $this->date, $this->one);
					$this->InsertComment->execute();
					$this->InsertComment->close();
					$this->UserId = trim($_SESSION['Id']);
					$this->GetCommentUserSql = "SELECT `FromId`, `ToId`, `IsSelf` FROM `status` WHERE `Id` = ?";
					$this->GetCommentUser = $this->mysqli->prepare($this->GetCommentUserSql);
					$this->GetCommentUser->bind_param('i', $this->StatusId);
					$this->GetCommentUser->execute();
					$this->GetCommentUser->store_result();
					$this->GetCommentUser->bind_result($this->FromId, $this->ToId, $this->IsSelf);
					$this->GetCommentUser->fetch();
					if ($this->IsSelf == '1') {
						if ($this->UserId != $this->ToId) {
							$this->AddNotification($this->UserId, $this->ToId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> Have commented on your <a href="status?id='.$this->id.'">post</a>');
						}
					} else {
						if ($this->UserId == $this->FromId) {
							$this->AddNotification($this->UserId, $this->ToId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has commented on his own <a href="status?id='.$this->id.'">post</a> on your profile');
						} else if ($this->UserId == $this->ToId) {
							$this->AddNotification($this->UserId, $this->FromId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has commented  onyour <a href="status?id='.$this->id.'">post</a> on his profile');
						} else if ($this->UserId != $this->FromId && $this->UserId != $this->ToId) {
							$this->UserData = $this->UserInfo($this->FromId);
							$this->AddNotification($this->UserId, $this->FromId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has commented on your <a href="status?id='.$this->id.'">post</a>');
							$this->AddNotification($this->UserId, $this->ToId, '1', '<a href="./profile?id='.$_SESSION['UserId'].'">'.$_SESSION['NickName'].'</a> has commented on your '.$this->UserData.' <a href="status?id='.$this->id.'">post</a> on your profile');
						}
					}
					$this->OutPut = '<div class="StatusComment col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0"><img src="'.$this->GetProfilePicture($_SESSION['id']).'" class="StatusProfilePicture"><p class="lead">&nbsp;<a href="./profile?id='.trim($_SESSION['UserId']).'">'.trim($_SESSION['Nickname']).'</a><br><span>&nbsp;<abbr class="timeago" title="'.$this->date.'"></abbr></span></p><p>&nbsp;</p><p class="lead comment">'.$this->comment.'<a href="'.$this->PhotoLink.'" class="col-lg-12 col-md-12 col-sm-12 col-xs-12" target="_blank"><img src="'.$this->PhotoLink.'" alt="'.trim($_SESSION['NickName']).'" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 CommentUploadedImage"></a></p></div>';
					$this->OutArray['error'] = '2';
					$this->OutArray['StatusId'] = $this->StatusId;
					$this->OutArray['data'] = base64_encode($this->OutPut); 
					return json_encode($this->OutArray);
				}
			}
		}
	}

	/**
	 * get user information
	 * @param string $id 
	 * @return string
	 */
	public function UserInfo($id)
	{
		$this->Id = filter_var(trim($id), FILTER_VALIDATE_INT);
		$this->sql = "SELECT `UserId`, `NickName` From `users` WHERE `UserId` = ?";
		$this->GetData = $this->mysqli->prepare($this->sql);
		$this->GetData->bind_param('i', $this->Id);
		$this->GetData->execute();
		$this->GetData->bind_result($this->UserId, $this->NickName);
		$this->GetData->fetch();
		$this->output = '<a href="./profile?id='.$this->UserId.'">'.$this->NickName.'</a>';
		$this->GetData->close();
		return $this->output;
	}

	/**
	 * Add Notification to database
	 * @param int     $FromId  notification from user id
	 * @param int     $ToId    notification to user id
	 * @param int     $TypeId  type of the notification
	 * @param string  $Message notification message
	 */
	public function AddNotification($FromId, $ToId, $TypeId, $Message)
	{
		/**
		 * 1 - Like on post
		 * 2 - Post on your profile
		 * 3 - Comment on your post
		 * 4 - Add friend
		 * 5 - Accept friend
		 * 6 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 7 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 8 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 9 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 10 - Cancel request
		 * 11 - Remove friend
		 */
		$this->FromId = trim(filter_var($FromId, FILTER_VALIDATE_INT));
		$this->ToId = trim(filter_var($ToId, FILTER_VALIDATE_INT));
		$this->TypeId = trim(filter_var($TypeId, FILTER_VALIDATE_INT));
		$this->Message = trim($Message);
		$this->Date = date('Y-m-d H:i:s', time());
		$this->no = "no";
		$this->AddNotificationSQL = "INSERT INTO `notification` (`FromId`, `ToId`, `TypeId`, `Message`, `IsRead`, `Date`) VALUES (?, ?, ?, ?, ?, ?)";
		$this->AddNotification = $this->mysqli->prepare($this->AddNotificationSQL);
		$this->AddNotification->bind_param('ssssss', $this->FromId, $this->ToId, $this->TypeId, $this->Message, $this->no, $this->Date);
		$this->AddNotification->execute();
		$this->AddNotification->close();
	}

	/**
	 * Show Notification to user
	 * @param int $pages the number of the pages for pagination of notification
	 * @return string notification list of the user
	 */
	public function ShowNotification($pages = 1)
	{
		/**
		 * 1 - Like on post
		 * 2 - Post on your profile
		 * 3 - Comment on your post
		 * 4 - Add friend
		 * 5 - Accept friend
		 * 6 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 7 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 8 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 9 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 10 - Cancel request
		 * 11 - Remove friend
		 */
		$this->totalPages = 10;
		$this->pages = ($pages * $this->totalPages) - $this->totalPages;
		$this->number = $pages + 1;
		$this->UserId = trim($_SESSION['UserId']);
		$this->output = '';
		$this->inside = '';
		$this->TotalNotification = 0;
		$this->read = "no";
		$this->ShowNotificationSQL = "SELECT `FromId`, `ToId`, `TypeId`, `Message`, `IsRead`, `Date` FROM `notification` WHERE `ToId` = ? AND `IsRead` = ? AND `TypeId` IN (1,2,3) ORDER BY `Id` DESC";
		$this->ShowNotification = $this->mysqli->prepare($this->ShowNotificationSQL);
		$this->ShowNotification->bind_param('is', $this->UserId, $this->read);
		$this->ShowNotification->execute();
		$this->ShowNotification->store_result();
		if ($this->ShowNotification->num_rows > 0) {
			$this->ShowNotification->bind_result($this->FromId, $this->ToId, $this->TypeId, $this->Message, $this->IsRead, $this->Date);
			while ($this->ShowNotification->fetch()) {
				if ($this->IsRead == 'no') {
					$this->class = "NotRead";
					++$this->TotalNotification;
				} else {
					$this->class = "IsRead";
				}
				$this->inside .= '<li><span class="'.$this->class.'">'.$this->Message.'</span></li>';
				$this->inside .= '<li class="divider"></li>';
			}
			//$this->inside .= '<li><a class="" href="#" lastid="'.$this->number.'" loadtype="loadmorenotification">Show More</a></li>';
		} else {
			$this->inside .= '<li class="NotRead"><a class="NotRead" href="#">You have no notification</a></li>';
		}
		$this->ShowNotification->close();
		$this->output .= '<li class="notifications normal dropdown">';
		$this->output .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"><i class="entypo-globe"></i> <span class="badge badge-info">'.$this->TotalNotification.'</span></a>';
		$this->output .= '<ul class="dropdown-menu">';
		$this->output .= $this->inside;
		$this->output .= '</ul></li>';
		return $this->output;
	}
	public function ShowFriendNotification($pages = 1)
	{
		/**
		 * 1 - Like on post
		 * 2 - Post on your profile
		 * 3 - Comment on your post
		 * 4 - Add friend
		 * 5 - Accept friend
		 * 6 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 7 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 8 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 9 - [REMOVED FROM PREVIOS CODE. DO NOT USE]
		 * 10 - Cancel request
		 * 11 - Remove friend
		 */
		$this->totalPages = 10;
		$this->pages = ($pages * $this->totalPages) - $this->totalPages;
		$this->number = $pages + 1;
		$this->UserId = trim($_SESSION['UserId']);
		$this->output = '';
		$this->inside = '';
		$this->TotalNotification = 0;
		$this->read = "no";
		$this->ShowNotificationSQL = "SELECT `FromId`, `ToId`, `TypeId`, `Message`, `IsRead`, `Date` FROM `notification` WHERE `ToId` = ? AND `IsRead` = ? AND `TypeId` IN (4,5,10,11) ORDER BY `Id` DESC";
		$this->ShowNotification = $this->mysqli->prepare($this->ShowNotificationSQL);
		$this->ShowNotification->bind_param('is', $this->UserId, $this->read);
		$this->ShowNotification->execute();
		$this->ShowNotification->store_result();
		if ($this->ShowNotification->num_rows > 0) {
			$this->ShowNotification->bind_result($this->FromId, $this->ToId, $this->TypeId, $this->Message, $this->IsRead, $this->Date);
			while ($this->ShowNotification->fetch()) {
				if ($this->IsRead == 'no') {
					$this->class = "NotRead";
					++$this->TotalNotification;
				} else {
					$this->class = "IsRead";
				}
				$this->inside .= '<li><span class="'.$this->class.'">'.$this->Message.'</span></li>';
				$this->inside .= '<li class="divider"></li>';
			}
			//$this->inside .= '<li><a class="" href="#" lastid="'.$this->number.'" loadtype="loadmorenotification">Show More</a></li>';
		} else {
			$this->inside .= '<li><a class="NotRead" href="#">You have no notification</a></li>';
		}
		$this->ShowNotification->close();
		$this->output .= '<li class="notifications friend dropdown">';
		$this->output .= '<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"><i class="entypo-user-add"></i> <span class="badge badge-info">'.$this->TotalNotification.'</span></a>';
		$this->output .= '<ul class="dropdown-menu">';
		$this->output .= $this->inside;
		$this->output .= '</ul></li>';
		return $this->output;
	}

	/**
	 * Show Posts specially for each user itself alone
	 * @param string  $nick  the nickname of the user from the get parameter
	 * @param int     $pages the number of the pages used for pagination
	 */
	public function ShowUsersPosts($nick, $pages = 1)
	{
		$this->nick = trim($nick);
		$this->GetIDSql = "SELECT `ID` FROM `users` WHERE `UserId` = ?";
		$this->GetID = $this->mysqli->prepare($this->GetIDSql);
		$this->GetID->bind_param('s', $this->nick);
		$this->GetID->execute();
		$this->GetID->bind_result($this->UserId);
		$this->GetID->fetch();
		$this->UserId = trim($this->UserId);
		$this->GetID->close();
		$this->one = 1;
		$this->totalPages = 10;
		$this->pages = ($pages * $this->totalPages) - $this->totalPages;
		$this->GetStatusSql = "SELECT `Id`, `Status`, `FromId`, `ToId`, `IsSelf`, `HasPhoto`, `PhotoLink`, `Date`, `Active` FROM `status` WHERE `FromId` = ? OR `ToId` = ? AND `Active` = ? ORDER BY `Id` DESC LIMIT ? , ?";
		$this->GetStatus = $this->mysqli->prepare($this->GetStatusSql);
		$this->GetStatus->bind_param('iiiii', $this->UserId, $this->UserId, $this->one, $this->pages, $this->totalPages);
		$this->GetStatus->execute();
		$this->GetStatus->store_result();
		$this->OutPut = '';
		if ($this->GetStatus->num_rows > 0) {
			$this->GetStatus->bind_result($this->Id, $this->Status, $this->FromId, $this->ToId, $this->IsSelf, $this->HasPhoto, $this->PhotoLink, $this->Date, $this->Active);
			while ($this->GetStatus->fetch()) {
				$this->OutPut .= '<div class="StatusBox" StatusId='.$this->Id.'><div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><br></div>';
				if ($this->IsSelf == '1' && $this->FromId == $this->UserId && $this->ToId == $this->UserId) {
					$this->Data = $this->GetDetails($this->UserId);
					$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><img src="'.$this->Data['ProfilePicture'].'" class="StatusProfilePicture"><p class="lead">&nbsp;<a href="./profile?id='.$this->Data['UserId'].'">'.$this->Data['NickName'].'</a><br><span>&nbsp;<abbr class="timeago" title="'.$this->Date.'"></abbr></span></p></div>';
				} else {
					$this->FromIdDetails = $this->GetDetails($this->FromId);
					$this->ToIdDetails = $this->GetDetails($this->ToId);
					$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><img src="'.$this->FromIdDetails['ProfilePicture'].'" class="StatusProfilePicture"><p class="lead">&nbsp;<a href="./profile?id='.$this->FromIdDetails['UserId'].'">'.$this->FromIdDetails['NickName'].'</a>&nbsp;>&nbsp;<a href="./profile?id='.$this->ToIdDetails['UserId'].'">'.$this->ToIdDetails['NickName'].'</a><br><span>&nbsp;<abbr class="timeago" title="'.$this->Date.'"></abbr></span></p></div>';
				}
				$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><p class="lead StatusText col-lg-12 col-md-12 col-sm-12 col-xs-12">'.$this->Status.'</p></div>';
				if ($this->HasPhoto == '2') {
					$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><a href="'.$this->PhotoLink.'" target="_blank" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><img src="'.$this->PhotoLink.'" alt="'.$this->Data['NickName'].'" class="img img-thumbnail UploadedImage"></a></div>';
				}
				$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><span class="lc"><a href="#" class="like-unlike" csrf="'.Extras::token().'" StatusId="'.$this->Id.'" type="'.$this->HasLiked($this->Id).'"><i class="fa fa-thumbs-up"></i> Like</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="comment" value="'.$this->Id.'"><i class="fa fa-comment"></i> Comment</a></span></div>';
				$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"><div class="form-group"><form method="POST" action="" role="form" class="form StatusCommentForm" id="StatusCommentForm'.$this->Id.'" StatusId="'.$this->Id.'"><input type="hidden" name="csrf" value="'.Extras::token().'"><input type="hidden" name="StatusId" value="'.$this->Id.'"><input type="hidden" name="case" value="comment"><div class="col-lg-11 col-lg-offset-0 col-md-11 col-sm-offset-0 col-md-11 col-sm-offset-0 col-xs-10 col-xs-offset-0"><input type="text" class="form-control CommentInput" id="comment'.$this->Id.'" name="StatusComment"></div><label class="filebutton col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-5 col-sm-offset-0 col-xs-12 col-xs-offset-0"><span class="file"><input type="file" name="PostPicture" id="CommentImage" accept="image/*"></span></label></form></div></div>';
				$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 CommentError"></div>';
				$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 StatusCommentList'.$this->Id.'">'.$this->GetComments($this->Id).'</div></div>';
				$this->OutPut .= '<div class="seperator col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1"></div>';
			}
			$this->GetStatus->free_result();
			$this->OutPut .= '<div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1 loadbutton"><input type="button" loadtype="loadmoreprofile" lastid="'.($pages+1).'" csrf="'.Extras::token().'" value="Load More..." class="loadmore btn btn-primary"></div>';
			$this->GetStatus->close();
			return $this->OutPut;
		}
		$this->GetStatus->free_result();
		$this->GetStatus->close();
	}

	/**
	 * check if userid exists
	 * @param string $nick 
	 * @return true if exists / redirect is not
	 */
	public function UserExist($nick)
	{
		$this->nick = trim(htmlspecialchars($nick));
		$this->sql = 'SELECT `Id`, `UserId` FROM `users` WHERE `UserId` = ?';
		$this->CheckUser = $this->mysqli->prepare($this->sql);
		$this->CheckUser->bind_param('s', $this->nick);
		$this->CheckUser->execute();
		$this->CheckUser->store_result();
		$this->num_rows = $this->CheckUser->num_rows;
		$this->CheckUser->close();
		if ($this->num_rows == 0) {
			header('Location: ./UserNotExist');
			exit();
		} else {
			return true;
		}
	}

	/**
	 * Show background and profile picture of the user with full name
	 * @param int $id user id
	 * @return string background and profile picture
	 */
	public function ShowImages($id)
	{
		$this->UserId = strip_tags(htmlspecialchars(trim($id)));
		$this->sql = "SELECT `NickName`, `ProfilePicture` FROM `users` WHERE `UserId` = ?";
		$this->Data = $this->mysqli->prepare($this->sql);
		$this->Data->bind_param('s', $this->UserId);
		$this->Data->execute();
		$this->Data->store_result();
		if ($this->Data->num_rows > 0) {
			$this->Data->bind_result($this->NickName, $this->ProfilePicture);
			$this->Data->fetch();
			$data = '<div class="container-fluid"><div class="lt-profile"><img align="left" class="lt-image-lg" src="assets/img/BackgroundPicture.jpg" alt="'.$this->NickName.'">';
			if ($this->UserId == $_SESSION['UserId']) {
				$data .= '<div class="UpdateBackground"><input type="file" name="photo" accept="image/*"></div>';
			}
			$data .= '<img align="left" class="lt-image-profile thumbnail" src="'.$this->ProfilePicture.'" alt="'.$this->NickName.'"><div class="lt-profile-text"><h2>'.$this->NickName.'</h2></div></div></div>';
		return $data;
		} else {
			return '<div class="text-danger">Sorry That username does not exist</div>';
		}
	}

	/**
	 * Checks whether they are friend or now
	 * @param string $nick the nickname of the user to check
	 * @return string returns the input button that will be used for adding/accepting/canceling/removing friends
	 */
	public function CheckFriends($nick)
	{
		$this->ClearError();
		if (empty(trim($nick))) {
			$this->SetError('NickName canno\'t be empty');
		}
		if ($this->error = $this->GetError()) {
			return $this->error;
		} else {
			echo '<form method="post">';
			$this->FromNickNameSession = trim($_SESSION['NickName']);
			$this->FromIdSql = trim($_SESSION['UserId']);
			$this->ToIdSql = trim(htmlspecialchars($nick));
			$this->ToDetails = $this->GetDetailsFromUserId(trim(htmlspecialchars($this->ToIdSql)));
			$this->ToNickNameSession = $this->ToDetails['NickName'];
			if ($this->FromIdSql == $this->ToIdSql) {
				return false;
			} else {
				/**
				 *	FromIdAccepted - ToIdAccepted // 1 is accepted // 2 is still waiting
				 *	IsFriend // 1 is friend // 2 is still waiting
				 */
				$this->CheckFriendsSql = "SELECT `FromId`, `ToId`, `FromNickName`, `ToNickName`, `FromIdAccepted`, `ToIdAccepted`, `IsFriend` FROM `friends` WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
				$this->CheckFriends = $this->mysqli->prepare($this->CheckFriendsSql);
				$this->CheckFriends->bind_param('ssss', $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
				$this->CheckFriends->execute();
				$this->CheckFriends->store_result();
				if ($this->CheckFriends->num_rows == 0) {
					echo '<input type="submit" class="btn btn-primary AddFriend" name="AddFriend" value="Add Friend">';
				} else {
					$this->CheckFriends->bind_result($this->FromId, $this->ToId, $this->FromNickName, $this->ToNickName, $this->FromIdAccepted, $this->ToIdAccepted, $this->IsFriend);
					$this->CheckFriends->fetch();
					if ($this->IsFriend == '1') {
						echo '<input type="submit" class="btn btn-danger RemoveFriend" name="RemoveFriend" value="Remove Friend">';
					} else {
						if ($this->FromId == $_SESSION['UserId']) {
							echo '<input type="submit" class="btn btn-danger CancelRequest" name="CancelRequest" value="Cancel Request">';
						} else {
							echo '<input type="submit" class="btn btn-warning AcceptRequest" name="AcceptRequest" value="Accept Request">';
						}
					}
				}
			}
			echo '</form>';
		}
	}

	/**
	 * Adds a new friend
	 * @param string $nick the nickname of the user that will be added
	 * @return string/boolean return error if nick is not set and boolean in other cases
	 */
	public function AddFriend($nick)
	{
		$this->ClearError();
		if (empty(trim($nick))) {
			$this->SetError('NickName canno\'t be empty');
		}
		if ($this->error = $this->GetError()) {
			return $this->error;
		} else {
			$this->FromNickNameSession = trim($_SESSION['NickName']);
			$this->FromIdSql = trim($_SESSION['UserId']);
			$this->ToIdSql = trim(htmlspecialchars($nick));
			$this->ToDetails = $this->GetDetailsFromUserId(trim(htmlspecialchars($nick)));
			$this->ToNickNameSession = $this->ToDetails['NickName'];
			if ($this->FromIdSql == $this->ToIdSql) {
				return false;
			} else {
				/**
				 *	FromIdAccepted - ToIdAccepted // 1 is accepted // 2 is still waiting
				 *	IsFriend // 1 is friend // 2 is still waiting
				 */
				$this->CheckFriendsSql = "SELECT `FromId`, `ToId`, `FromNickName`, `ToNickName`, `FromIdAccepted`, `ToIdAccepted`, `IsFriend` FROM `friends` WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
				$this->CheckFriends = $this->mysqli->prepare($this->CheckFriendsSql);
				$this->CheckFriends->bind_param('ssss', $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
				$this->CheckFriends->execute();
				$this->CheckFriends->store_result();
				if ($this->CheckFriends->num_rows == 0) {
					// $this->GetIdSql = "SELECT `Id` FROM `users` WHERE `NickName` = ?";
					// $this->GetId = $this->mysqli->prepare($this->GetIdSql);
					// $this->GetId->bind_param('s', $this->ToNickNameSession);
					// $this->GetId->execute();
					// $this->GetId->bind_result($this->ToId);
					// $this->GetId->fetch();
					// $this->ToId = trim(filter_var($this->ToId, FILTER_VALIDATE_INT));
					// $this->GetId->close();
					$this->one = 1;
					$this->two = 2;
					$this->AddFriendSql = "INSERT INTO `friends` (`FromId`, `ToId`, `FromNickName`, `ToNickName`, `FromIdAccepted`, `ToIdAccepted`, `IsFriend`) VALUES (?, ?, ?, ?, ?, ?, ?)";
					$this->AddFriend = $this->mysqli->prepare($this->AddFriendSql);
					$this->AddFriend->bind_param('ssssiii', $this->FromIdSql, $this->ToIdSql, $this->FromNickNameSession, $this->ToNickNameSession, $this->one, $this->two, $this->two);
					$this->AddFriend->execute();
					print_r($this->mysqli->error);
					$this->AddFriend->close();
					$this->UserData = $this->UserInfo($this->FromIdSql);
					$this->AddNotification($this->FromIdSql, $this->ToIdSql, '4', $this->UserData.' Have sended you a friend request');
				} else {
					$this->CheckFriends->bind_result($this->FromId, $this->ToId, $this->FromNickName, $this->ToNickName, $this->FromIdAccepted, $this->ToIdAccepted, $this->IsFriend);
					$this->CheckFriends->fetch();
					if ($this->IsFriend == 1) {
						// already friend
					} else {
						// not friend
						if ($this->FromId == $this->FromIdSql) {
							// the session user is the friend requester
							if ($this->FromIdAccepted == 1 && $this->ToIdAccepted == 2) {
								// request already have been sent
							} else if ($this->FromIdAccepted == 2 && $this->ToIdAccepted == 1) {
								// the user have not accepted the request
								$this->one = 1;
								$this->AcceptRequestSql = "UPDATE `friends` SET `FromIdAccepted` = ?, `IsFriend` = ? WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
								$this->AcceptRequest = $this->mysqli->prepare($this->AcceptRequestSql);
								$this->AcceptRequest->bind_param('iissss', $this->one, $this->one, $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
								$this->AcceptRequest->execute();
								$this->AcceptRequest->close();
								$this->UserData = $this->UserInfo($this->FromId);
								$this->AddNotification($this->FromId, $this->ToId, '5', $this->UserData.' Have accepted your friend request');
							} else if ($this->FromIdAccepted == 2 && $this->ToIdAccepted == 2) {
								$this->one = 1;
								$this->two = 2;
								$this->AcceptRequestSql = "UPDATE `friends` SET `FromIdAccepted` = ?, `IsFriend` = ? WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
								$this->AcceptRequest = $this->mysqli->prepare($this->AcceptRequestSql);
								$this->AcceptRequest->bind_param('iissss', $this->one, $this->two, $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
								$this->AcceptRequest->execute();
								$this->AcceptRequest->close();
								$this->UserData = $this->UserInfo($this->FromIdSql);
								$this->AddNotification($this->FromIdSql, $this->ToIdSql, '4', $this->UserData.' Have sended you a friend request');
							}
						} else {
							if ($this->FromIdAccepted == 2 && $this->ToIdAccepted == 1) {
								// request already have been sent
							} else if ($this->FromIdAccepted == 1 && $this->ToIdAccepted == 2) {
								// the user have not accepted the request
								$this->one = 1;
								$this->AcceptRequestSql = "UPDATE `friends` SET `ToIdAccepted` = ?, `IsFriend` = ? WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
								$this->AcceptRequest = $this->mysqli->prepare($this->AcceptRequestSql);
								$this->AcceptRequest->bind_param('iissss', $this->one, $this->one, $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
								$this->AcceptRequest->execute();
								$this->AcceptRequest->close();
								$this->UserData = $this->UserInfo($this->ToIdSql);
								$this->AddNotification($this->ToIdSql, $this->FromIdSql, '5', $this->UserData.' Have accepted friend request');
							} else if ($this->FromIdAccepted == 2 && $this->ToIdAccepted == 2) {
								$this->one = 1;
								$this->two = 2;
								$this->AcceptRequestSql = "UPDATE `friends` SET `ToIdAccepted` = ?, `IsFriend` = ? WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
								$this->AcceptRequest = $this->mysqli->prepare($this->AcceptRequestSql);
								$this->AcceptRequest->bind_param('iissss', $this->one, $this->two, $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
								$this->AcceptRequest->execute();
								$this->AcceptRequest->close();
								$this->UserData = $this->UserInfo($this->ToIdSql);
								$this->AddNotification($this->ToIdSql, $this->FromIdSql, '4', $this->UserData.' Have sended you a friend request');
							}
						}
					}
					// echo 'You have already send a friend request';
				}
			}
		}
	}

	/**
	 * Cancels Friend request
	 * @param string $nick the nickname of the user that the request will be canceled
	 * @return string/boolean return error if nick is not set and boolean in other cases
	 */
	public function CancelRequest($nick)
	{
		$this->ClearError();
		if (empty(trim($nick))) {
			$this->SetError('NickName canno\'t be empty');
		}
		if ($this->error = $this->GetError()) {
			return $this->error;
		} else {
			$this->FromNickNameSession = trim($_SESSION['NickName']);
			$this->FromIdSql = trim($_SESSION['UserId']);
			$this->ToIdSql = trim(htmlspecialchars($nick));
			$this->ToDetails = $this->GetDetailsFromUserId(trim(htmlspecialchars($nick)));
			$this->ToNickNameSession = $this->ToDetails['NickName'];
			if ($this->FromIdSql == $this->ToIdSql) {
				return false;
			} else {
				/**
				 *	FromIdAccepted - ToIdAccepted // 1 is accepted // 2 is still waiting
				 *	IsFriend // 1 is friend // 2 is still waiting
				 */
				$this->CheckFriendsSql = "SELECT `Id` FROM `friends` WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
				$this->CheckFriends = $this->mysqli->prepare($this->CheckFriendsSql);
				$this->CheckFriends->bind_param('ssss', $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
				$this->CheckFriends->execute();
				$this->CheckFriends->store_result();
				if ($this->CheckFriends->num_rows == 1) {
					$this->CancelRequestSql = "DELETE FROM `friends` WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
					$this->CancelRequest = $this->mysqli->prepare($this->CancelRequestSql);
					$this->CancelRequest->bind_param('ssss', $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
					$this->CancelRequest->execute();
					$this->CancelRequest->close();
					$this->UserData = $this->UserInfo($this->FromIdSql);
					//$this->ToId = $this->UserId($this->ToIdSql);
					$this->AddNotification($this->FromIdSql, $this->ToIdSql, '10', $this->UserData.' Have canceled your request');
				} else {
				}
			}
		}
	}

	/**
	 * Accept a friend request
	 * @param string $nick the nickname of the user that the request will be accepted
	 * @return string/boolean return error if nick is not set and boolean in other cases
	 */
	public function AcceptRequest($nick)
	{
		$this->ClearError();
		if (empty(trim($nick))) {
			$this->SetError('NickName canno\'t be empty');
		}
		if ($this->error = $this->GetError()) {
			return $this->error;
		} else {
			$this->FromNickNameSession = trim($_SESSION['NickName']);
			$this->FromIdSql = trim($_SESSION['UserId']);
			$this->ToIdSql = trim(htmlspecialchars($nick));
			$this->ToDetails = $this->GetDetailsFromUserId(trim(htmlspecialchars($nick)));
			$this->ToNickNameSession = $this->ToDetails['NickName'];
			if ($this->FromIdSql == $this->ToIdSql) {
				return false;
			} else {
				/**
				 *	FromIdAccepted - ToIdAccepted // 1 is accepted // 2 is still waiting
				 *	IsFriend // 1 is friend // 2 is still waiting
				 */
				$this->CheckFriendsSql = "SELECT `Id` FROM `friends` WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
				$this->CheckFriends = $this->mysqli->prepare($this->CheckFriendsSql);
				$this->CheckFriends->bind_param('ssss', $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
				$this->CheckFriends->execute();
				$this->CheckFriends->store_result();
				if ($this->CheckFriends->num_rows == 1) {
					$this->one = 1;
					$this->AcceptRequestSql = "UPDATE `friends` SET `FromIdAccepted` = ?, `ToIdAccepted` = ?, `IsFriend` = ? WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
					$this->AcceptRequest = $this->mysqli->prepare($this->AcceptRequestSql);
					$this->AcceptRequest->bind_param('iiissss', $this->one, $this->one, $this->one, $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
					$this->AcceptRequest->execute();
					$this->AcceptRequest->store_result();
					$this->AcceptRequest->close();
					$this->UserData = $this->UserInfo($this->FromIdSql);
					//$this->ToId = $this->UserId($this->ToIdSql);
					$this->AddNotification($this->FromIdSql, $this->ToIdSql, '5', $this->UserData.' Have accepted your friend request');
				} else {
				}
			}
		}
	}

	/**
	 * Remove a friend from the list
	 * @param string $nick the nickname of the user that will be removed from friend list
	 * @return string/boolean return error if nick is not set and boolean in other cases
	 */
	public function RemoveFriend($nick)
	{
		$this->ClearError();
		if (empty(trim($nick))) {
			$this->SetError('NickName canno\'t be empty');
		}
		if ($this->error = $this->GetError()) {
			return $this->error;
		} else {
			$this->FromNickNameSession = trim($_SESSION['NickName']);
			$this->FromIdSql = trim($_SESSION['UserId']);
			$this->ToIdSql = trim(htmlspecialchars($nick));
			$this->ToDetails = $this->GetDetailsFromUserId(trim(htmlspecialchars($nick)));
			$this->ToNickNameSession = $this->ToDetails['NickName'];
			if ($this->FromIdSql == $this->ToIdSql) {
				return false;
			} else {
				/**
				 *	FromIdAccepted - ToIdAccepted // 1 is accepted // 2 is still waiting
				 *	IsFriend // 1 is friend // 2 is still waiting
				 */
				$this->CheckFriendsSql = "SELECT `Id` FROM `friends` WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
				$this->CheckFriends = $this->mysqli->prepare($this->CheckFriendsSql);
				$this->CheckFriends->bind_param('ssss', $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
				$this->CheckFriends->execute();
				$this->CheckFriends->store_result();
				if ($this->CheckFriends->num_rows == 1) {
					$this->RemoveFriendSql = "DELETE FROM `friends` WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?)";
					$this->RemoveFriend = $this->mysqli->prepare($this->RemoveFriendSql);
					$this->RemoveFriend->bind_param('ssss', $this->FromIdSql, $this->ToIdSql, $this->FromIdSql, $this->ToIdSql);
					$this->RemoveFriend->execute();
					$this->RemoveFriend->close();
					$this->UserData = $this->UserInfo($this->FromIdSql);
					//$this->ToId = $this->UserId($this->ToIdSql);
					$this->AddNotification($this->FromIdSql, $this->ToIdSql, '11', $this->UserData.' Have unfriended you');
				} else {
				}
			}
		}
	}

	/**
	 * lists the friends of the user
	 * @param string|bool $self 
	 * @param string|bool $UserId 
	 * @return string
	 */
	public function ListFriendsChat($self = false, $UserId = false)
	{
		$this->UserId =  $UserId ? $UserId : $_SESSION['UserId'];
		$this->one = 1;
		$this->return = '';
		$this->FriendsIdList = array();
		$this->FriendsNickNameList = array();
		$this->CheckFriendsSql = "SELECT `Id`, `FromId`, `ToId`, `FromNickName`, `ToNickName` FROM `friends` WHERE (`FromId` = ? OR `ToId` = ?) AND `IsFriend` = ? ORDER BY `Id` ASC";
		$this->CheckFriends = $this->mysqli->prepare($this->CheckFriendsSql);
		$this->CheckFriends->bind_param('ssi', $this->UserId, $this->UserId, $this->one);
		$this->CheckFriends->execute();
		$this->CheckFriends->store_result();
		if ($this->CheckFriends->num_rows == 0) {
			$this->return = '<strong>Sorry, but you have no friend</strong>';
		} else {
			$this->CheckFriends->bind_result($this->Id, $this->FromId, $this->ToId, $this->FromNickName, $this->ToNickName);
			while ($this->CheckFriends->fetch()) {
				if ($this->FromId == $this->UserId) {
					$this->FriendsIdList[] = $this->ToId;
					$this->FriendsNickNameList[] = $this->ToNickName;
				} else {
					$this->FriendsIdList[] = $this->FromId;
					$this->FriendsNickNameList[] = $this->FromNickName;
				}
			}
			$this->return = '<strong>Friends</strong>';
			for ($i=0; $i < count($this->FriendsIdList); $i++) {
				$this->statusCheck = $this->IsOnline($this->FriendsIdList[$i]);
				if ($this->statusCheck == true) {
					$this->status = 'is-online';
				} else {
					$this->status = 'is-offline';
				}
				$this->return .= '<a href="#" id="'.$this->FriendsIdList[$i].'" data-conversation-history="#chat_'.$this->FriendsIdList[$i].'"><span class="user-status '.$this->status.'"></span> <em>'.$this->FriendsNickNameList[$i].'</em></a>';
			}
		}
		$this->CheckFriends->free_result();
		$this->CheckFriends->close();
		if ($self) {
			if (is_array($this->FriendsIdList)) {
				return serialize($this->FriendsIdList);
			} else {
				return serialize([]);
			}
		} else {
			return $this->return;
		}
	}

	/**
	 * get websocket id for 
	 * @param type|array $friends 
	 * @return type
	 */
	public function GetFriendsClientId($friends = [])
	{
		$this->Friends = $friends;
		$this->FriendsClientId = [];
		$this->FriendsList = '';
		$this->one = 1;
		foreach ($this->Friends as $this->key => $this->value) {
			$this->FriendsList .= "'".$this->mysqli->real_escape_string($this->value)."',";
		}
		$this->FriendsList = rtrim($this->FriendsList, ',');
		$this->FriendsSql = "SELECT `ClientId` FROM `websocketclient` WHERE `UserId` IN (".$this->FriendsList.") WHERE `IsFriend` = ".$this->one;
		$this->FriendsData = $this->mysqli->query($this->FriendsSql);
		if (is_object($this->FriendsData)) {
			if ($this->FriendsData->num_rows > 0) {
				while ($this->ClientId = $this->FriendsData->fetch_array()) {
					$this->FriendsClientId[] = $this->ClientId['ClientId'];
				}
			}
		}
		return $this->FriendsClientId;
	}

	/**
	 * List the entire messages that the $this->UserIdData has sent and received
	 * change $this->limit to get more messages
	 * @return string
	 */
	public function ListChat()
	{
		$this->UserIdData = $_SESSION['UserId'];
		$this->NickName = $_SESSION['NickName'];
		$this->limit = 1500;
		$this->FriendsList = unserialize($this->ListFriendsChat(true));
		$this->return = '';
		foreach ($this->FriendsList as $this->key => $this->value) {
			$this->ChatSql = "SELECT `FromId`, `ToId`, `Chat`, `FromisRead`, `ToisRead`, `date` FROM `chat` WHERE `FromId` IN (?, ?) AND `ToId` IN (?, ?) ORDER BY `Id` ASC LIMIT ?";
			$this->ChatQuery = $this->mysqli->prepare($this->ChatSql);
			$this->ChatQuery->bind_param('ssssi', $this->UserIdData, $this->value, $this->UserIdData, $this->value, $this->limit);
			$this->ChatQuery->execute();
			$this->ChatQuery->store_result();
			if ($this->ChatQuery->num_rows == 0) {
				// no data
			} else {
				$this->ChatQuery->bind_result($this->FromId, $this->ToId, $this->Chat, $this->FromisRead, $this->ToisRead, $this->date);
				$this->return .= '<div class="chat-history" id="chat_'.$this->value.'">';
				while ($this->ChatQuery->fetch()) {
					$this->return .= '<li class="';
					if ($this->UserIdData == $this->FromId) {
						$this->return .= 'user';
					} else if ($this->UserIdData == $this->ToId) {
						$this->return .= 'opponent';
					}
					if ($this->UserIdData == $this->ToId && $this->ToisRead == 2) {
						$this->return .= ' unread';
					}
					$this->return .= '"><span class="user">'.$this->FromId.'</span><p>'.$this->Chat.'</p><span class="time">'.$this->date.'</span></li>';
				}
				$this->return .= '</div>';
			}
		}
		return $this->return;
	}

	/**
	 * each users has a unique salt as uid which is used to get the user detail of that user
	 * @param string $Salt 
	 * @return array if found (99.8% of the cases). false if not found
	 */
	public function GetUserDetailsWS($Salt)
	{
		$this->Salt = trim($Salt);
		$this->GetDetailsSql = "SELECT `UserId`, `NickName`, `ProfilePicture` FROM `users` WHERE `Salt` = ?";
		$this->GetDetails = $this->mysqli->prepare($this->GetDetailsSql);
		$this->GetDetails->bind_param('s', $this->Salt);
		$this->GetDetails->execute();
		$this->GetDetails->store_result();
		if ($this->GetDetails->num_rows == 1) {
			$this->GetDetails->bind_result($this->UserId, $this->NickName, $this->ProfilePicture);
			$this->GetDetails->fetch();
			$this->GetDetails->free_result();
			$this->GetDetails->close();
			return ['UserId' => $this->UserId, 'NickName' => $this->NickName, 'ProfilePicture' => $this->ProfilePicture];
		} else {
			$this->GetDetails->close();
			return false;
		}
	}

	/**
	 * check if $FromId and $ToId are friend before sending any message
	 * @param string $FromId 
	 * @param string $ToId 
	 * @return boolean
	 */
	public function CheckFriendsChat($FromId, $ToId)
	{
		$this->FromId = trim($FromId);
		$this->ToId = trim($ToId);
		$this->one = 1;
		$this->CheckFriendsChatSql = "SELECT `Id` FROM `friends` WHERE `FromId` IN (?, ?)  AND `ToId` IN (?, ?) AND `IsFriend` = ?";
		$this->CheckFriendsChat = $this->mysqli->prepare($this->CheckFriendsChatSql);
		$this->CheckFriendsChat->bind_param('ssssi', $this->FromId, $this->ToId, $this->FromId, $this->ToId, $this->one);
		$this->CheckFriendsChat->execute();
		$this->CheckFriendsChat->store_result();
		$this->num_rows = $this->CheckFriendsChat->num_rows;
		$this->CheckFriendsChat->free_result();
		$this->CheckFriendsChat->close();
		if ($this->num_rows == 1) {
			return true;
		} else{
			return false;
		}
	}

	/**
	 * add the users websocket client id in the database
	 * @param string $UserId 
	 * @param string $Ip 
	 * @param int $ClientId 
	 */
	public function AddWebSocketClient($UserId, $Ip, $ClientId)
	{
		$this->UserId = trim(htmlspecialchars($UserId));
		$this->Ip = filter_var($Ip, FILTER_VALIDATE_IP);
		$this->ClientId = filter_var($ClientId, FILTER_VALIDATE_INT);
		$this->InsertClientSql = "INSERT INTO `websocketclient` (`UserId`, `Ip`, `ClientId`) VALUES (?,?,?)";
		$this->InsertClient = $this->mysqli->prepare($this->InsertClientSql);
		$this->InsertClient->bind_param('ssi', $this->UserId, $this->Ip, $this->ClientId);
		$this->InsertClient->execute();
		$this->InsertClient->close();
	}

	/**
	 * remove the websocket client id that has been added
	 * @param int $ClientId
	 */
	public function RemoveWebSocketClient($ClientId)
	{
		$this->ClientId = filter_var($ClientId, FILTER_VALIDATE_INT);
		$this->InsertClientSql = "DELETE FROM `websocketclient` WHERE `ClientId` = ?";
		$this->InsertClient = $this->mysqli->prepare($this->InsertClientSql);
		$this->InsertClient->bind_param('i', $this->ClientId);
		$this->InsertClient->execute();
		$this->InsertClient->close();
	}

	/**
	 * insert the $Chat that $FromId has sent to $ToId
	 * @param string $FromId 
	 * @param string $ToId 
	 * @param string $Chat 
	 * @param string $Ip 
	 * @param int $ClientId 
	 * @return array
	 * @return checks if $ToId is online and grabs all the websocket client id of the $ToId including
	 *         the user id of the sender $FromId and does not include the same client id of the browser
	 *         that the chat is being sent from which is $ClientId
	 */
	public function InsertChat($FromId, $ToId, $Chat, $Ip, $ClientId)
	{
		$this->FromId = trim(htmlspecialchars($FromId));
		$this->Ip = filter_var($Ip, FILTER_VALIDATE_IP);
		$this->ClientId = filter_var($ClientId, FILTER_VALIDATE_INT);
		$this->ToId = trim(htmlspecialchars($ToId));
		$this->Chat = trim(nl2br(htmlspecialchars($Chat)));
		$this->IsRead = 2;
		$this->Date = date('Y-m-d H:i:s', time());

		$this->InsertChatSql = "INSERT INTO `chat` (`FromId`, `ToId`, `Chat`, `FromisRead`, `ToisRead`, `date`) VALUES (?, ?, ?, ?, ?, ?)";
		$this->InsertChat = $this->mysqli->prepare($this->InsertChatSql);
		$this->InsertChat->bind_param('sssiis', $this->FromId, $this->ToId, $this->Chat, $this->IsRead, $this->IsRead, $this->Date);
		$this->InsertChat->execute();
		$this->InsertChat->close();
		
		$this->GetFriendsIdSql = "SELECT `UserId`, `Ip`, `ClientId` FROM `websocketclient` WHERE `UserId` = ? OR `UserId` = ?";
		$this->GetFriendsId = $this->mysqli->prepare($this->GetFriendsIdSql);
		$this->GetFriendsId->bind_param('ss', $this->FromId, $this->ToId);
		$this->GetFriendsId->execute();
		$this->GetFriendsId->store_result();
		$this->GetFriendsId->bind_result($this->FUserId, $this->FIp, $this->FClientId);
		$this->FriendsList = array();
		while ($this->GetFriendsId->fetch()) {
			if ($this->FClientId != $this->ClientId) {
				$this->FriendsList[] = [$this->FUserId,$this->FClientId];
			}
		}
		return serialize($this->FriendsList);
	}

	/**
	 * checks if the chat has been read
	 * @param string $FromId 
	 * @param string $ToId 
	 * @param int $Who
	 */
	public function IsReadChat($FromId, $ToId, $Who)
	{
		$this->FromId = $FromId;
		$this->ToId = $ToId;
		$this->IsRead = 1;
		$this->Who = $Who;
		if ($this->Who == 1) {
			$this->ReadSql = "UPDATE `chat` SET `FromisRead` = ? WHERE `FromId` = ?, `ToId` = ?";
		} else {
			$this->ReadSql = "UPDATE `chat` SET `ToisRead` = ? WHERE `FromId` = ?, `ToId` = ?";
		}
		$this->Read = $this->mysqli->prepare($this->ReadSql);
		$this->Read->bind_param('iss', $this->IsRead, $this->FromId, $this->ToId);
		$this->Read->execute();
		$this->Read->close();
	}

	/**
	 * Check if the $UserId is online
	 * @param string $UserId 
	 * @return boolean
	 */
	public function IsOnline($UserId)
	{
		$this->UserId = trim($UserId);
		$this->IsOnlineSql = "SELECT `ClientId` FROM `websocketclient` WHERE `UserId` = ?";
		$this->IsOnline = $this->mysqli->prepare($this->IsOnlineSql);
		$this->IsOnline->bind_param('s', $this->UserId);
		$this->IsOnline->execute();
		$this->IsOnline->store_result();
		$this->num_rows = $this->IsOnline->num_rows;
		$this->IsOnline->free_result();
		$this->IsOnline->close();
		if ($this->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function __destruct()
	{
		parent::__destruct();
	}
}

/**
 * add the code below for user info grabbing functions to cache the data and reduce database load
 *" . MYSQLND_QC_ENABLE_SWITCH . "
 */

?>