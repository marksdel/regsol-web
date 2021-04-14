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
    <div id="loading-screen" class="centered-column">
        <div class="spinner centered-column">
            <div class="loader"></div>
        </div>
    </div>
	
    <!-- NAVBAR -->
    <?php include 'menu.php';?>

	<!-- SECTION -->
	<section id="Courses" >
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
		
		<div class="container white-insert">	
			<div class="col-sm-12 text-left">	
				<h1> Training Courses</h1>			
				Please see below the courses that we provide via either <a href="public-training-schedule.php">public courses</a>, in-house delivery or e-learning modules. All content is tailored for the Irish market, for example Central Bank of Ireland implementation and interpretation.
				<br><br>	
				If you would like to discuss custom <a href="training.php">training solutions</a> (either online or in-person) please <a href="about.php#contact">contact us</a> and we will be happy to work with you regarding your requirements.
				<br><br>				
			</div>
		</div>
		<br>
		
		<!--INDEX-->
		<div id="INDEX" class="container  grey-insert">
			<div class="col-sm-1 centered-column">	
				&nbsp;
			</div>
			<div class="col-sm-6 ">	
				<h2 class="text-left">&emsp;Course Index</h2>
				<ul>
					<li><a href="#AMLF">Anti-Money Laundering / Counter-Terrorist Financing</a></li>
					<li><a href="#AMLU">Anti-Money Laundering Updates</a></li>
					<li><a href="#GDPRF">Data Protection Full Day</a></li>
					<li><a href="#GDPR">Data Protection Essentials (2hr)</a></li>
					<li><a href="#Ethics">Ethics for Financial Services</a></li>
					<li><a href="#IDR">Insurance Distribution Regulations (IDR)</a></li>
					<li><a href="#RBC">Risk-Based Compliance</a></li>
					<li><a href="#CPC">Consumer Protection Code (CPC)</a></li>
					<li><a href="#Dir">Directors' Duties</a></li>
					<li><a href="#FAP">Fitness & Probity</a></li>
					<li><a href="#MLRO">Duties of a Money Laundering Reporting Officer (MLRO)</a></li>	
					<li><a href="#CCMA">Code of Conduct on Mortgage Arrears (CCMA)</a></li>
					<li><a href="#CICA">Consumer Insurance Contracts Act (CICA)</a></li>
						
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
				The legal obligations imposed on designated persons (obliged entities) continue to evolve at a rapid pace, with the 6th EU AML Directive having now passed its transposition date and a European level Action Plan to be put in place in 2021. It is important that those entrusted with AML/CFT responsibilities have adequate and regular training to ensure knowledge is kept up to date and those new to functions have a broad understanding of the full AML/CFT regime. 
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
				While legislation to transpose the 5th EU AML Directive was approved by Dáil Éireann in December 2020, the 6th EU AML Directive remains to be transposed and a European Level Action Plan is expected to be put in place in 2021.
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
		
		<!--Data Protection Full Day-->
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
		<br>
		
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
		
		<!--IDR-->
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
		<br>
		
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
					echo courseDates("Fitness & Probity (inc MCC)");
				?>
			</div>
		</div>
		<br>
		<!--END COURSE SECTION-->
		
		<!--MLRO Duties-->
		<div id="MLRO" class="container white-insert">
			<div class="col-sm-8 col-sm-8 text-left ">	
				<h2 class="text-left">MLRO Duties</h2>
				The Money Laundering Reporting Office (MLRO) can play a critical role within designated person entities especially with respect to the reporting of suspicious transactions and activity. Sometimes the MLRO may be expected to establish, implement and monitor an effective AML/CFT system and is given significant responsibility as a result.
				<br><br>
				
				<div class="panel panel-default">
					<div style="cursor: pointer" class="panel-title-regsol" data-toggle="collapse" data-target="#MLRO-content" aria-expanded="false">
						COURSE CONTENT
						<span style="float:right" class="selectdiv js-rotate-if-collapsed"></span>						
					</div>
					<div id="MLRO-content" class="collapse panel-body-regsol">			
						<br>
						To gain a better understanding of the Role of the MLRO, we have created this half day training course which includes the following :
						<ul><li>What is an MLRO?</li>
							<li>AML/CFT Duties and Obligations</li>							
							<ul><li>Best Practice: Governance, Board Reporting, Risk Assessment, Policies and </li>
								<li>Procedures, Record-Keeping, Ongoing Monitoring, Training and Sanctions</li>
							</ul>
							<li>MLRO Expertise</li>
							<ul><li>Anti-Money Laundering / Counter Terrorist Financing Laws and Trends</li>
							</ul>
							<li>Suspicious Activity / Transaction Reporting</li>
							<ul><li>Identification of Red Flags, Ideal Internal reporting processes and procedures, Tipping off and key risk factors</li>
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
						This module is recommended for Money Laundering Reporting Officers, AML Staff, Compliance Staff and Senior Management that have Anti-Money Laundering / CTF duties.
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
		
		<!--CCMA-->
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
						<br>
		
						<ul><li>Mortgage Arrears Resolution Process (MARP)</li>
							<li>The role of the Arrears Support Unit (ASU)</li>								
							<li>Alternative Repayment Arrangements</li>							
							<li>Meaning of ‘Not Co-operating’</li>
							<li>Provision of Information</li>
							<li>Complaints resolution</li>
							<li>Records and Compliance</li>
							
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
						This module is recommended for staff and management working in arrears handling roles or functions within Firms that provide or service mortgages to individuals in Ireland.
						<br><br>
						Relevant Firms: Credit institutions, mortgage intermediaries, retail credit firms, debt management firms and credit servicers.

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
		<br>
		<!--END COURSE SECTION-->
		
		<!--CICA-->
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
						This module is recommended for staff and management working in arrears handling roles or functions within Firms that provide or service mortgages to individuals in Ireland.
						<br><br>
						Relevant Firms: Credit institutions, mortgage intermediaries, retail credit firms, debt management firms and credit servicers.

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
		<br>
		<!--END COURSE SECTION-->
		
		
		<br><br><br><br><br><br><br><br>
		
		
		<?php include 'footer.php';?>		

			
	</section>
	
	

	
	<?php include 'resize-menu.php';?>

   
</body>
</html>
