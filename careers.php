
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
	<script type= "text/javascript">
				$(document).ready(function () {
				$('#public_training').DataTable({
"order": [[ 2, "asc" ]]
});
				$('.dataTables_length').addClass('bs-select');
				});
	</script>

    
</head>
<body class="careers">
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
		<h2> Careers @ RegSol</h2>
		<div class="container white-insert">
			<div class="col-sm-12 text-left">						
				Please see our current job vacancies below. If you don't see a relevant role below but believe you would be a good fit for RegSol please feel to <a href="about.php#contact">contact us</a>. We are always interested in speaking with dynamic candidates about potential roles.
				<br><br>
			
			</div>
		</div>
		<br>

		<div class="container white-insert" >
			<div class="col-sm-12 text-left centered-column">
				<h2>Title: Regulatory Compliance Consultant - Part Time (3 Days p.w.) </h2>

				<b>About RegSol:</b><br>
				RegSol is a key provider of regulatory compliance services to small and medium-sized firms primarily in Ireland. Our consulting business carries out external audits, prepares and reviews policies, and designs processes in conjunction with clients, along with providing additional services in a consultancy capacity. We offer in-house, public and online training in numerous areas relating to compliance regulations such as anti-money laundering legislation, GDPR, etc.
				<br><br>
				<b>Description:</b><br>
				RegSol is looking for a talented, ambitious and driven consultant with experience in regulatory compliance (may suit individual returning to work after extended leave or individuals with other commitments such as study).
				<br><br>

				<b>Role and Responsibilities:</b>
				<b>&emsp;Consulting:</b>
				<ul>
					<li>Advising clients on regulatory obligations including preparing opinions</li>
					<li>Conducting onsite compliance reviews</li>
					<li>Drafting/Reviewing Policies and Procedures</li>
					<li>Assisting in Authorisation Applications to the Central Bank of Ireland/Dept. Of Justice</li>
				</ul>
				<b>&emsp;Training:</b>
				<ul>
					<li>Assisting in the development, research and drafting of new course content</li>
					<li>Amending course content to keep it up to date</li>
					<li>Delivering training sessions to members of the Public in line with our timetable</li>
					<li>Delivering scheduled training to companies ‘In-House’</li>
				</ul>
				<br>
				<b>Qualifications:</b>
				<ul>
					<li>Minimum 2:1 Degree in a relevant disciple (e.g. Law, Business and Legal, or other relevant)</li>
					<li>Alternatively, a recognised Compliance Qualification (e.g. ACOI accreditation)</li>
					<li>Data Protection qualification (e.g. ECDPO, ICCP, etc.) is desirable</li>
				</ul>
				<br>
				<b>Experience:</b>
				<ul>
					<li>Experience gained within a relevant Department/Sector - Legal, Compliance, Risk, Governance, Data Protection, Financial Services or other relevant</li>
					<li>Experience delivering Training</li>
					<li>Experience drafting/reviewing Policies & Procedures, Opinions, etc. </li>
					<li>Exposure to Anti-Money Laundering and/or Data Protection Legislation an advantage </li>
					<li>Exposure to Central Bank of Ireland regulation an advantage</li>
				</ul>
				<br>
				<b>Salary:</b>
				<ul>
					<li>Based on 3 day working week ( 22.5hrs) - negotiable</li>
				</ul>
				<br>
				<b>Working Arrangements:</b>
				<ul>
					<li>Primary place of work is RegSol’s Dublin Office.</li>
					<li>Some work performed onsite at client locations and some training delivered outside of Dublin.</li>
					<li>Some flexibility for working from home.</li>
				</ul>
				<br>
				<p>To apply for this role please email your CV and cover letter to <a href="mailto:hr@regsol.ie">hr@regsol.ie</a></p>

			
			
			</div>
		</div>
		
		
		
		<br><br><br><br><br><br><br><br>
		
		
		<?php include 'footer.php';?>		

			
	</section>
	
	

	
	<?php include 'resize-menu.php';?>

   
</body>
</html>
