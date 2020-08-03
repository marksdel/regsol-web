
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<?php include 'js/gtag.js'; ?>
    <title>Regulatory Solutions</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Regulatory and compliance solutions for European firms">
    <meta name="keywords" content="reg sol aml gdpr regulatory brexit compliance authorisation training Ireland dublin consultancy training anti money laundering data protection">
    <meta name="author" content="RegSol">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    	
    <?php include 'header-common.php';?>

	<!-- for google G suite-->
	<meta name="google-site-verification" content="LQ05Jtwk7zF6fQJYUbksMOIWBAGfJV9uqo2_DlWxdTE" />
    
</head>
<body>
    <div id="loading-screen" class="centered-column">
        <div class="spinner centered-column">
            <div class="loader"></div>
        </div>
    </div>
	

    <!-- NAVBAR -->
    <?php include 'menu.php';?>

    <!--SECTION-->
    <section id="home" class="medium-gray">
		
        <div class="container centered-column home-text">	
		
			<!--PLACEHOLDER FOR EVENTS SPLASH-->
            <!--Desktop>			
            <div class="centered-column hidden-xs col-sm-12 splash-header">    		
					<div class="centered-column">
						<a href="https://aml-seminar-galway-regsol-dec18.eventbrite.ie"><img src="images/aml-seminar-galway-small.png"><br>
						<a class="centered white-link-text" href="https://aml-seminar-galway-regsol-dec18.eventbrite.ie">Click here for <br>info and tickets</a>
						
					</div>         			
				
            </div>
			<!--Mobile>
			<div class="centered-column visible-xs col-sm-12 splash-header">    
				<a href="https://aml-seminar-galway-regsol-dec18.eventbrite.ie"><img width="100%" src="images/aml-seminar-galway-small.png"><br>
				<a class="white-link-text mobile-text" href="https://aml-seminar-galway-regsol-dec18.eventbrite.ie">Click here for info and tickets</a>
			</div-->
			
			<!--div class="centered-column col-sm-6 home-blurb">Welcome to the home of RegSol, leading provider of regulatory and compliance solutions in Ireland and across Europe. Primarily focused on SMEs, we can provide compliance assistance from <a href='consulting.php#authorisations'>authorisations</a> through to on-going support. Feel free to explore our services on this site or <a href="about.php#contact">contact us</a> to discuss your requirements.</div-->
			
			<div class="centered-column col-sm-8 home-blurb">
				<div class="col-sm-12 text-left">
					<h1>Notice</h1>
					<br>Please be advised that all public training sessions are currently being re-scheduled in webinar format. Please check the <a  style="display: inline" href="public-training-schedule.php">timetable</a> and <a href="about.php#contact">let us know</a> if there are any other courses you would like to see scheduled. 
					<br><br>
					Note that consultancy will remain in full operation (via phone, email and video-conferencing). Again, please  <a href="about.php#contact">contact us</a> if you would like to discuss your requirements.
					<br><br>
					Kind regards,<br>
					The RegSol team<br><br>
				</div>
			</div>
			<!--div class="centered-column col-sm-3 home-training"><a href="training-courses.php">TRAINING</a></div>
			
			<div class="centered-column col-sm-3 home-consulting"><a href="consulting.php">CONSULTING</a></div-->
			
        </div>
		
        <div class="centered-column">
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item active">
						<img id="first-splash-image" src="images/people-woman-coffee-meeting.jpg">
						<div class="splash-text-holder">						
                            <a href="consulting.php#authorisations" class="white-link-text"><h3 class="splash-text">Specialists in Broker Authorisation applications</h3></a>
                        </div>
                        
                        
                    </div>
                    <!-- Loading Script -->
                    <script>
                        $('#first-splash-image').on('load', function() {
                            $('#loading-screen').addClass('loading-slide-up');
                        });
                        setTimeout(function() {
                            $('#loading-screen').addClass('loading-slide-up');
                        }, 100)
                    </script>
					
                    <!-- Loading Script -->
                    <div class="item">
                        <img src="images/pexels-photo-401684.jpeg">
                        <div class="splash-text-holder">
                            <a href="consulting.php#AML" class="white-link-text"><h3 class="splash-text">AML Expertise at your fingertips</h3></a>
                        </div>
                    </div>
                    <div class="item">
                        <img src="images/pexels-photo-boxes-hand.jpg">
                        <div class="splash-text-holder">
                            <a href="consulting.php#GDPR" class="white-link-text"><h3 class="splash-text">GDPR Solutions that work for your Business</h3></a>
							 
                        </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span style="color: #1d9d73; margin-left: 25%; font-size: 16px; opacity: 0;" class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span style="color: #1d9d73; margin-right: 25%; font-size: 16px; opacity: 0;" class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
                <script>
                    $('#home').mouseover(function() {
                        $('#home .glyphicon').css('opacity', '1');
                    });
                    $('#home').mouseout(function() {
                        $('#home .glyphicon').css('opacity', '0');
                    });
                </script>
            </div>
        </div>
		
    </section>

</body>
</html>
