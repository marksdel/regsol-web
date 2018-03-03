   <?php
		$name='';
		$email='';
		$message = '';
		$errMessage='';
		$errName='';
		$errEmail='';
		$errHuman='';
		$result='';
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);
		$from = 'info@regsol.ie'; 
		$to = 'info@regsol.ie'; 
		$subject = 'Message from $name';
		
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
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Your anti-spam is incorrect';
		}
 
// If there are no errors, send the email
		if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
			if (mail ($to, $subject, $body, $from)) {
				$result='<div class="alert alert-success">Thank You! One of our consultants will contact you shortly</div>';
			} else {
				$result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
			}
		}
	} 
		
		
	
?>	



<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>Regulatory Solutions</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Regulatory and compliance solutions for Irish and other European firms">
    <meta name="keywords" content="regulatory">
    <meta name="author" content="DW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:title" content="RegSol">
	<meta property="og:description" content="Regulatory and compliance solutions for European firms">
    
    <link rel="icon" href="images/regsol_logo_black_yellow.png">
	
    <?php include 'header-common.php';?>

    
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
	<section id="our_story" class="grey-scale">
		<script>
            $('#first-splash-image').on('load', function() {
                $('#loading-screen').addClass('loading-slide-up');
            });
            setTimeout(function() {
                $('#loading-screen').addClass('loading-slide-up');
            }, 1000)
        </script>
		<div class="centered-column">
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div>
		
		<div class="container training-insert">
			<div class="col-sm-12 text-left training-insert">						
				<h2>Welcome to RegSol - Your Regulatory Advisors</h2>
				<p>Combining over twenty years of regulatory, compliance, IT, and financial services experience, our consultants excel at finding workable solutions for your compliance needs. Our training and consultancy services are specifically designed to ease the burden of constantly expanding compliance requirements. We take the stress out of meeting compliance and regulatory obligations, allowing you to focus on building your business.</p>
			</div>
		</div>
		<br>
		
		<div class="container">
			<div class="col-sm-12 col-sm-12 text-left ">				
				<iframe allowtransparency="true" frameborder="0" scrolling="no" style="width: 100%; height: 250px; margin-top: 10px; margin-bottom: 10px;" src="//www.weebly.com/weebly/apps/generateMap.php?map=google&elementid=403020970396367715&ineditor=0&control=3&width=auto&height=250px&overviewmap=0&scalecontrol=0&typecontrol=0&zoom=15&long=-6.260309699999993&lat=53.3498053&domain=www&point=1&align=1&reseller=false"></iframe>
			</div>						
		</div>		
		<br><br>		
	</section>

	<!-- SECTION -->	
	<section id="contact" class="contact">
		<div class="container">
			<div class="col-sm-6 col-sm-6 text-left ">	
				<div class="centered-column">
					<h2>Request a Consultation</h2>
			
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
						<label for="human" class="col-sm-3 control-label">2 + 3 = ? *</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
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
					<h2>Contact Details</h2>
					<div class="container">
							<b>Telephone :</b> +353 1 539 4884<br>
							<b>Email : </b><a href="mailto:info@regsol.ie">info@regsol.ie</a> <br>							
							<b>Address : </b> Harvest, 40A St John's Drive, D22 ET97<br>
					</div>					
				</div>
				<iframe allowtransparency="true" frameborder="0" scrolling="no" style="width: 100%; height: 250px; margin-top: 10px; margin-bottom: 10px;" src="//www.weebly.com/weebly/apps/generateMap.php?map=google&elementid=403020970396367715&ineditor=0&control=3&width=auto&height=250px&overviewmap=0&scalecontrol=0&typecontrol=0&zoom=15&long=-6.260309699999993&lat=53.3498053&domain=www&point=1&align=1&reseller=false"></iframe>
			</div>
		</div>		
	</section>
	

	<?php include 'resize-menu.php';?>


</body>
</html>
