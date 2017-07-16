$(document).ready(function() {
	$('.normal').click(function() {
		$('.normal').toggleClass('open');
		$('.profile-info').removeClass('open');
		$('.friend').removeClass('open');
	});
	$('.friend').click(function() {
		$('.friend').toggleClass('open');
		$('.profile-info').removeClass('open');
		$('.normal').removeClass('open');
	});
	$('.profile-info').click(function() {
		$('.normal').removeClass('open');
		$('.friend').removeClass('open');
	});
	function redirect (url) {
		var ua = navigator.userAgent.toLowerCase(),
			isIE = ua.indexOf('msie') !== -1,
			version = parseInt(ua.substr(4, 2), 10);
		// Internet Explorer 8 and lower
		if (isIE && version < 9) {
			var link = document.createElement('a');
			link.href = url;
			document.body.appendChild(link);
			link.click();
		}
		// All other browsers can use the standard window.location.href (they don't lose HTTP_REFERER like Internet Explorer 8 & lower does)
		else { 
			window.location.href = url; 
		}
	}
	function readURL(input, id) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$(id).html('<img src="'+e.target.result+'" width="200px" height="200px" class="img img-thumbnail">');
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
	$(function() {
		$("#StatusImage").change(function(a) {
			a.preventDefault();
			var file = this.files[0];
			var imagefile = file.type;
			var match= ['image/jpeg','image/gif','image/png'];
			if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]))) {
				$("#StatusError").html('Please select an image. Allowed Extensions: jpeg, gif, png.');
			} else {
				readURL(this, '#StatusError');
			}
		});
		$("#CommentImage").change(function(a) {
			a.preventDefault();
			var file = this.files[0];
			var imagefile = file.type;
			var match= ['image/jpeg','image/gif','image/png'];
			if (!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]))) {
				$(".CommentError").html('Please select an image. Allowed Extensions: jpeg, gif, png.');
			} else {
				readURL(this, ".CommentError");
			}
		});
	});
	$("input.StatusButton").click(function(a) {
		a.preventDefault();
		var data = $("form#Status").serialize();
		$("#StatusError").html('<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>');
		var form_data = $("#Status");
		var str = new FormData(form_data[0]);
		$.ajax({
			url: "./ajax.php",
			type: "POST",
			data: str,
			contentType: false,
			cache: false,
			processData: false,
		}).done(function(resp) {
			var output = JSON.parse(resp);
			$(".append").prepend(output);
			if (output.error == "1") {
				$("#StatusError").html(atob(output.data));
			} else if (output.error == "2") {
				$("#StatusError").html('');
				$("#StatusImage").val('')
				$(".StatusTextArea").val('');
				$(".append").prepend(atob(output.data));
				$("abbr.timeago").timeago();
				var loadid = $('.loadmore').attr('lastid');
				$('.loadmore').attr('lastid', ((loadid * 10)+1)/10);
			} else {
				$("#StatusError").html('Sorry an error have occured while uploading your image.');
			}
		});
	});
	$(document).on('click', '.like-unlike', function(a) {
		a.preventDefault();
		var type = $(this).attr('type');
		var id = $(this).attr('StatusId');
		var csrf = $(this).attr('csrf');
		if (type === 'like') {
			var data = 'StatusId='+id+'&case='+type+'&csrf='+csrf+'&Type=like-unlike';
			$.ajax({
				url: './ajax.php',
				type: 'POST',
				dataType: 'html',
				data: data,
				cache: false,
			});
			$(this).css('color', '#2196f3');
			$(this).attr('type', 'unlike');
		} else if (type === 'unlike') {
			var data = 'StatusId='+id+'&case='+type+'&csrf='+csrf+'&Type=like-unlike';
			$.ajax({
				url: './ajax.php',
				type: 'POST',
				dataType: 'html',
				data: data,
				cache: false,
			});
			$(this).css('color', '#000000');
			$(this).attr('type', 'like');
		}
	});
	$("li.profile-info > a.dropdown-toggle").click(function(e) {
		$("li.profile-info").toggleClass("open");
		e.preventDefault();
	});
	$("li.profile-info > ul.dropdown-menu").click(function(e) {
		$("li.profile-info").removeClass("open");
	});
	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;
		for (i = 0; i < sURLVariables.length; i++) {
			sParameterName = sURLVariables[i].split('=');
			if (sParameterName[0] === sParam) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};
	$(function() {
		$("#search").autocomplete({
			source: function(request, response) {
				var data = 'Type=searchname&csrf='+$('.csrf').val()+'&name='+$('#search').val();
				$.ajax({
					url: './ajax.php',
					data: data,
					cache: 'false',
				 	type: 'POST',
					dataType: 'json',
					success: function(res) {
						response(res);
					},
					error: function() {
						response('{ "Error": "<div class="text-danger">Sorry, An error have been occured</div>"}');
					}
				});
			},
			minLength: 1,
			select: function(event, ui) {
				$('#UserId').val(ui.item.value);
				redirect("./profile?id="+ui.item.value);
			},
			html: true,
			open: function() {
				$(this).removeClass("ui-corner-all").addClass("ui-corner-top");
			},
			close: function() {
				$(this).removeClass("ui-corner-top").addClass("ui-corner-all");
			},
		}).autocomplete("instance")._renderItem = function(ul, item) {
			if (typeof(item.label) != "undefined" && item.label !== null) {
				return $('<li>').append('<a href="./profile?id='+item.value+'"><img src="'+item.picture+'" alt="'+item.label+'" width="40px" height="40px">'+item.label+'</a>').appendTo(ul);
			} else {
				return $('<li>').append('<div class="text-danger">'+item.Error+'</div>').appendTo(ul);
			}
		};
	});
});