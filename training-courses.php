<?php 
	
	
		
	/*Return the dates associated with a given course */
	function courseDates($courseName) {
		
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
			
			$query='select Location, DATE_FORMAT(Date,"%a %D %b %Y") TextDate, Time, BookingLink from PublicTrainingSchedule where Title = "'.$courseName.'" order by Date asc';
			$text = '<br><br class="'. $courseName . '"><b>Upcoming Sessions (click to book) : </b><br>';
			$text = $text.'<table class="table-striped-small" width="100%" >';
			$result = mysqli_query($con1,$query);										
			if (!$result) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}					
						
			/* fetch object array */
			while ($row = $result->fetch_row()) {
				$text = $text."<tr><td><a href='".$row[3]."' target='_new'>";
				$text = $text.$row[0]." -- ".$row[1]."</a></td></tr>";
			
			}
			$text = $text."</table><br><br><a href='public-training-schedule.php'>Full Training Schedule</a>";

			/* free result set */
			$result->close();
			
			/* close connection */
			$con1->close();	
			
			return $text;
			
		} catch (PDOException $e) {
			echo 'Error: ' . $e->getMessage() . " file: " . $e->getFile() . " line: " . $e->getLine();
			exit;
		} catch (Exception $e) {
			echo 'Error: ' . $e->getMessage() . " file: " . $e->getFile() . " line: " . $e->getLine();
			exit;
		}
	}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>RegSol - Training Courses Overview</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="In-person courses delivered either in-house or at our public events">
    <meta name="keywords" content="regulatory training courses dublin ireland compliance aml gdpr course galway ctf mlro cpc fitness probity anti money laundering">
    <meta name="author" content="DW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:title" content="RegSol - Training Courses Overview">
	<meta property="og:description" content="In-person courses delivered either in-house or at our public events">
	
    <?php include 'header-common.php';?>
    
</head>
<body class="public-training">

	
    <!-- NAVBAR -->
    <?php include 'menu.php';?>

	<!-- SECTION -->
	<section id="Courses" >

		<div class="row centered-column consulting-landing">
			<div class="col-sm-12 col-xs-12">			
				<br><br><br><br><br>&nbsp;
				<h1>Compliance Training</h1>	
				<br>
			</div>			
		</div>	
		<div class="container home-spotlight">
				<table>
					<tr>
						<td width="370px" class="white-insert">
							<p style="font-size:6px"></p>
							<a href="public-training-schedule.php">
							   <img src="images/feature_icons/public_training_icon.png" alt="Public Training" width="150px">
							   <h3>Public Training</h3>
							   <p style="font-size:13px">Webinar & in-person delivery – see our <a href="public-training-schedule.php">timetable</a> for available CPD sessions. </p>					  
							</a>	
						</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="370px" class="white-insert">
							<p style="font-size:6px"></p>
							<a href="#INDEX">
							   <img src="images/feature_icons/inhouse_training_icon.png" alt="In-person Training" width="150px">
							   <h3>In-House</h3>
							   <p style="font-size:13px">Webinar & in-person delivery of sector specific content and/or tailored to your firm.</p>						   
							</a>
						</td>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td width="370px" class="white-insert">
							<p style="font-size:6px"></p>
							<a href="elearning.php">
							   <img src="images/feature_icons/elearning_icon.png" alt="E-Learning" width="150px">
							   <h3>e-Learning</h3>
							   <p style="font-size:13px">Click-through modules made available via our LMS or for internal delivery via own LMS.</p>					
							</a>
						</td>
					</tr>
				</table>					
			
		</div>
			
		
		
		<div class="container white-insert">	
			<div class="col-sm-12 text-left">	
					
				Please see below the courses that we provide via either our <a href="public-training-schedule.php">public training timetable</a>, in-house delivery and/or e-learning modules. . All content is tailored for the Irish market to ensure for example Central Bank of Ireland requirements/expectations are met. CPD accreditation is sought for all courses.
				<br><br>	
				If you would like to discuss custom <a href="training.php">training solutions</a> please contact us via email  at <a href="mailto:info@regsol.ie">info@regsol.ie</a> or telephone at <a href="tel:+35315394884">+353 1 539 4884</a> and we will be happy to work with you regarding your requirements.
								
			</div>
		</div>
		<br>
		
		<!--INDEX-->
		<div id="INDEX" class="container  grey-insert">
			<div class="col-sm-1 centered-column">	
				&nbsp;
			</div>
			<div class="col-sm-6 ">	
				<h2 class="text-left">&emsp;List of Available Courses</h2>
				<ul>
					<li><a href="#AMLF">Anti-Money Laundering / Counter-Terrorist Financing</a></li>
					<li><a href="#AMLU">Anti-Money Laundering Updates</a></li>
					<li><a href="#AMLD">Anti-Money Laundering for Directors</a></li>
					<!--li><a href="#GDPRF">Data Protection Full Day</a></li-->
					<li><a href="#GDPR">Data Protection Essentials (2hr)</a></li>
					<li><a href="#Ethics">Ethics for Financial Services</a></li>
					<!--li><a href="#IDR">Insurance Distribution Regulations (IDR)</a></li-->
					<li><a href="#RBC">Risk-Based Compliance</a></li>
					<li><a href="#CPC">Consumer Protection Code (CPC)</a></li>
					<li><a href="#Dir">Directors' Duties</a></li>
					<li><a href="#FAP">Fitness & Probity</a></li>
					<li><a href="#MLRO">Duties of a Money Laundering Reporting Officer (MLRO)</a></li>	
					<!--li><a href="#CCMA">Code of Conduct on Mortgage Arrears (CCMA)</a></li-->
					<!--li><a href="#CICA">Consumer Insurance Contracts Act (CICA)</a></li-->
					<li><a href="#CBI">CBI Enforcement Actions and Inspections (CBI)</a></li>
					<li><a href="#TCF">Treating Customers Fairly (TCF)</a></li>
					<li><a href="#whistle">Whistleblowing</a></li>
					<li><a href="#market">Market Abuse</a></li>
					<li><a href="#ESG">Environmental, Social and Governance (ESG)</a></li>
					<li><a href="#IAF">Individual Accountability Framework (IAF)</a></li>
					<li><a href="#DORA">Digital Operations Resilience Act (DORA)</a></li>
					<li><a href="#Crime">Financial Crime</a></li>
					<li><a href="#Outsourcing">Outsourcing</a></li>
					<li><a href="#Crypto">Crypto Asset Regulation in Ireland</a></li>
					
				</ul>
				<br>
			</div>
			<div class="col-sm-3 centered-column">	
				<br><br><br>
				<img width="400px" src="images/training_skills.png">				
			</div>
			
		</div>	
		<br>
		
		<!--AML Full Day-->
		<div id="AMLF" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Anti-Money Laundering / Counter-Terrorist Financing (AML/CTF)</h2>
				While the 5th EU AML Directive was transposed into Irish law in April 2021, we are still awaiting transposition of the revised 6th EU AML Directive and to see how the European Commission's package for change, including the establishment of AMLA, progresses. It is important that those entrusted with AML/CFT responsibilities have adequate and regular training to ensure knowledge is kept up to date and those new to functions have a broad understanding of the full AML/CFT regime. 
				<br><br>
				With this course, we aim to give you a full breakdown of the AML/CTF and Financial Sanctions Regime in Ireland.  This full day course should enable you to understand the relevant concepts, put in place a robust AML/CTF framework and highlight the potential consequences of non-compliance.
				<br><br>
				
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#AMLF-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="AMLF-content" class="collapse panel-body-regsol">
						<br>Topics covered :
						<ul>
							<li>Legal and Regulatory Framework</li>
							<li>Money Laundering and Terrorist Financing Concepts</li>
							<li>Emerging Trends</li>
							<li>Risk Management and Assessment</li>
							<li>Operational Requirements as they relate to Customer Due Diligence</li>
							<li>Ongoing Monitoring</li>
							<li>Sanctions Screening</li>
							<li>Training Requirements</li>
							<li>Record Keeping</li>
							<li>Suspicious Activity/Transaction Reporting</li>
							<li>Enforcement</li>
							<li>Future Developments</li>
						</ul>
						<br>
					</div>
				</div>
			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#AMLF-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="AMLF-attendees" class="collapse panel-body-regsol">
						Staff, Management and Directors with AML/CTF responsibilities such as front line or customer service staff, MLROs, AML Officers, etc. in obliged entities/designated persons who require an in depth look at Irish AML requirements as derived from European Union Directives. 
						<br><br>
						<b>Relevant Firms:</b> credit and financial institutions, credit unions, money lenders, insurance undertakings and intermediaries, investment firms (IIA and MiFID), fund managers and administrators, trust or company service providers, estate agents, legal professionals, virtual asset services providers or those working with cryptocurrencies, leasing companies, etc.

					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/money_drying.png">
				<br><br>
				<b>Typical duration :</b> Full Day
				<br>
				<?php
					echo courseDates("Anti-Money Laundering / CTF");
				?>
			</div>
		</div>
		<br>
		
		<!--AML Update-->
		<div id="AMLU" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Anti-Money Laundering (AML) Updates</h2>
				While the 5th EU AML Directive was transposed into Irish law in April 2021, we are still awaiting transposition of the revised 6th EU AML Directive and to see how the European Commission's package for change, including the establishment of AMLA, progresses.

				<br><br>
				It is important to stay updated on this ever-evolving area. With an expectation from competent authorities that staff and directors of all Designated Persons undertake annual AML training, our AML Updates training course is updated for each delivery to ensure it is up to date on relevant requirements.  

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#AMLU-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="AMLU-content" class="collapse panel-body-regsol">
						<br>Our 2 hour Anti Money Laundering (AML) session includes:
						<ul>
							<li>Regulatory Update:</li>
							<ul><li>Transposition of the 5th and 6th AML Directives</li>
								<li>European Commission Action Plan</li>
							</ul>
							<li>Overview/refresher on Designated Persons Obligations</li>
							<li>Practical points for compliance</li>
							<li>Relevant Enforcement Actions/ Competent Authority Activity</li>
							
						</ul>
												
						<br>
					</div>
				</div>
			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#AMLU-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="AMLU-attendees" class="collapse panel-body-regsol">
						This module is suitable for most roles at firms which have AML obligations. It is recommended for Compliance Officers, Individual Intermediaries/Brokers, PCF Role Holders, Solicitors, Estate Agents, risk management personnel and others.
						<br><br>	
						<b>Relevant Firms:</b> credit and financial institutions, credit unions, money lenders, insurance undertakings and intermediaries, investment firms (IIA and MiFID), fund managers and administrators, trust or company service providers, estate agents, legal professionals, virtual asset services providers or those working with cryptocurrencies, leasing companies, etc.

						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/money_drying.png">
				<br><br>
				<b>Typical duration :</b> 2 hours
				<br>
				<?php
					echo courseDates("Anti-Money Laundering Updates");
				?>
			</div>
		</div>
		<br>
		
		<!--AML for Directors-->
		<div id="AMLD" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Anti-Money Laundering (AML) for Directors</h2>
				Boards of Directors remain ultimately responsible for the compliance of Designated Person entities with the Criminal Justice (Money Laundering and Terrorist Financing) Act 2010 as amended. With the 5th Eu Aml Directive having been transposed into Irish law in 2021, the 6th EU AML Directive having passed its transposition date and a European Level Action Plan to be put in place over the coming years, it is important for Directors to stay updated on this ever-evolving area

				<br><br>
				With an expectation from competent authorities that AML training is stratified and tailored to relevant roles, our training course is designed to specifically address the responsibilities of Directors in this area.  

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#AMLD-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="AMLD-content" class="collapse panel-body-regsol">
						<br>Our 2 hour Anti Money Laundering (AML) session includes:
						<ul>
							<li>Regulatory Update:</li>
							<ul><li>European Commission Action Plan including AMLA</li>								
							</ul>
							<li>Overview/refresher on Designated Persons Obligations</li>
							<li>How to demonstrate Oversight of the AML Framework</li>
							<ul><li>Senior Management</li>
								<li>Approval</li>
								<li>Reporting/Management Information</li>
						</ul>
									
						<br>
					</div>
				</div>
			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#AMLD-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="AMLD-attendees" class="collapse panel-body-regsol">
						Directors and Senior Management at firms which have AML obligations as Designated Persons (obliged entities). It is also recommended for Compliance Officers, Risk Officers and other personnel who may have a role in advising Boards on AML/CFT topics.
						<br><br>	
						<b>Relevant Firms:</b> credit and financial institutions, credit unions, money lenders, insurance undertakings and intermediaries, investment firms (IIA and MiFID), fund managers and administrators, trust or company service providers, estate agents, legal professionals, virtual asset services providers or those working with cryptocurrencies, leasing companies, etc.

						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/money_drying.png">
				<br><br>
				<b>Typical duration :</b> 2 hours
				<br>
				<?php
					echo courseDates("Anti-Money Laundering Directors");
				?>
			</div>
		</div>
		<br>
		
		
		<!--Data Protection Full Day>
		<div id="GDPRF" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Full Day Data Protection (GDPR + practical concerns)</h2>
				The General Data Protection Regulations became law on 25th May 2018, as did the Irish Data Protection Amendment Act 2018. Since then, the Data Protection Commission has produced its Annual Reports highlighting significant increases in Data Breach notifications and Complaints. A number of large fines have also been issued by the Irish DPC and other member state Competent Authorities in this area. 
				<br><br>
				Our Full Day Data Protection (GDPR) course aims to provide an in depth look at data protection requirements within Ireland and to provide relevant updates. 

				<br><br>				
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#GDPRF-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="GDPRF-content" class="collapse panel-body-regsol">
						<b>Topics covered : </b>
						<ul>
							<li>The need for legislation?</li>
							<li>The Law – What does GDPR entail?</li>
								<ul><li>Data Protection Principles</li>
									<li>Rights of Data Subjects</li>
									<li>Legal Basis for Processing</li>
									<li>International Transfers</li>
								</ul>
							<li>Key Practical Requirements</li>
								<ul><li>Record of Processing</li>
									<li>Policies and Procedures</li>
									<li>Technical organisational measures</li>
									<li>Design and Default / Data Protection Impact Assessments</li>
									<li>Relationships with Third parties</li>
								</ul>
							<li>Personal Data Lifecycle </li>
							<li>Case Studies</li>
							<li>Enforcement</li>
						</ul>
						<br>
					</div>
				</div>
			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#GDPRF-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="GDPRF-attendees" class="collapse panel-body-regsol">
						This module is suitable for most roles at most firms, whether data controllers or data processors, but particularly those roles which involve data protection obligations. It is recommended for Compliance Officers, Individual Intermediaries/Brokers, Principals, risk management personnel and others tasked with data protection roles particularly within financial services firms.
						<br><br>


					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/GDPR_Image.jpg">
				<br><br>
				<b>Typical duration :</b> Full Day
				<br>
				<?php
					echo courseDates("Data Protection Full Day");
				?>
			</div>
		</div>
		<br-->
		
		<!--GDPR Essentials-->
		<div id="GDPR" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Data Protection Essentials (2hr)</h2>
				The General Data Protection Regulations became law on 25th May 2018, as did the Irish Data Protection Amendment Act 2018. The Data Protection Commission has since produced 3 annual reports. 2020 presented the first fine imposed by the DPC and multiple warnings around data security in the midst of a pandemic. 
				<br><br>
				Our 2 hour Data Protection (GDPR) session aims to provide an overview of the requirements and relevant updates in this area. 
				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#gdpr-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="gdpr-content" class="collapse panel-body-regsol">
										
						<b>Topics covered :</b>
						<ul>
							<li>Overview of GDPR</li>
							<li>Updates on GDPR implementation</li>
							<li>Practical points for Compliance</li>
							<li>Relevant Case Studies</li>
						</ul>
						<br>
					</div>
				</div>
			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#gdpr-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="gdpr-attendees" class="collapse panel-body-regsol">
						This module is suitable for most roles at firms which involve data protection obligations. It is recommended for Compliance Officers, Individual Intermediaries/Brokers, Principals, risk management personnel and others who require a general understanding of Irish Data Protection requirements.			
						</ul>
						<br>
					</div>
				</div>		
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/GDPR_download.png">
				<br><br>
				<b>Typical duration :</b> 2 hours
				<br>
				<?php
					echo courseDates("Data Protection Essentials (2Hr)");
				?>
			</div>
		</div>
		<br>
		
		<!--Ethics-->
		<div id="Ethics" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Ethics for Financial Services</h2>
				While persons working within regulated sectors are often inundated with requirements and rules, ethical approaches to business often offers a buffer to prevent non-compliance. As such, many regulators and industry bodies require that persons operating within certain sectors to undertake mandatory ethics training on an annual basis.
				<br><br>
				This 1 hour module is primarily designed for Financial Services personnel to comply with Minimum Competency Code and Regulations requirements as set by the Central Bank of Ireland.  

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#ethics-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="ethics-content" class="collapse panel-body-regsol">			
						
						<b>Topics covered : </b>
						<ul>
							<li>What is Ethics?</li>
							<li>Universal Ethical Principles</li>
							<li>Case Studies – Good and Bad Examples</li>
							<li>Central Bank of Ireland approach to Ethics:
								<ul><li>Fitness and Probity</li>
									<li>Whistle-blowing</li>
								</ul>
							</li>
						</ul>
						<br>
					</div>
				</div>			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#ethics-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="ethics-attendees" class="collapse panel-body-regsol">
						This module is recommended for Individual Intermediaries/Brokers, Principals, PCF Role Holders, and others who have a CPD requirement to complete an Ethics module as part of their overall CPD requirements.
						<br>
					</div>
				</div>
				<br>&emsp;<a href="#INDEX">Back to Index</a>				
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/Ethics.jpg">
				<br><br>
				<b>Typical duration :</b> 1 hour
				<br>
				<?php
					echo courseDates("Ethics");
				?>
			</div>
		</div>
		<br>
		
		<!--IDR>
		<div id="IDR" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Insurance Distribution Regulations (IDR)</h2>
				The Insurance Distribution Regulations became law on 1st October 2018. The regulations repealed the Insurance Mediation Regulations and transposed the Insurance Distribution Directive into Irish law. 
				<br><br>
				This half day course is designed to explore the provisions of IDR and facilitate greater understanding of the interplay of these regulations with other requirements in the context of pre-existing regulatory requirements.   

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#IDR-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="IDR-content" class="collapse panel-body-regsol">			
						<b>Topics Covered:</b>
						<ul><li>Knowledge and Competency requirements for Insurance Distributors and interaction with the Minimum Competency Code and Regulations</li>
							<li>Required procedures:
								<ul><li>Requirement for Due Diligence process for Employees and the appointment of other Intermediaries</li>
									<li>Premium Account control procedures</li>
									<li>Complaints Handling procedures</li>
									<li>Requirement for Remuneration Policy</li>
								</ul>
							</li>							
							<li>Provision of Information:
								<ul><li>Compliant Terms of Business</li>
									<li>Statement of Demands and Needs</li>
									<li>Insurance Product Information Document (IPID)</li>
								</ul>
							</li>
							<li>How the requirements relate to the Consumer Protection Code</li>
						</ul>
						<br>
					</div>
				</div>			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#IDR-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="IDR-attendees" class="collapse panel-body-regsol">
						The course is designed primarily for persons working in the Insurance Sector in Ireland such as Compliance Officers and individual Insurance Brokers, it will also provide insight for those interested to understand how insurance intermediary services are regulated in Ireland by the Central Bank of Ireland.  
						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>				
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/IDR.jpg">
				<br><br>
				<b>Typical duration :</b> Half day
				<br>
				<?php
					echo courseDates("Insurance Distribution Regulation");
				?>
			</div>
		</div>
		<br-->
		
		<!--Risk-based Compliance-->
		<div id="RBC" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Risk-Based Compliance</h2>
				Risk Based Compliance is an approach that ensures resources are spread proportionately relative to your company’s compliance risk - the higher the risk, the greater the levels of monitoring and action.  For regulated entities in Ireland, use of this framework is a fundamental Central Bank expectation.  
				<br><br>
				Our half day workshop provides Compliance Officers in particular with the tools to enable you to establish, document and implement a risk-based approach in your firm.

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#RBC-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="RBC-content" class="collapse panel-body-regsol">			
						<br>
						<b>Topics covered : </b>
						<ul><li>Central Bank of Ireland expectations</li>
							<li>The Regulatory Context</li>
							<li>How to create a Compliance Risk Universe</li>
							<li>The benefits of a Risk Based approach</li>
							<li>Practical points for compliance
								<ul><li>Compliance Framework</li>
									<li>Relevant Documents</li>
									<li>Approaches to Testing</li>
									<li>Reporting</li>
								</ul>
							</li>
						</ul>
						<br>
					</div>
				</div>			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#RBC-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="RBC-attendees" class="collapse panel-body-regsol">
						This module is suitable for most roles at firms within the Financial Services sector which have regulatory compliance obligations. It is recommended for Compliance Officers, Individual Intermediaries/Brokers, PCF Role Holders especially Head of Compliance (PCF12 & PCF15), Risk management and other personnel.
					
						<br>
					</div>
				</div>		
				<br>&emsp;<a href="#INDEX">Back to Index</a>				
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/Risk_Image.jpg">
				<br><br>
				<b>Typical duration :</b> Half day
				<br>
				<?php
					echo courseDates("Risk-Based Compliance");
				?>
			</div>
		</div>
		<br>

		<!--Consumer Protection Code-->
		<div id="CPC" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Consumer Protection Code</h2>
				On the 1st of January 2012 the revised Consumer Protection Code (the Code) came into effect which sets out the requirements that regulated entities must comply with when dealing with consumers.
				<br><br>
				A number of addendum’s have been made to the code since then to keep up with the changes with respect to new regulated sectors, changes in European legislation (e.g. MiFID II) and Central Bank consultations (e.g. CP116).
				<br><br>
				This half day course will provide attendees with a full understanding of the code and how it can be implemented within their own firms.
				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#CPC-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="CPC-content" class="collapse panel-body-regsol">			
						<b>Topics covered :</b>
						<ul>
							<li>General Principles & Governance</li>
							<li>General Requirements
								<ul>
									<li>Restrictions</li>
									<li>Conflicts of Interest</li>
									<li>Contact with Customers</li>
									<li>Premium Handling</li>
									<li>Product producer responsibilities</li>
								</ul>
							</li>
							<li>Provision of Information</li>
							<li>Knowing the consumer and suitability requirements</li>
							<li>Post-sale information</li>
							<li>Rebates and Claims processing</li>
							<li>Arrears</li>
							<li>Advertising</li>
							<li>Errors and Complaints resolution</li>
							<li>Records and Compliance</li>	
						</ul>
						
						

						
						<br>
					</div>
				</div>			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#CPC-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="CPC-attendees" class="collapse panel-body-regsol">
						Staff and management working in customer facing, compliance, product development, premium handling, claims management and marketing roles within CBI regulated firms who deal with customers in the state that fall within the definition of consumer.
						<br><br>
						<b>Relevant Firms:</b> Credit institutions, insurance undertakings, investment business firms, investment intermediaries, insurance intermediaries, mortgage intermediaries, payment institutions, electronic money institutions, debt management firms and credit servicers.
				
						<br>
					</div>
				</div>		
				<br>&emsp;<a href="#INDEX">Back to Index</a>				
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/CPC.PNG">
				<br><br>
				<b>Typical duration :</b> Half day
				<br>
				<?php
					echo courseDates("Consumer Protection Code");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--Directors' Duties-->
		<div id="Dir" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Directors' Duties</h2>
				The Companies Act 2014 not only consolidated existing company law legislation but also represented the first time in Irish Law that Directors’ Duties were set out in one place. The Act incorporates a number of long-established fiduciary duties.  It is important that any person taking up or fulfilling a directorship in an Irish established entity is familiar with these duties. 
				<br><br>
				Our half day Directors’ Duties course aims to give you an understanding of the range of duties covered and enable you to comply with your obligations. 

				<br><br>
				
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#Dir-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="Dir-content" class="collapse panel-body-regsol">			
						<b>Topics covered :</b>
						<ul><li>Overview of the Companies Act 2014</li>
							<li>Directors' Duties</li>
							<ul>
								<li>Remuneration</li>
								<li>Interests of Employees</li>
								<li>Compliance Statements</li>
								<li>Financial Statements</li>
								<li>Fiduciary Duties</li>
								<li>Other Interests</li>
								<li>Account and Indemnify</li>
							</ul>							
							<li>Consequences of breaches</li>
						</ul>
						<br>
					</div>
				</div>			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#Dir-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="Dir-attendees" class="collapse panel-body-regsol">
						Any person taking up or currently performing a Director role in an Irish company or considering same. It may also be suitable for Company Secretaries or those tasked with advising or assessing Directors in their roles.   
						<br><br>						
					</div>
				</div>		
				<br>&emsp;<a href="#INDEX">Back to Index</a>				
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/DD.jpg">
				<br><br>
				<b>Typical duration :</b> Half day
				<br>
				<?php
					echo courseDates("Director's Duties");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--Fitness and Probity-->
		<div id="FAP" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Fitness and Probity</h2>
				In this module we examine the Central Bank of Ireland's Fitness and Probity requirements including Minimum Competency.  This is a very topical and ever evolving area.  In 2020 there were further additions to the list of Pre-Approval Function (PCF roles) and a second Dear CEO letter from the Central Bank of Ireland, in November 2020, highlighting weaknesses in firms’ compliance with the regime.    
				<br><br>
				It is important that all regulated entities have robust Fitness and Probity frameworks in place. This half day course is designed to assist relevant personnel in establishing, improving and implementing processes that effectively address the fitness and probity requirements of the Central Bank of Ireland.
				
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#FAP-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="FAP-content" class="collapse panel-body-regsol">			
						<b>Topics covered : </b>
						<ul><li>Sources of Obligations</li>
							<li>The Fitness and Probity Requirement</li>
							<li>Controlled Functions and PCF’s</li>
							<li>The Fitness and Probity Standards</li>
							<ul><li>Competence & Capability</li>
								<li>Honesty, Ethics & Integrity</li>
								<li>Financial Soundness</li>
							</ul>
							<li>The Minimum Competency Code and Regulations</li>
							<ul><li>Qualifications</li>
								<li>CPD</li>
							</ul>
							<li>Practical Compliance</li>

						</ul>
						<br>
					</div>
				</div>			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#FAP-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="FAP-attendees" class="collapse panel-body-regsol">
						This module is primarily designed for Financial Services personnel to comply with Fitness and Probity and Minimum Competency requirements as set by the Central Bank of Ireland. 
						<br><br>
						It is recommended for Individual Intermediaries/Brokers, Principals/ Directors, PCF Role Holders, Compliance and Risk officers, HR personnel, company secretaries, and others.

						<br><br>						
					</div>
				</div>		
				<br>&emsp;<a href="#INDEX">Back to Index</a>				
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/Fitness_Probity.JPG">
				<br><br>
				<b>Typical duration :</b> Half day
				<br>
				<?php
					echo courseDates("Fitness and Probity (including MCC)");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--MLRO Duties-->
		<div id="MLRO" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">MLRO Duties</h2>
				The Money Laundering Reporting Office (MLRO) can play a critical role within designated person entities especially with respect to the reporting of suspicious transactions and activity. Sometimes the MLRO may be expected to establish, implement, and monitor an effective AML/CFT system and is given significant responsibility as a result.  
				<br><br>
				This half day course has been created to allow attendees to gain a better understanding of the role of the MLRO, the relevant legal requirements and practical points to consider.

				
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#MLRO-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="MLRO-content" class="collapse panel-body-regsol">			
						<b>Topics covered :</b>
						<ul><li>What is an MLRO?</li>
							<li>AML/CFT Duties and Obligations</li>							
							<ul><li>Best Practice: Governance, Board Reporting, Risk Assessment, Policies and </li>
								<li>Procedures, Record-Keeping, Ongoing Monitoring, Training and Sanctions</li>
							</ul>
							<li>MLRO Expertise</li>
							<ul><li>Anti-Money Laundering / Counter Terrorist Financing Laws and Trends</li>
							</ul>
							<li>Suspicious Activity / Transaction Reporting</li>
							<ul><li>Identification of Red Flags</li>
								<li>Ideal Internal reporting processes and procedures</li>
								<li>Tipping off</li>
							</ul>
						</ul>
						<br>
					</div>
				</div>			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#MLRO-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="MLRO-attendees" class="collapse panel-body-regsol">
						This module is recommended for Money Laundering Reporting Officers, those wishing or about to take up such a role, or those tasked with resourcing or monitoring the MLRO role such as Directors, Managers, Heads of Function, etc..
						<br><br>						
					</div>
				</div>		
				<br>&emsp;<a href="#INDEX">Back to Index</a>				
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/MLRO.jpg">
				<br><br>
				<b>Typical duration :</b> Half day
				<br>
				<?php
					echo courseDates("MLRO Duties");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--CCMA>
		<div id="CCMA" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Code of Conduct on Mortgage Arrears</h2>
				The Covid-19 Pandemic has impacted on the ability of countless families to be able to pay their household bills. Despite temporary payment breaks for Mortgages, there will be numerous mortgage holders facing into arrears at the latter end of 2020 and the CCMA is very likely to come into sharper focus again.  
				<br><br>
				This half day course will serve to refresh the minds of those familiar with mortgage business while also giving attendees new to the area a full understanding of the Code. 

				<br><br>
				
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#CCMA-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="CCMA-content" class="collapse panel-body-regsol">			
						<b>Topics covered :</b>
		
						<ul><li>Mortgage Arrears Resolution Process (MARP)</li>
							<li>The role of the Arrears Support Unit (ASU)</li>								
							<li>Alternative Repayment Arrangements</li>							
							<li>Meaning of ‘Not Co-operating’</li>
							<li>Provision of Information</li>
							<li>Complaints resolution</li>
							<li>Records and Compliance</li>
							<li>Relevant enforcement action</li>
							
						</ul>
						<br>
					</div>
				</div>			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#CCMA-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="CCMA-attendees" class="collapse panel-body-regsol">
						Staff and management working in arrears handling roles or functions within firms that provide or service mortgages to individuals in Ireland.
						<br><br>
						<b>Relevant Firms:</b> Credit institutions, mortgage intermediaries, retail credit firms, debt management firms and credit servicers.


						<br><br>						
					</div>
				</div>		
				<br>&emsp;<a href="#INDEX">Back to Index</a>				
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/CCMA.jpg">
				<br><br>
				<b>Typical duration :</b> Half day
				<br>
				<?php
					echo courseDates("Code of Conduct on Mortgage Arrears");
				?>
			</div>
		</div>
		<br-->
		<!--END COURSE SECTION-->
		
		<!--CICA>
		<div id="CICA" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Consumer Insurance Contracts Act</h2>
				On the 2nd September 2020, certain provisions of the Consumer Insurance Contracts Act came into effect with more to take effect on 1st September 2021.
				<br><br>
				This 2hr course will provide attendees with an understanding of the key changes the provisions brought in and what steps are required to implement them.

				<br><br>
				
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#CICA-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="CICA-content" class="collapse panel-body-regsol">			
						<br>

						<ul><li>Provisions effective 2020</li>
							<ul><li>Insurable Interest</li>
								<li>Cooling Off periods</li>
								<li>Alteration of Risk Clauses</li>
								<li>Claims Handling</li>
								<li>Suspensive Conditions</li>
								<li>Third Party Rights</li>								
							</ul>
							<li>Provisions effective 2021</li>	
							<ul><li>Material facts replaced</li>
								<li>Remedies for Misrepresentation</li>
								<li>Information and Duties at Renewal</li>								
							</ul>							
						</ul>
						<br>
					</div>
				</div>			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#CICA-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="CICA-attendees" class="collapse panel-body-regsol">
						Staff and management working in the Insurance Sector - customer facing, compliance, product development, premium handling, claims management and marketing roles within firms that deal with customers in the state that fall within the definition of consumer.
						<br><br>
						<b>Relevant Firms:</b> Insurance undertakings, insurance intermediaries, mortgage intermediaries.


						<br><br>						
					</div>
				</div>		
				<br>&emsp;<a href="#INDEX">Back to Index</a>				
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/MLRO.jpg">
				<br><br>
				<b>Typical duration :</b> Half day
				<br>
				<?php
					echo courseDates("Consumer Insurance Contracts Act");
				?>
			</div>
		</div>
		<br-->
		<!--END COURSE SECTION-->
		
		<!--CBI Inspections-->
		<div id="CBI" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Central Bank of Ireland: Enforcement Actions & Inspections (CBI)</h2>
				The Central Bank of Ireland, (CBI) as regulator and Competent Authority for regulated entities operating in the financial services sector in Ireland.  Under the Central Bank Act 1942, the Central Bank Reform Act 2010 and the Central Bank (Supervision and Enforcement) Act 2013, the CBI may take action against any regulated entity that is in breach of the obligations that are associated with its authorisation.  As the competent authority for supervision of regulated entities, the CBI will have an ongoing relationship with the entities that it regulates.  The PRISM (Probability Risk Impact SysteM) system used by the CBI ensures that the greater risk posed to the financial system by an entity, the greater the interaction that entity will have with the CBI.  This course will provide an insight into how the CBI conducts visits and what they expect and a framework or guidance for you/your firm on how to manage these interactions.
				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#CBI-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="CBI-content" class="collapse panel-body-regsol">			
						<b>Topics covered :</b>
						<ul>
							<li>Central Bank of Ireland</li>
							    <ul><li>Basis for enforcement actions</li>
								<li>Administrative Sanctions regime</li>
								<li>Themed inspections</li>
								<li>Day to day interactions with CBI</li>
								<li>Dawn Raids</li>
							    <ul>
							<li>Review of enforcement actions and prohibition notices (sample of these)</li>
							<li>Results of Inspections: how these are communicated</li>
							    <ul><li>Press Releases</li>
								<li>Dear CEO Letters</li>
						</ul>
						<br>
					</div>
				</div>			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#CBI-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="CBI-attendees" class="collapse panel-body-regsol">
						Management and Directors with compliance responsibilities and who may be nominated by their employer as a point of contact with the Central Bank.  Legal personnel. MLRO and any other senior management.
						<br><br>
						<b>Relevant Firms:</b> credit and financial institutions, credit unions, money lenders, insurance undertakings and intermediaries, investment firms (IIA and MiFID), fund managers and administrators, trust or company service providers, estate agents, legal professionals, virtual asset services providers or those working with cryptocurrencies, leasing companies, etc.
						<br><br>						
					</div>
				</div>		
				<br>&emsp;<a href="#INDEX">Back to Index</a>				
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/DD.jpg">
				<br><br>
				<b>Typical duration :</b> Half day
				<br>
				<?php
					echo courseDates("CBI Enforcement Actions & Inspections");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--Treating Customers Fairly-->
		<div id="TCF" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Treating Customers Fairly (TCF)</h2>
				Consumer Protection is a key area of focus for the Central Bank of Ireland.  In addition to the Central Bank, both the Competition for Consumer Protection Commission and the Financial Services and Pensions Ombudsman also have roles to play in this area.  This course focuses on the obligations imposed on individuals and firms within the financial services sector and explores relevant concepts to be able to demonstrate that your firm is treating customers fairly.  
				<br><br>
				
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#TCF-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="TCF-content" class="collapse panel-body-regsol">
						<br>Topics covered :
						<ul>
							<li>General TCF principles</li>
							<li>Relevant Consumer Protection Code provisions including:</li>
							    <ul><li>Conflicts of Interest</li>
								<li>Customer Contact</li>
								<li>Product suitablity</li>
								<li>Post Sales processes</li>
								<li>Advertising</li>
								<li>Compliants Handling</li>
								<li>Errors Resolution</li>
							    <ul>
							<li>The role of the Consumer Protection Commission</li>
							    <ul><li>Customer charter</li>
							    <ul>
							<li>Financial Services and Pensions Ombudsman</li>
							    <ul><li>Complints Process</li>
								<li>Reports</li>
							<li>Relevant Case Studies / Enforcement Actions</li>
						</ul>
						<br>
					</div>
				</div>
			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#TCF-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="TCF-attendees" class="collapse panel-body-regsol">
						This course is designed for persons working in customer facing roles and those involved in managing customer services and complaints processes. In particular, customer service/customer relationship staff, managers, complaints adjudicators (CF8), compliance staff, and others.
						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/TCF_RegSol.jpg">
				<br><br>
				<b>Typical duration :</b> Half day
				<br>
				<?php
					echo courseDates("Treating Customers Fairly");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--Whistleblowing-->
		<div id="whistle" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Whistleblowing</h2>
				All financial service providers are required to have a policy or channel in place that allows employees to raise issues of concern with respect to non-compliance with financial services legislation without fear of retaliation from their employer.  In addition, the Protected Disclosures Act, which applies to all commercial entities, was recently amended to transpose the European Whistleblowing Directive into Irish law.
				<br><br>
				This 2 hour session looks at the relevant legal and regulatory requirements while delving into some practical examples. 

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#whistle-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="whistle-content" class="collapse panel-body-regsol">
						<br>Topics covered :
						<ul>
							<li>Central Bank (Supervision and Enforcement) Act 2013</li>
							<li>Protected Disclosure Act 2014 as amended</li>
							<li>Whistleblowing Directive 2019</li>
							<li>CBI Dear CEO letter </li>
							<li>Practical Examples of whistleblowing</li>
							<li>Practical tips on how to comply</li>
						</ul>
						<br>
					</div>
				</div>
			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#whistle-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="whistle-attendees" class="collapse panel-body-regsol">
						This course is suitable for most roles at firms within the Financial Services sector.  It is recommended for Compliance Officers, Individual Intermediaries/Brokers, PCF Role Holders, HR professionals and others. 
						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/whistle.avif">
				<br><br>
				<b>Typical duration :</b> 2 hours
				<br>
				<?php
					echo courseDates("Whistleblowing");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--Market Abuse-->
		<div id="market" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Market Abuse</h2>
				Various pieces of legislation seek to ensure the orderly and fair operation of financial markets. In Europe the Market Abuse Directive and associated Market Abuse Regulations are the primary sources of rules which attempt to minimise the risk of Market Abuse. 
				<br><br>
				This 2 hour course, targeted at individuals working within relevant regulated sectors in Ireland, is designed to inform you as to your obligations around the management of insider information, identification of market abuse activities and the reporting of suspicions around potential market abuse. 

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#market-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="market-content" class="collapse panel-body-regsol">
						<br>Topics covered :
						<ul>
							<li>What is Market Abuse?</li>
							<li>Relevant Legislation, Regulation and Guidance</li>
							<li>Prohibited behaviours such as Market Manipulation and Insider Trading / Insider Dealing</li>
							<li>The need for Trade Surveillance systems</li>
							<li>Reporting Obligations – Suspicious Transaction & Order Reports (STORs)</li>
							<li>Central Bank of Ireland supervision including Dear CEO letters and Enforcement Actions  </li>
						</ul>
						<br>
					</div>
				</div>
			
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#market-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="market-attendees" class="collapse panel-body-regsol">
						All individuals working within the regulated financial markets – employees of all market participant firms such as MiFID firms, platform operators, and other regulated entities arranging or executing transactions in financial instruments. This course is suitable for individuals in various roles such Financial advisors, stock brokers, compliance personnel, etc.  
						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/market_abuse.jpg">
				<br><br>
				<b>Typical duration :</b> 2 hours
				<br>
				<?php
					echo courseDates("Market Abuse");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
				
		<!--ESG-->
		<div id="ESG" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Environmental, Social and Governance (ESG)</h2>
				This course aims to provide a practical guide to ESG and what it means for your business.
				<br><br>
				ESG performance is increasingly critical for businesses that are under scrutiny from a wide range of stakeholders, including clients, investors, regulators and employees. Regulated
				entities will have to consider changing their business models to take account of the risks and
				opportunities posed by climate change while at the same time responding to reputational
				and regulatory risks.
				<br><br>
				Participants will learn how to better understand the role of businesses in tackling
				climate change. The course will cover a summary of key EU and industry developments in ESG matters
				relating to the financial services sector and the Central Bank’s supervisory
				expectations of regulated firms regarding Climate Change and ESG issues.

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#esg-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="esg-content" class="collapse panel-body-regsol">
						<br>Our 2 hour (Environmental, Social and Governance) session includes :
						<ul>							
							<li>Overview of the EU Sustainability Legislation:</li>
								<ul>
									<li>EU Taxonomy</li>
									<li>Sustainable Finance Disclosure Regulation (SFDR) Level 1 &amp; 2</li>
									<li>Insurance Distribution Directive (IDD)</li>
								</ul>
							<li>Overview of Central Bank’s Expectations</li>
							<li>How to demonstrate compliance with the Sustainability Legislation </li>
						</ul>
						<br>
					</div>
				</div>
					
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#esg-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="esg-attendees" class="collapse panel-body-regsol">
						This course is suitable for most roles at firms within the Financial Services sector. It is recommended for Compliance Officers, Individual Intermediaries/Brokers, PCF Role Holders and others.
						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/ESG.jpg">
				<br><br>
				<b>Typical duration :</b> 2 hours
				<br>
				<?php
					echo courseDates("ESG");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--IAF-->
		<div id="IAF" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Individual Accountability Framework (IAF) </h2>
				The introduction of the new Individual Accountability Framework (IAF) confers powers on the Central Bank of Ireland to strengthen and promote greater accountability, good conduct and high-quality governance and culture among regulated firms and their management/employees.
				<br><br>
				This course focuses primarily on the IAF reforms to the Fitness and Probity (F&P) regime and Enforcement processes as well as the introduction of Common Conduct Standards (for all individuals within the F&P regime), Additional Conduct Standards (for certain senior individuals) and Business Conduct Standards, each of which applies to all regulated firms.
				<br><br>
				As these reforms are applicable from 29th December 2023, time is of the essence to understand how the IAF framework should be embedded in the firm and for staff to meet legislative obligations to ensure their conduct and performance standards align with regulatory expectations.

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#IAF-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="IAF-content" class="collapse panel-body-regsol">
						<br>This session includes :
						<ul>	
							<li>Overview of the IAF</li>
							<li>The Legal Framework and Central Bank Guidance</li>
							<li>The Conduct Standards including the Additional Conduct Standards and the Duty to Take Reasonable Steps</li>
							<li>Enhancements to the Fitness & Probity (F&P) Regime</li>
							<li>Strengthening of the Administrative Sanctions Procedure (ASP)</li>
							<li>Next Steps to embed IAF in the Firm</li>		
							
						</ul>
						<br>
					</div>
				</div>
					
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#IAF-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="IAF-attendees" class="collapse panel-body-regsol">
						This course is designed for those working in regulated financial service providers in Ireland.
						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/IAF.png">
				<br><br>
				<b>Typical duration :</b> Half-day
				<br>
				<?php
					echo courseDates("IAF");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--DORA-->
		<div id="DORA" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Digital Operations Resilience Act (DORA) </h2>
				On 27 December 2022, the Digital Operations Resilience Act (DORA) was published in the Official Journal of the EU. This includes a Regulation and a Directive on digital operational resilience for the financial sector. This Regulation is now in force and will apply in full from January 2025.
				<br><br>
				DORA applies to a wide range of financial entities regulated by the Central Bank of Ireland. For the first time, DORA brings together provisions addressing digital operational risk in the financial sector in a consistent manner in one single legislative act.
				
				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#DORA-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="DORA-content" class="collapse panel-body-regsol">
						<br>This session includes :
						<ul>	
							<li>What is DORA?</li>
							<li>ICT Risk Management</li>
							<li>ICT incident related incident management, classification and reporting</li>
							<li>Digital Operational Resilience Testing</li>
							<li>ICT Third Party Risk</li>
							<li>Information Sharing Arrangements</li>
							<li>Role of the Board</li>
						</ul>
						<br>
					</div>
				</div>
					
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#DORA-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="DORA-attendees" class="collapse panel-body-regsol">
						This module is suitable for Compliance Officers, Risk Management Personnel and IT Personnel in all Regulated Financial Service Providers.
						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/Dora.png">
				<br><br>
				<b>Typical duration :</b> Half-day
				<br>
				<?php
					echo courseDates("DORA");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--FINANCIAL CRIME-->
		<div id="Crime" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Financial Crime </h2>
				Brokers who only provide General Insurance services are not captured by the definition of Designated Person within the Criminal Justice (Money Laundering &amp; Terrorist Financing) Act 2010 but that does not mean that such brokers are immune from financial crime.
				<br><br>
				This CPD session aims to address the risk of money laundering and other criminal offences while also looking at other sources of legal obligations with respect to financial crime that arise for brokers/financial advisors.

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#Crime-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="Crime-content" class="collapse panel-body-regsol">
						<br>This session includes :
						<ul>

							<li>Ireland’s AML Regime</li>
							<li>Conducting Due Diligence</li>
							<li>Financial Sanctions</li>
							<li>Anti-Bribery &amp; Corruption</li>
							<li>Practical points for compliance</li>
							<li>Relevant Enforcement Action</li>
						
							
						</ul>
						<br>
					</div>
				</div>
					
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#Crime-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="Crime-attendees" class="collapse panel-body-regsol">
						This module is suitable for all Financial Brokers but is directed towards those advisors who only provide general insurance products/services.
						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/Crime.jpg">
				<br><br>
				<b>Typical duration :</b> Half-day
				<br>
				<?php
					echo courseDates("Crime");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--OUTSOURCING-->
		<div id="Outsourcing" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Outsourcing </h2>
				Outsourcing has long been a priority of the Central Bank of Ireland. The CBI states that it is strongly focused on outsourcing due to its increasing prevalence across the financial services sector and its potential, if not effectively managed, to threaten the operational resilience of regulated firms and the Irish financial system. The CBI expects all regulated firms to be in a position to demonstrate that they have appropriate measures in place to effectively govern and manage outsourcing risk and to ensure compliance with the sectoral legislation, regulations and guidance applicable to their business. 
				
				<br><br>Following the publication of the Cross-Industry Guidance on Outsourcing, this course is designed to give you an overview of this Guidance along with other relevant legislative guidance on Outsourcing across the Financial Industry.

				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#Outsourcing-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="Outsourcing-content" class="collapse panel-body-regsol">
						<br>This session includes :
						<ul>

							<li>Management of Outsourcing Risk</li>
							<li>Assessment of Criticality or Importance of Outsourced Actvity</li>
							<li>Intragroup Arrangements</li>
							<li>Outsourcing & Delegation</li>
							<li>Governance, Strategy & Policy</li>
							<li>Risk Assessment and Management</li>
							<li>Due Diligence</li>
							<li>Contractual Arrangements</li>
							<li>Ongoing Monitoring</li>
							<li>Disaster Recovery & Business Continuity Management</li>
							<li>Reporting Requirements</li>
							<li>Outsourcing Register</li>
						
							
						</ul>
						<br>
					</div>
				</div>
					
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#Outsourcing-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="Outsourcing-attendees" class="collapse panel-body-regsol">
						The course is designed primarily for personnel in Regulated Financial Service firms who use outsourcing as part of their business model, Outsourcing Managers, Compliance Officers, Risk Management Personnel
						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/Outsourcing.jpg">
				<br><br>
				<b>Typical duration :</b> Half-day
				<br>
				<?php
					echo courseDates("Outsourcing");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--CRYPTO-->
		<div id="Crypto" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">Crypto Asset Regulation in Ireland </h2>
				Markets in Crypto-Assets (MiCA) Regulation was published in the Official Journal of the European Union on 9th June 2023. The Central Bank has commenced its preparation for the implementation of MiCA and has established a cross-sectoral team to integrate MiCA into the Central Bank’s supervisory and authorisation processes and methodologies. 
				
				<br><br>
				This 2 hour course is designed to give you an overview of the Regulation and expectations of Financial Service Providers.
				<br><br>
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol js-rotate-if-collapsed" data-toggle="collapse" data-target="#Crypto-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="Crypto-content" class="collapse panel-body-regsol">
						<br>This session covers the following topics :
						<ul>

							<li>What is MiCA?</li>
							<li>Who and what does MiCA apply to?</li>
							<li>Prudential Requirements</li>
							<li>Governance Requirements</li>
							<li>Conflicts of Interest and Complaints handling</li>
							<li>Capital Requirements</li>
							<li>Safekeeping Measures</li>
							<li>Environmental requirements</li>
							<li>Whitepaper Requirement</li>
							<li>Market Abuse</li>
							<li>Key Timelines</li>
													
						</ul>
						<br>
					</div>
				</div>
					
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#Crypto-attendees" aria-expanded="false">
						WHO SHOULD ATTEND?
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="Crypto-attendees" class="collapse panel-body-regsol">
						The course is designed primarily for persons working in the Crypto Asset Sector in Ireland, such as Compliance and Risk Officers.  
						<br>
					</div>
				</div>	
				<br>&emsp;<a href="#INDEX">Back to Index</a>
			</div>
			<div class="col-sm-4 col-sm-4 centered-column">
				<br>
				<img width="295px" src="images/training/Crypto.jpg">
				<br><br>
				<b>Typical duration :</b> Half-day
				<br>
				<?php
					echo courseDates("Crypto");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<br><br><br><br><br><br><br><br>
		
		
		<?php include 'footer.php';?>		

			
	</section>
	
	

	
	<?php include 'resize-menu.php';?>

   
</body>
</html>
