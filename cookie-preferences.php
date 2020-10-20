<?php 

	
	if (isset($_COOKIE["RegSolCookiePreferences"]) && !isset($_REQUEST['changeCookiePreferences'])) {
		//DO NOTHING
	} else {
 ?>

<div class="wrapper">
	<!-- Sidebar -->
	<div id="sidebar">
		<div class="sidebar-header">
			<h3>Bootstrap Sidebar</h3>
		</div>
		<br><br>
		<h1>Our use of cookies</h1>
			
		We use necessary cookies to make our site work. We'd also like to set optional analytics cookies to help us improve it. We won't set optional cookies unless you enable them. Using this tool will set a cookie on your device to remember your preferences.

		For more detailed information about the cookies we use, see our <a href="about.php#privacy" target="_new">privacy policy</a>			
		<br><br>
		<div style="text-align: center;">
		<button type="button" id="AcceptAllCookies" class="btn btn-info">
			<i class="fas fa-align-left"></i>
			<span>Accept All</span>
		</button>
					
		<button type="button" id="RejectUnnecessaryCookies" class="btn btn-info">
			<i class="fas fa-align-left"></i>
			<span>Reject Unnecessary</span>
		</button>
		</div>
		<hr>			
		
		<b>Necessary cookies</b><br>
		Necessary cookies enable core functionality such as security, network management, and accessibility. You may disable these by changing your browser settings, but this may affect how the website functions.
		<hr>
		<b>Analytics </b>
		<label class="switch">				
			<input id="analyticsToggle" type="checkbox">
			<span class="slider round"></span>
		</label>
		<br>
		We'd like to set Google Analytics cookies to help us to improve our website by collecting and reporting information on how you use it. The cookies collect information in a way that does not directly identify anyone. 
		<hr>
		<b>Twitter feed </b>
		<label class="switch">				
			<input id="twitterToggle" type="checkbox">
			<span class="slider round"></span>
		</label>
		<br>
		In order to display our tweets, Twitter uses cookies to remember things such as which links you clicked, etc. This does not use your Twitter ID.
		<hr>
		<div style="text-align: center;">
			<button type="button" id="SavePreferencesCookies" class="btn btn-info">
				<i class="fas fa-align-left"></i>
				<span>Save Preferences</span>
			</button>
		</div>
	</div>
	<!-- Dark Overlay element -->
	<div id="overlay" class="overlay active"></div>
</div>


<script type="text/javascript">
	function setCookie(cname, cvalue, exdays) {
		var d = new Date();
		d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
		var expires = "expires="+d.toUTCString();
		document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	}

	function getCookie(cname) {
		var name = cname + "=";
		var ca = document.cookie.split(';');
		for(var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
			  c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
			  return c.substring(name.length, c.length);
			}
		}
		return "";
	}
	
	//Set toggles to cookie values
	
	//Hide cookie prefs while we set it up			
	$('#sidebar').toggleClass('active');
	$('#overlay').toggleClass('active');					
	//Check if RegSolCookiePreferences cookie is already set, then set checkboxes to cookie values
	var cookiePrefsIndex = document.cookie.indexOf('RegSolCookiePreferences=');
	var analyticsCookieIndex = document.cookie.indexOf('RegSolAnalyticsAllow=');
	var twitterCookieIndex = document.cookie.indexOf('RegSolTwitterAllow=');
	
	if (cookiePrefsIndex != -1) {
		if (analyticsCookieIndex != -1) {
			if (getCookie('RegSolAnalyticsAllow') == 'true') {
				document.getElementById("analyticsToggle").checked = true;
			}
		}
		if (twitterCookieIndex != -1) {		
			if (getCookie('RegSolTwitterAllow') == 'true') {
				document.getElementById("twitterToggle").checked = true;
			}
			
		}
	}	
	
	//show cookie prefs now that everything set correctly
	$('#sidebar').toggleClass('active');
	$('#overlay').toggleClass('active');	
	
		
	$(document).ready(function () {
					
		$('#AcceptAllCookies').on('click', function () {
			setCookie("RegSolCookiePreferences", "true");
			setCookie("RegSolAnalyticsAllow", "true", 60);
			setCookie("RegSolTwitterAllow", "true", 60);			
			location = location.pathname;			
			location.load();
			return false;				
		});
		
		$('#RejectUnnecessaryCookies').on('click', function () {
			setCookie("RegSolCookiePreferences", "true");
			setCookie("RegSolAnalyticsAllow", "false", 60);
			setCookie("RegSolTwitterAllow", "false", 60);
			location = location.pathname;			
			location.load();
			return false;				
		});
		
		$('#SavePreferencesCookies').on('click', function () {
			setCookie("RegSolCookiePreferences", "true");
			var analyticsToggle = document.getElementById("analyticsToggle");
			setCookie("RegSolAnalyticsAllow", analyticsToggle.checked, 60);
			var twitterToggle = document.getElementById("twitterToggle");
			setCookie("RegSolTwitterAllow", twitterToggle.checked, 60);
			location = location.pathname;			
			location.load();
			return false;				
		});
	});
</script>

<?php 
	} ?>