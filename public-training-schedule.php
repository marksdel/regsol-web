
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
	<?php include 'js/gtag.js'; ?>
    <title>RegSol - Public Training Courses</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Regulatory and compliance solutions for European firms">
    <meta name="keywords" content="regulatory training courses dublin galway ireland compliance aml gdpr mlro course ctf cpc">
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
			<!--div class="col-sm-12 text-left">						
				Please see below our timetable of upcoming courses which are open to the public. Descriptions of each course can be found on our <a href="training-courses.php">Course Descriptions</a> page or by clicking on the booking link. If you cannot make any of these dates or would like to discuss custom, in-house training please <a href="about.php#contact">contact us</a> and we will be happy to accommodate you. 
				<br><br>
				We can also tailor content specifically for other areas, if your required topics are not below please don't hesitate to get in touch to discuss. 
				
			</div-->
			
			<div class="col-sm-12 text-left ">				
				
				<br>Please be advised that all public training sessions are currently being re-scheduled as webinar format in light of the global pandemic. You will find the currently scheduled courses below. We have a range of courses (<a href="training-courses.php">descriptions available here</a>), so if you don't see the course you're looking for (either in the timetable below or on the descriptions page), please <a href="about.php#contact">contact us</a> and we will do our best to accommodate your requirements.
				<br><br>
				
			</div>
		</div>
		<br>

		<div class="container" >
			*Click on title for course description
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
				<?php 
					include 'dbdetails.php';
					
					try {
						// Establish connection to database
						$conn = new PDO($pdo_dsn, $pdo_user, $pdo_password);

						// Throw exceptions in case of error.
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);								
						
						$con1=mysqli_connect("localhost",$pdo_user,$pdo_password,$pdo_dbname);
						// Check connection
						if (mysqli_connect_errno()){
						  echo "Failed to connect to MySQL: " . mysqli_connect_error();				  
						}
						$result = mysqli_query($con1,"select Title, DescriptionLink, Location, Date, DATE_FORMAT(Date,'%a %D %b %Y') Date, Time, BookingText, BookingLink from PublicTrainingSchedule order by Date asc");										
						if (!$result) {
							echo 'Could not run query: ' . mysql_error();
							exit;
						}					
					
					    /* print courses */
						while ($row = $result->fetch_row()) {
							$yyyymmdd_date = $row[3];
							$display_date = $row[4];
							if ($yyyymmdd_date == '2050-01-01') {
								$display_date = 'TBC';
							}
							echo "<tr>\n";
							echo "<th><a target='_NEW' data-toggle='tooltip' data-placement='top' title='Click for course description' href='".$row[1]."'>".$row[0]."</a></th>";
							echo "<th>".$row[2]."</th>\n";
							echo "<th><span class='date'>".$yyyymmdd_date."</span>".$display_date."</th>\n";
							echo "<th>".$row[5]."</th>\n";
							echo "<th><a target='_NEW' href='".$row[7]."'>".$row[6]."</a></th>";
							
							/* eventbrite embedded
							echo '<th>
							<!-- Noscript content for added SEO -->
<noscript><a href="https://www.eventbrite.ie/e/insurance-distribution-regulation-idr-dublin-tickets-54652648543" rel="noopener noreferrer" target="_blank"></noscript>
<!-- You can customize this button any way you like -->
<button id="eventbrite-widget-modal-trigger-54652648543" type="button">Buy Tickets</button>
<noscript></a>Buy Tickets on Eventbrite</noscript>

<script src="https://www.eventbrite.ie/static/widgets/eb_widgets.js"></script>

<script type="text/javascript">
    var exampleCallback = function() {
        console.log("Order complete!");
    };

    window.EBWidgets.createWidget({
        widgetType: "checkout",
        eventId: "54652648543",
        modal: true,
        modalTriggerElementId: "eventbrite-widget-modal-trigger-54652648543",
        onOrderComplete: exampleCallback
    });
</script> </th>';

*/
							echo "</tr>\n";
							
						}

						/* free result set */
						$result->close();

						/* close connection */
						$con1->close();					
						
					
					} catch (PDOException $e) {
						echo 'Error: ' . $e->getMessage() . " file: " . $e->getFile() . " line: " . $e->getLine();
						exit;
					} catch (Exception $e) {
						echo 'Error: ' . $e->getMessage() . " file: " . $e->getFile() . " line: " . $e->getLine();
						exit;
					}

				?>
					
				
										
										
				</tbody>
			</table>
		</div>
		
		
		
		<br><br><br><br><br><br><br><br>
		
		
		<?php include 'footer.php';?>		

			
	</section>
	
	

	
	<?php include 'resize-menu.php';?>

   
</body>
</html>
