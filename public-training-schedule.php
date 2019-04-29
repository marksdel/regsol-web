
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<?php include 'js/gtag.js'; ?>
    <title>RegSol - Public Training Courses</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Regulatory and compliance solutions for European firms">
    <meta name="keywords" content="regulatory training courses dublin galway ireland compliance aml gdpr">
    <meta name="author" content="DW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:title" content="RegSol">
	<meta property="og:description" content="Regulatory and compliance solutions for European firms">
	
    <?php include 'header-common.php';?>
	<script type= "text/javascript">
				$(document).ready(function () {
				$('#public_training').DataTable({
"order": [[ 2, "asc" ]]
});
				$('.dataTables_length').addClass('bs-select');
				});
	</script>

    
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
	<section id="Schedule">
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
				<br><br>
				<b>NOTE : </b>We are currently in the process of arranging our 2019 public training schedule, feel free to <a href="about.php#contact">contact us</a> with any suggestions/queries.
			</div>
		</div>
		<br>

		<div class="container" >
			
			<table id="public_training" class="table-striped" width="100%" data-page-length='25'>
				<thead>
					<tr class="title-row">
						<th class="title-row">Title</th>
						<th class="title-row">Location</th>
						<th class="title-row">Date</th>
						<th class="title-row">Time</th>
						<th class="title-row" width="18%">Booking Details</th>
					</tr>
				</thead>
				<tbody>

					<tr>
						<th>Risk-Based Compliance (Half day) <span class="highlight"> - NEW</span></th>
						<th>Galway, Harbour Hotel</th>
						<th><span class="date">20190314</span>14th Mar 2019</th>
						<th>09:00-13:00</th>
						<th><a href="https://www.eventbrite.com/e/risk-based-compliance-workshop-galway-tickets-55856598590?aff=Website" >Book this course</a></th>
					</tr>
					<tr>
						<th>Anti-Money Laundering Update (2hr)</th>
						<th>Galway, Harbour Hotel</th>
						<th><span class="date">20190314</span>14th Mar 2019</th>
						<th>14:15-16:15</th>
						<th><a href="https://www.eventbrite.com/e/anti-money-laundering-updates-training-course-galway-tickets-54653449940?aff=Website" >Book this course</a></th>
					</tr>
					<tr>
						<th>Regulatory Compliance Essentials (AML, GDPR, Ethics) (Full day)</th>
						<th>Dublin, Grand Canal Hotel</th>
						<th><span class="date">20190404</span>4th Apr 2019</th>
						<th>09:00-16:15</th>
						<th><a href="https://regulatory-compliance-essentials-regsol-dublin.eventbrite.com/?aff=Website" >Book this course</a></th>
					</tr>
					<tr>
						<th>&emsp;&emsp;Anti-Money Laundering Update</th>
						<th>Dublin, Grand Canal Hotel</th>
						<th><span class="date">20190404</span>4th Apr 2019</th>
						<th>09:15-11:30</th>
						<th><a href="https://aml-regsol-dublin.eventbrite.com/?aff=website" >Book this course</a></th>
					</tr>
					<tr>
						<th>&emsp;&emsp;Ethics Fundamentals (1hr)</th>
						<th>Dublin, Grand Canal Hotel</th>
						<th><span class="date">20190404</span>4th Apr 2019</th>
						<th>11:50-13:00</th>
						<th><a href="https://ethics-regsol-dublin.eventbrite.com/?aff=website" >Book this course</a></th>
					</tr>
					<tr>
						<th>&emsp;&emsp;	GDPR Essentials (2hr)</th>
						<th>Dublin, Grand Canal Hotel</th>
						<th><span class="date">20190404</span>4th Apr 2019</th>
						<th>14:00-16:15</th>
						<th><a href="https://gdpr-essentials-dublin-regsol.eventbrite.com/?aff=website" >Book this course</a></th>
					</tr>					
					<tr>
						<th>IDR - Insurance Distribution Regulations (2hr) <span class="highlight"> - NEW</span></th>
						<th>Dublin, RegSol offices</th>
						<th><span class="date">20190425</span>25th Apr 2019</th>
						<th>09:00-13:00</th>
						<th><a href="https://www.eventbrite.ie/e/insurance-distribution-regulations-idr-dublin-tickets-57621075187">Book this course</a></th>
					</tr>					
										
										
				</tbody>
			</table>
		</div>
		
		
		
		<br><br><br><br><br><br><br><br>
		
		
		<?php include 'footer.php';?>		

			
	</section>
	
	

	
	<?php include 'resize-menu.php';?>

   
</body>
</html>
