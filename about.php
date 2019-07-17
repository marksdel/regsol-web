   <?php
		
		require_once "recaptcha/src/autoload.php";
		
		// your secret key
		$secret = "6LfFHoIUAAAAAOIWZNYB_OEz7fmnz_fM8AKl50Kf";
 
		// empty response
		$response = null;
 
		// check secret key
		$reCaptcha = new \ReCaptcha\ReCaptcha($secret);
		
		//setup variables
		$name='';
		$email='';
		$message = '';
		$errMessage='';
		$errName='';
		$errEmail='';
		$errRecaptcha='need to check';
		$result='';
		$resp='';
		
	if (isset($_POST["submit"])) {
			
		// if submitted check recaptcha
		
		
		
		if ($_POST["g-recaptcha-response"]) {
			$resp = $reCaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                      ->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
			if ($resp->isSuccess()) {
				$errRecaptcha = '';
			} else {
				$errRecaptcha = 'Problem verifying, please retry';
			}		
		}
		
		/*
		echo '<p><strong>' . $response .':</strong> '.'</p>';
		if ($response != null && $response->success) {
				//do nothing
		} else {
			$errRecaptcha = 'Problem verifying, please retry';
		}
		*/		
		$name=preg_replace('/[^a-zA-Z0-9\ ]/','',$_POST['name']);
		$name=htmlspecialchars($name);
		
		$email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
				
		$message=preg_replace('/[^a-zA-Z0-9\ ]/','',$_POST['message']);
		$message=htmlspecialchars($message);
		
		$from = 'info@regsol.ie'; 
		$to = 'info@regsol.ie'; 
		$subject = 'Message from ' . $name;
		
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";

		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Please enter your name';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Please enter a valid email address';
		}
		
		//Check if message has been entered
		if (!$_POST['message']) {
			$errMessage = 'Please enter your message';
		}
				
		
		// If there are no errors, send the email
		if (!$errName && !$errEmail && !$errMessage && !$errRecaptcha) {
			if (mail ($to, $subject, $body, $from)) {
				$result='<div class="alert alert-success">Thank You! One of our consultants will contact you shortly</div>';
			} else {
				$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again</div>';
			}
		}
	} 
		
	
?>	



<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<?php include 'js/gtag.js'; ?>
    <title>RegSol - About Us</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Regulatory and compliance solutions for Irish and other European firms">
    <meta name="keywords" content="regulatory">
    <meta name="author" content="DW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:title" content="RegSol">
	<meta property="og:description" content="Regulatory and compliance solutions for European firms">
	
    <?php include 'header-common.php';?>
    <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/550517faeafaf001b97a16724/e9ca002511238c462b2f1e6f1.js");</script>
</head>
<body>
    <div id="loading-screen" class="centered-column">
        <div class="spinner centered-column">
            <div class="loader"></div>
        </div>
    </div>
	
    <!-- NAVBAR -->
    <?php include 'menu.php';?>

	<!-- SECTION -->
	<section id="our_story">
		<script>
            $('#first-splash-image').on('load', function() {
                $('#loading-screen').addClass('loading-slide-up');
            });
            setTimeout(function() {
                $('#loading-screen').addClass('loading-slide-up');
            }, 500)
        </script>
		
		<video autoplay muted loop id="myVideo">
			<source src="video/dublin_traffic.mp4" type="video/mp4">
		</video>
		<div class="content">
			<div class="container centered-column ">
				<div class="col-sm-10 text-left centered-column">	
					<div class="hidden-xs">
						<br><br>
					</div>
					<h2>Welcome to RegSol - Your Regulatory Advisors</h2>
					<br>
				</div>
				<div class="col-sm-10 text-left centered-column white-insert hidden-xs">
					<h3> <b>Mission Statement - </b>We aim to help take the pain out of regulatory compliance for our clients.</h3>
									
				</div>
			</div>
			<div class="container">
				<div class="col-sm-1 hidden-xs">
					&nbsp;
				</div>
				<div class="col-sm-6 text-left">
					<p class="text-left content-relative">Combining over twenty years of regulatory, compliance, IT, and financial services experience, our consultants excel at finding workable solutions for your compliance needs. Our training and consultancy services are specifically designed to ease the burden of constantly expanding compliance requirements. We take the stress out of meeting compliance and regulatory obligations, allowing you to focus on building your business.<br><br><br></p>
					
				</div>
				
				<div class="col-md-4 hidden-xs">
					<div>
						<p class="quote"> 
							"If you think compliance is expensive <br>- try non-compliance"
						</p>
					</div>
					
					-Former US Deputy Attorney General Paul McNulty
				</div>
			</div>
			<div class="col-md-12 hidden-xs">
				<br><br><br><br><br><br><br><br><br><br><br><br><br>
			</div>
		</div>
		
		
	</section>

	<!-- SECTION -->	
	<section id="contact" class="contact">
		<div class="container">
			<div class="col-sm-6 col-sm-6 text-left ">	
				<div class="centered-column">
					<h2>Contact Form</h2>
			
				</div>
				<br><br>
				<form class="form-horizontal" role="form" method="post" action="about.php#contact">
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Name *</label>
						<div class="col-sm-9">			
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($name); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>	
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">Email *</label>
						<div class="col-sm-9">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($email); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-3 control-label">Message *</label>
						<div class="col-sm-9">
							<textarea class="form-control" rows="4" name="message"><?php echo htmlspecialchars($message);?></textarea>
							<?php echo "<p class='text-danger'>$errMessage</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-3 control-label">Verification</label>
						<div class="col-sm-9 centered-column g-recaptcha" data-sitekey="6LfFHoIUAAAAAITuM_uCD4ZABFc3TDlP9YpujrCP"></div>
						<?php echo "<p class='text-danger'>$errRecaptcha</p>";?>
					</div>
					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-3">
							<input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-9 col-sm-offset-3">
							<?php echo $result; ?>	
						</div>
					</div>					
				</form> 
				
			</div>
			<div class="col-sm-1 col-sm-1 text-left ">	
				<div class="centered-column">
					&nbsp;
					
				</div>				
			</div>
			<div class="col-sm-5 col-sm-5 text-left ">	
				<div class="text-left">
					<h2 class="text-left">Contact Details</h2>
					<div class="container">
						<a href="https://twitter.com/regsolireland?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @regsolireland</a>
						<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						&nbsp;
						<script src="https://platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
						<script type="IN/FollowCompany" data-id="11508145"></script>
						<br><br>
						<b>Telephone :</b> <a href="tel:+35315394884">+353 1 539 4884</a><br>
						<b>Email : </b><a href="mailto:info@regsol.ie">info@regsol.ie</a> 						
						<br><br>
						<b>Address : </b> <br>Unit 23, <br>Trinity Technology & Enterprise Campus, <br>Pearse Street, <br>Dublin 2, <br>D02 WR66<br><br>
						

					</div>					
				</div>
				
			</div>
			
		</div>		

		<div class="hidden-sm">
			<br><br><br>
		</div>
		
		
		<?php include 'footer.php';?>		
	</section>	
	
	<!--SECTION-->
	<section id="privacy" class="privacy">
		<div class="container centered-column">
			<div class="col-sm-12 text-left centered-column">	
				<h1>Privacy Statement</h1>
				<h2 class="text-left">1. Who We Are</h2>
				<p class="text-left">
					Réiteach Consultancy Limited trading as RegSol and RegSol Ireland is a company limited by shares
					registered in Ireland with CRO Number 618712.
					In this privacy statement “we” or “our” or “RegSol’ and RegSol.ie means Réiteach Consultancy
					Limited.
					You can contact us by email - info@regsol.ie or Phone – 01 539 4884 or by writing to our registered
					office.
				</p>
				<h2 class="text-left">2. How and Why We Process Personal Data</h2>
				<p class="text-left">
					We comply with the current Irish and European law on data protection. You do not have to supply us
					with any of your data if you choose not to.
					We obtain, store and process information about our clients in the context of our business for the
					purpose of providing our consultancy and training services. Information on clients is obtained via
					email, phone, writing and sign up via our website for training courses. The legal basis for processing
					in this context is contractual. In most cases we will retain the information which we store about you
					or your business for 6 years after the end of our working relationship or where appropriate 6 years
					from the completion of a project.
				</p>				
				<p class="text-left">
					You can also provide us with your name and email address via our website for the sole purpose of
					receiving our newsletter and information about our services. The legal basis for processing in this
					context is consent and you can withdraw your consent by clicking unsubscribe on any of those
					communications. We will retain your details unless or until you indicate to us that you no longer
					wish to receive our newsletter or other information in this context. Clicking unsubscribe will
					automatically delete your information from our database.
				</p>				
				<p class="text-left">	
					We do not disclose your personal data to anyone outside of RegSol without your consent other than
					in the situations below:
					<ul>
						<li>Where the proper handling of your work or provision of our services to you requires disclosure						<
						<li> on a confidential basis to auditors where they may make random checks of our files;
						<li> to our professional indemnity insurers;
						<li> where compelled by professional regulations (including Your regulators) or by law, such as a
						court order.
						<li> Where we engage services providers to assist us in providing our services, we will always
						ensure that they are complaint with Irish and European Data Protection law and subject to a
						written agreement that includes adequate protection of your data.
						
					</ul>
				</p>				
				<p class="text-left">	
					We do not transfer personal data of our clients or subscribers to destinations outside of the European Union.				
					
				</p>
				<h2 class="text-left">3. Cookie Policy</h2>
				<p class="text-left">
					By using this website, you are consenting to the use of cookies from third-party partners such as Google to analyze user activity in order to help improve the website. For example, 
					if we notice that a certain section of our website is not being accessed regularly we may try to make it more prominent. We use these analytics to help improve 
					the functionality and user experience of the website.
				</p>
				<h2 class="text-left">4. Your Rights</h2>
				<p class="text-left">
				
					Applicable data protection laws may give you the right to control how we process your personal
					data. These include the right (i) to request access to and a copy of your personal information, (ii) to
					object to processing of your personal information, or to request rectification or erasure of your
					personal information; (iii) to restrict processing of your personal information; and (iv) to data
					portability. Where we are using your personal information with your consent, you also have the right
					to withdraw your consent at any time, though this will not affect our uses of your personal
					information prior to the withdrawal of your consent.
				</p>
				<p class="text-left">	
					If you wish to exercise any of these rights please contact us via email – info@RegSol.ie or in writing
					to our registered office and we will endeavor to respond as soon as possible.
					You also have the right to complain to your national Data Protection Authority at any time.
				</p>
			</div>
		</div>
		<?php include 'footer.php';?>
	</section>		

	<?php include 'resize-menu.php';?>


</body>
</html>
