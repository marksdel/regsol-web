
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<?php include 'js/gtag.js'; ?>
    <title>RegSol - Public Training Courses</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Regulatory and compliance solutions for European firms">
    <meta name="keywords" content="regulatory">
    <meta name="author" content="DW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:title" content="RegSol">
	<meta property="og:description" content="Regulatory and compliance solutions for European firms">
	
    <?php include 'header-common.php';?>
	

    
</head>
<body class="public-training">
    <div id="loading-screen" class="centered-column">
        <div class="spinner centered-column">
            <div class="loader"></div>
        </div>
    </div>
	
    <!-- NAVBAR -->
    <?php include 'menu.php';?>

	<!-- SECTION -->
	<section id="Schedule"" >
		<script>
            $('#first-splash-image').on('load', function() {
                $('#loading-screen').addClass('loading-slide-up');
            });
            setTimeout(function() {
                $('#loading-screen').addClass('loading-slide-up');
            }, 500)
        </script>				
		<div class="centered-column">
			<p>&nbsp;</p>
			<p>&nbsp;</p>
		</div>
		<h2> Upcoming Courses</h2>
		<div class="container white-insert">
			<div class="col-sm-12 text-left">						
				Please see below our timetable of upcoming courses which are open to the public. If you cannot make any of these dates or would like to discuss custom, in-house training please <a href="about.php#contact">contact us</a> and we will be happy to accommodate you.
			</div>
		</div>
		<br>

		<div class="container" >
			<div class="row title-row">
				<div class="col-sm-3 text-left ">Title</div>
				<div class="col-sm-2 text-left ">Location</div>
				<div class="col-sm-3 text-left ">Date</div>
				<div class="col-sm-2 text-left ">Time</div>
				<div class="col-sm-2 text-left ">Booking Details</div>
			</div>		
			<div class="row table-even-row">
				<div class="col-sm-3 text-left "><a href="https://regulatory-compliance-essentials-regsol-nov18.eventbrite.ie" target="_new">Regulatory Compliance Essentials (AML, GDPR, Ethics)</a></div>
				<div class="col-sm-2 text-left ">The Harbour Hotel, Galway</div>
				<div class="col-sm-3 text-left ">Wednesday, 7th November 2018</div>
				<div class="col-sm-2 text-left ">09:00 - 16:30</div>
				<div class="col-sm-2 text-left ">
					<a href="https://regulatory-compliance-essentials-regsol-nov18.eventbrite.ie" target="_new">Book Full Day</a><br>
					<a href="https://anti-money-laundering-regsol-galway-nov18.eventbrite.ie" target="_new">Book AML Session</a><br>				
					<a href="https://ethics-regsol-galway-nov18.eventbrite.ie" target="_new">Book Ethics Session</a><br>
					<a href="https://gdpr-regsol-galway-nov18.eventbrite.ie" target="_new">Book GDPR Session</a><br>
				</div>		
			</div>
			<div class="row table-odd-row">
				<div class="col-sm-3 text-left "><a href="https://compliance-essentials-regsol-donegal-nov18.eventbrite.ie" target="_new">Regulatory Compliance Essentials (AML, GDPR, Ethics)</a></div>
				<div class="col-sm-2 text-left ">Harvey's Point, Donegal</div>
				<div class="col-sm-3 text-left ">Wednesday 21st November 2018</div>
				<div class="col-sm-2 text-left ">09:00 - 16:30</div>
				<div class="col-sm-2 text-left ">
					<a href="https://compliance-essentials-regsol-donegal-nov18.eventbrite.ie" target="_new">Book Full Day</a><br>
					<a href="https://anti-money-laundering-regsol-donegal-nov18.eventbrite.ie" target="_new">Book AML session</a><br>
					<a href="https://ethics-regsol-donegal-nov18.eventbrite.ie" target="_new">Book Ethics session</a><br>
					<a href="https://gdpr-regsol-donegal-nov18.eventbrite.ie" target="_new">Book GDPR session</a><br>				
				</div>				
			</div>
			<div class="row table-even-row">
				<div class="col-sm-3 text-left "><a href="https://aml-seminar-galway-regsol-dec18.eventbrite.ie/?aff=RegsolWeb" target="_new">Seminar - Anti-Money Laundering and Counter Terrorist Financing : Recent Observations</a></div>
				<div class="col-sm-2 text-left ">The Harbour Hotel, Galway</div>
				<div class="col-sm-3 text-left ">Thursday, 6th December 2018</div>
				<div class="col-sm-2 text-left ">09:30 - 12:00</div>
				<div class="col-sm-2 text-left "><a href="https://aml-seminar-galway-regsol-dec18.eventbrite.ie/?aff=RegsolWeb" target="_new">Book this seminar now</a></div>		
			</div>			
		</div>
		
		<br><br><br><br><br><br><br><br>
		
		
		<?php include 'footer.php';?>		

			
	</section>
	
	

	
	<?php include 'resize-menu.php';?>

   
</body>
</html>
