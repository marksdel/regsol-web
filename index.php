
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<?php include 'js/gtag.js'; ?>
    <title>Regulatory Solutions</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Regulatory and compliance solutions for European firms">
    <meta name="keywords" content="regulatory brexit compliance authorisation training Ireland">
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
			
			<div class="centered-column col-sm-3 home-training"><a href="training.php">TRAINING</a></div>
			
			<div class="centered-column col-sm-3 home-consulting"><a href="consulting.php">CONSULTING</a></div>
			
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
