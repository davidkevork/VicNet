$(document).ready(function() {
	function getIPs(callback){
		var ip_dups = {};
		var RTCPeerConnection = window.RTCPeerConnection
			|| window.mozRTCPeerConnection
			|| window.webkitRTCPeerConnection;
		var useWebKit = !!window.webkitRTCPeerConnection;
		if(!RTCPeerConnection){
			var win = iframe.contentWindow;
			RTCPeerConnection = win.RTCPeerConnection
				|| win.mozRTCPeerConnection
				|| win.webkitRTCPeerConnection;
			useWebKit = !!win.webkitRTCPeerConnection;
		}
		var mediaConstraints = {
			optional: [{RtpDataChannels: true}]
		};
		var servers = {iceServers: [{urls: "stun:stun.services.mozilla.com"}]};
		var pc = new RTCPeerConnection(servers, mediaConstraints);
		function handleCandidate(candidate){
			var ip_regex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/
			var ip_addr = ip_regex.exec(candidate)[1];
			if(ip_dups[ip_addr] === undefined)
				callback(ip_addr);
			ip_dups[ip_addr] = true;
		}
		pc.onicecandidate = function(ice){
			if(ice.candidate)
				handleCandidate(ice.candidate.candidate);
		};
		pc.createDataChannel("");
		pc.createOffer(function(result){
			pc.setLocalDescription(result, function(){}, function(){});
		}, function(){});
		setTimeout(function(){
			var lines = pc.localDescription.sdp.split('\n');
			lines.forEach(function(line){
				if(line.indexOf('a=candidate:') === 0)
					handleCandidate(line);
			});
		}, 1000);
	}
	function redirect (url) {
		var ua = navigator.userAgent.toLowerCase(),
			isIE = ua.indexOf('msie') !== -1,
			version = parseInt(ua.substr(4, 2), 10);
		if (isIE && version < 9) {
			var link = document.createElement('a');
			link.href = url;
			document.body.appendChild(link);
			link.click();
		}
		else { 
			window.location.href = url; 
		}
	}
	$("#login-form-link").click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$("#register-form-link").removeClass("active");
		$(this).addClass("active");
		e.preventDefault();
	});
	$("#register-form-link").click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$("#login-form-link").removeClass("active");
		$(this).addClass("active");
		e.preventDefault();
	});
	uid = language = display = core = timezone = db = cpuclass = lie = touch = '';
	var fp = new Fingerprint2();
	fp.get(function(result) {
		window.uid = result;
	});
	$.cookie('uid', uid, { expires : 30 });
	fp.get(function(result, components) {
		for (var index in components) {
			var obj = components[index];
			var value = obj.value;
			switch (obj.key) {
				case 'language':
					window.language = value.toString();
					break;
				case 'color_depth':
					window.display = window.display+'|'+'color_depth:'+value.toString()+'|';
					break;
				case 'pixel_ratio':
					window.display = window.display+'|'+'pixel_ratio:'+value.toString()+'|';
					break;
				case 'hardware_concurrency':
					window.core = value.toString();
					break;
				case 'resolution':
					window.display = window.display+'|'+'resolution:'+value.toString()+'|';
					break;
				case 'available_resolution':
					window.display = window.display+'|'+'available_resolution'+value.toString()+'|';
					break;
				case 'timezone_offset':
					window.timezone = value.toString();
					break;
				case 'session_storage':
					window.db = window.db+'|'+'session_storage:'+value.toString()+'|';
					break;
				case 'local_storage':
					window.db = window.db+'|'+'local_storage'+value.toString()+'|';
					break;
				case 'indexed_db':
					window.db = window.db+'|'+'indexed_db'+value.toString()+'|';
					break;
				case 'open_database':
					window.db = window.db+'|'+'open_database'+value.toString()+'|';
					break;
				case 'cpu_class':
					window.cpuclass = value.toString();
					break;
				case 'has_lied_languages':
					window.lie = window.lie+'|'+'has_lied_languages'+value.toString()+'|';
					break;
				case 'has_lied_resolution':
					window.lie = window.lie+'|'+'has_lied_resolution'+value.toString()+'|';
					break;
				case 'has_lied_os':
					window.lie = window.lie+'|'+'has_lied_os'+value.toString()+'|';
					break;
				case 'has_lied_browser':
					window.lie = window.lie+'|'+'has_lied_browser'+value.toString()+'|';
					break;
				case 'touch_support':
					window.touch = value.toString();
					break;
			}
		}
	});
	$("#LoginSubmit").click(function(e) {
		getIPs(function(ip){ $("#ipAddress").val(ip); });
		var ipAddress = $.trim($("#ipAddress").val());
		var LoginCompassId = $.trim($("#LoginCompassId").val());
		var LoginPasswordValue = $.trim($("#LoginPassword").val());
		var LoginAttemptData = 'CompassId='+LoginCompassId+'&Password='+LoginPasswordValue+'&Type=LoginAttempt&Ip='+ipAddress+'&Fingerprint='+uid+'&Display='+display+'&Language='+language+'&TimeZone='+timezone+'&Touch='+touch+'&CpuCore='+core+'&CpuClass='+cpuclass+'&Lie='+lie+'&DB='+db;
		if (LoginCompassId.length == 0 || LoginPasswordValue.length == 0) {
			$.ajax({url: './ajax.php',type: 'POST',datatype: 'html',data: LoginAttemptData});
			$("#LoginError").text("Nick name or Password canno't be empty.");
			$("#LoginErrorDiv").fadeIn(100);
		} else if (LoginPasswordValue.length < 5 || LoginPasswordValue.length > 30) {
			$.ajax({url: './ajax.php',type: 'POST',datatype: 'html',data: LoginAttemptData});
			$("#LoginError").text("Password lenght must be between 5 and 30 character.");
			$("#LoginErrorDiv").fadeIn(100);
		} else {
			$("#LoginErrorDiv").fadeOut(100);
			var LoginData = 'CompassId='+LoginCompassId+'&Password='+LoginPasswordValue+'&Type=Login&Ip='+ipAddress+'&Fingerprint='+uid+'&Display='+display+'&Language='+language+'&TimeZone='+timezone+'&Touch='+touch+'&CpuCore='+core+'&CpuClass='+cpuclass+'&Lie='+lie+'&DB='+db;
			$.ajax({
				url: './ajax.php',
				type: 'POST',
				datatype: 'html',
				data: LoginData,
			}).done(function(LoginRsp) {
				if (LoginRsp == "Correct Username and Password"){
					redirect('./home');
					$("#LoginError").text('If you did not get redirect, please reload the page');
					$("#LoginErrorDiv").fadeIn(100);
				} else {
					$("#LoginError").text(LoginRsp);
					$("#LoginErrorDiv").fadeIn(100);
				}
			});
		}
		e.preventDefault();
	});
	$("#RegisterSubmit").click(function(e) {
		getIPs(function(ip){ $("#ipAddress").val(ip); });
		var ipAddress = $.trim($("#ipAddress").val());
		var RegisterCompassIdValue = $.trim($("#RegisterCompassId").val());
		var RegisterNicknameValue = $.trim($("#RegisterNickname").val());
		var RegisterCompassPasswordValue = $.trim($("#RegisterCompassPassword").val());
		var RegisterPasswordValue = $.trim($("#RegisterPassword").val());
		var RegisterConfirmPasswordValue = $.trim($("#RegisterConfirmPassword").val());
		var ReigsterTermCheckBox = $("#ReigsterTerm").prop('checked');
		var RegisterAttemptData = 'CompassId='+RegisterCompassIdValue+'&Nickname='+RegisterNicknameValue+'&CompassPassword='+RegisterCompassPasswordValue+'&Password='+RegisterPasswordValue+'&ConfirmPassword='+RegisterConfirmPasswordValue+'&Type=RegisterAttempt&Ip='+ipAddress+'&Fingerprint='+uid+'&Display='+display+'&Language='+language+'&TimeZone='+timezone+'&Touch='+touch+'&CpuCore='+core+'&CpuClass='+cpuclass+'&Lie='+lie+'&DB='+db;
		if (RegisterCompassIdValue.length == 0 || RegisterNicknameValue.length == 0 || RegisterCompassPasswordValue.length == 0 || RegisterPasswordValue.length == 0 || RegisterConfirmPasswordValue.length == 0) {
			$("#RegisterError").text("Compass Id, Nickname, Compass Password, Chat Room Password or Confirm Password canno't be empty.");
			$("#RegisterErrorDiv").fadeIn(100);
		} else if (RegisterCompassPasswordValue.length < 5 || RegisterPasswordValue.length < 5 || RegisterConfirmPasswordValue.length < 5 || RegisterCompassPasswordValue.length > 30|| RegisterPasswordValue.length > 30 || RegisterConfirmPasswordValue.length > 30) {
			$("#RegisterError").text("Password lenght must be between 5 to 30 characters.");
			$("#RegisterErrorDiv").fadeIn(100);
		} else if (RegisterPasswordValue != RegisterConfirmPasswordValue) {
			$("#RegisterError").text("Chat Room Password and Confirm Password must be the same.");
			$("#RegisterErrorDiv").fadeIn(100);
		} else if (ReigsterTermCheckBox == false) {
			$("#RegisterError").text("You have to agree to our Term of Use.");
			$("#RegisterErrorDiv").fadeIn(100);
		} else {
			$("#RegisterErrorDiv").fadeOut(100);
			var RegisterData = 'CompassId='+RegisterCompassIdValue+'&Nickname='+RegisterNicknameValue+'&CompassPassword='+RegisterCompassPasswordValue+'&Password='+RegisterPasswordValue+'&ConfirmPassword='+RegisterConfirmPasswordValue+'&Type=Register&Ip='+ipAddress+'&Fingerprint='+uid+'&Display='+display+'&Language='+language+'&TimeZone='+timezone+'&Touch='+touch+'&CpuCore='+core+'&CpuClass='+cpuclass+'&Lie='+lie+'&DB='+db;
			$.ajax({
				url: './ajax.php',
				type: 'POST',
				datatype: 'html',
				data: RegisterData,
			}).done(function(RegisterRsp) {
				$("#RegisterError").text(RegisterRsp);
				$("#RegisterErrorDiv").fadeIn(100);
			});
		}
		e.preventDefault();
	});
	particlesJS.load('particles-js', './assets/js/particle.json', function() {
		console.log('callback - particles.js config loaded');
	});
});