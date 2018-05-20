<html>
	<head>
		<title>RegSol - GDPR Questionnaire</title>
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
	<body class="contact">
	<?php

		if (isset($_REQUEST['staff_training'])) {

			/* Sanitize input. Trust *nothing* sent by the client. Escape your input: use htmlspecialchars to avoid most obvious XSS attacks.*/
			$staff_training=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['staff_training']);
			$staff_training=htmlspecialchars($staff_training);
			
			$dpo=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['dpo']);
			$dpo=htmlspecialchars($dpo);
			
			$popup_dpo = "notapplicable";
			if (isset($_REQUEST['popup_dpo'])) {
				$popup_dpo=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['popup_dpo']);
				$popup_dpo=htmlspecialchars($popup_dpo);
			}
			$audit=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['audit']);
			$audit=htmlspecialchars($audit);
			
			$register=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['register']);
			$register=htmlspecialchars($register);
			
			$gap_analysis=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['gap_analysis']);
			$gap_analysis=htmlspecialchars($gap_analysis);
			
			$privacy_notice=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['privacy_notice']);	
			$privacy_notice=htmlspecialchars($privacy_notice);
			
			$consent=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['consent']);
			$consent=htmlspecialchars($consent);
			
			$popup_consent = "notapplicable";
			if (isset($_REQUEST['popup_consent'])) {
				$popup_consent=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['popup_consent']);
				$popup_consent=htmlspecialchars($popup_consent);
			}
			
			$share=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['share']);
			$share=htmlspecialchars($share);
			
			$popup_share = "notapplicable";
			if (isset($_REQUEST['popup_share'])) {
				$popup_share=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['popup_share']);
				$popup_share=htmlspecialchars($popup_share);
			}
			
			$transferEU=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['transferEU']);
			$transferEU=htmlspecialchars($transferEU);
			
			$popup_transferEU = "notapplicable";
			if (isset($_REQUEST['popup_transferEU'])) {
				$popup_transferEU=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['popup_transferEU']);
				$popup_transferEU=htmlspecialchars($popup_transferEU);
			}
				
			$access_request=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['access_request']);
			$access_request=htmlspecialchars($access_request);
			
			$secure_measures=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['secure_measures']);
			$secure_measures=htmlspecialchars($secure_measures);
			
			
			// Define MySQL connection and credentials
			$pdo_dsn='mysql:dbname=regsol;host=localhost';
			$pdo_user='root';     
			$pdo_password='';  

			try {
				// Establish connection to database
				$conn = new PDO($pdo_dsn, $pdo_user, $pdo_password);

				// Throw exceptions in case of error.
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// Use prepared statements to mitigate SQL injection attacks.
				// See https://stackoverflow.com/questions/60174/how-can-i-prevent-sql-injection-in-php for more details
				$qry=$conn->prepare('INSERT INTO gdprresultsindex (ts) VALUES (now())');
				
				// Execute the prepared statement using user supplied data.
				$qry->execute();				
				
				$con1=mysqli_connect("localhost","root","","regsol");
				// Check connection
				if (mysqli_connect_errno()){
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();				  
				}
				
				//set index to max (risk of mixing results is minimal)
				$result = mysqli_query($con1,"select max(id) from GDPRResultsIndex");										
				if (!$result) {
					echo 'Could not run query: ' . mysql_error();
					exit;
				}
				$row = mysqli_fetch_row($result);
				$index = $row[0];				
				
				//insert questions and answers using index
				$qry=$conn->prepare("INSERT INTO GDPRResults (id, question, answer) values 
				($index, 'staff_training','$staff_training'),
				($index, 'dpo', '$dpo'),
				($index, 'popup_dpo', '$popup_dpo'),
				($index, 'audit','$audit'),
				($index, 'register','$register'),
				($index, 'gap_analysis','$gap_analysis'),
				($index, 'privacy_notice','$privacy_notice'),
				($index, 'consent','$consent'),
				($index, 'popup_consent','$popup_consent'),
				($index, 'share','$share'),
				($index, 'popup_share','$popup_share'),
				($index, 'transferEU','$transferEU'),
				($index, 'popup_transferEU','$popup_transferEU'),
				($index, 'access_request','$access_request'),
				($index, 'secure_measures','$secure_measures')");		
		
				$qry->execute();
			} catch (PDOException $e) {
				echo 'Error: ' . $e->getMessage() . " file: " . $e->getFile() . " line: " . $e->getLine();
				exit;
			} catch (Exception $e) {
				echo 'Error: ' . $e->getMessage() . " file: " . $e->getFile() . " line: " . $e->getLine();
				exit;
			}		

		} else {
			echo('User did not send any data to be saved!');
		}
	?>		
		<!--Produce report based on answers-->
		<div class="container">			
			<div align="middle" height="100px" class="col-md-5">
				<br><img height="46px" align="middle" src="images/logo_white_text.png">
			</div>
			<div class="col-md-5">	
				<h2>GDPR Response Analysis</h2>
			</div>
			<hr>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left">
				<?php if($staff_training=="formal") : ?>
					You have provided GDPR training, thats positive! To maintain compliance, it is recommended that you:
						<ul>
							<li>Provide induction training to new staff which includes data protection;</li>
							<li>Update all staff at regular intervals or when you changes occur to your policies and procedures or further changes to the law;</li>
						</ul>
					
				<?php elseif($staff_training=="informal") : ?>
					You have promoted GDPR awareness, which is positive! To ensure compliance going forward, it is recommended that you:
						<ul>
							<li>Provide induction training to new staff which includes data protection;</li>
							<li>Update all staff at regular intervals or when you changes occur to your policies and procedures or further changes to the law;</li>
							<li>Provide specialist training (online or in person) for staff with specific duties, such as marketing, information security and compliance.</li>
						</ul>
				<?php elseif($staff_training=="no") : ?>
					You have yet to provide GDPR training. It is recommended that:
						<ul>
							<li>All staff are made aware of the impact of GDPR (for example, via intranet articles, circulars, team briefings and posters);</li>
							<li>Online or In house training should be provided to ensure those with key decision making authority or specific duties such as compliance are fully aware of the obligations attaching to controllers and processors.</li>
						</ul>			
				<?php endif; ?>
			</div>
		</div>
				
		<div class="container">
			<div class="col-sm-12 text-left">						
				<?php if($dpo=="yes") { ?>
					You have a DPO. To ensure compliance:
						<ul>
							<li>Make sure the appointed individual is adequately qualified or trained;
							<li>ensure there are appropriate reporting mechanisms in place between the DPO and senior management;
							<li>register the details of your DPO with the DPC (when the relevant portal becomes active).
						</ul>

				<?php } elseif($dpo=="no") { ?>
					
					<?php if($popup_dpo=="yesneeded") { ?>
						You have determined your Firm needs a DPO. To ensure compliance:
						<ul>
							<li>You now have to appoint a DPO. Make sure the appointed individual is adequately qualified or trained;
							<li>ensure there are appropriate reporting mechanisms in place between the DPO and senior management;
							<li>register the details of your DPO with the DPC (when the relevant portal becomes active).
						</ul>

					<?php } elseif($popup_dpo=="yesnotneeded") { ?>
						You have determined your Firm does NOT need a DPO. To ensure ongoing compliance it is recommended that you:
						<ul>
							<li>designate responsibility for data protection compliance to a suitable individual or data champions within your Firm.
						</ul>

					<?php } elseif($dpo=="notassessed") { ?>
						You have yet to assess whether your Firm requires a DPO. It is recommended that: 
						<ul>
							<li>You document the internal analysis carried out to determine whether or not a DPO is to be appointed, unless it is obvious that your organisation is not required to designate a DPO.
							<li>This analysis should include consideration of factors such as the number of data subjects (i.e. how many customers, staff, etc.), the depth of processing (i.e. the amount of personal data processed) and the geographical reach of your processing operations.  
						</ul>
					<?php } ?>
				<?php } elseif($dpo=="unsure") { ?>
					<!-- figure it out-->
				<?php } ?>
			</div>
		</div>

		<div class="container">
			<div class="col-sm-12 text-left">
				<?php if($audit=="recently") { ?>
					You have had a Data Protection Audit conducted recently, which is positive. To ensure ongoing compliance, it is recommended:
					<ul>
							<li>That any identified gaps are being addressed. 
					</ul>

				<?php } elseif($audit=="notin12months") { ?>
					You have had a Data Protection audit in the past but not recently. It is recommended that: 
						<ul>
							<li>You organise an updated information audit across your business or within particular business areas to identify the data that you process and how it flows into, through and out of your business;
							<li>identify and document any gaps or risks that are identified.
						</ul>

				<?php } elseif($dpo=="no") { ?>
					You have yet to conduct a Data Protection Audit. It is recommended that:
					<ul>
							<li>You organise an information audit across your business or within particular business areas to identify the data that you process and how it flows into, through and out of your business;
							<li>ensure this is conducted by someone with in-depth knowledge of your working practices; and
							<li>identify and document any gaps or risks you find, for example in a risk register.
					</ul>

				<?php } ?>
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left">
				<?php if($register=="yes") { ?>
					You have created a Data Asset register/Data Inventory, which is positive. To ensure ongoing compliance it is recommended that:
					<ul>
							<li>The document is maintained as a living document and amendments made where changes to processes occur. 
					</ul>

				<?php } elseif($register=="no") { ?>
					You have yet to create a Data Asset register/Data Inventory. It is recommended that:
					<ul>
							<li>You create and maintain records of processing activities detailing what personal data you hold, where it came from, who you share it with and what you do with it. This will be specific to your firm’s processing activities. 
					</ul>
					This process should include:
					<ul>
							<li>identifying all the various types of data processing you carry out;
							<li>identifying the lawful basis for each processing activity; and
							<li>documenting it in your Data Asset register/Data Inventory – this can be a spreadsheet or other type of written or electronic record; and
							<li> Allowing the information to feed into your Privacy Notice/Statement.
					</ul>

				<?php } elseif($register=="unsure") { ?>
					You are unsure if you have a Data Asset register/Data Inventory. The following should be maintained - Records of processing activities detailing what personal data you hold, where it came from, who you share it with and what you do with it. This will be specific to your firm’s processing activities. 
					<br>This process should include:
					<ul>
							<li>identifying all the various types of data processing you carry out;
							<li>identifying the lawful basis for each processing activity; and
							<li>documenting it in your Data Asset register/Data Inventory – this can be a spreadsheet or other type of written or electronic record; and
							<li> Allowing the information to feed into your Privacy Notice/Statement.
					</ul>
				<?php } ?>
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left">
				<?php if($gap_analysis=="yes") { ?>
					You have conducted a Gap Analysis of your Data Protection Policy and Procedures, which is positive. To ensure ongoing compliance, it is recommended that you ensure any gaps identified have been filled and a procedure for review is in place.
					<br>
				<?php } elseif($gap_analysis=="no") { ?>
					You have yet to conduct a Gap Analysis of your Data Protection Policy and Procedures. It is recommended that:
					<ul>
							<li>You compare the current content of your Data Protection Policy and Procedures with the relevant content of the GDPR;
							<li>Identify any gaps i.e. relevant regulations that aren’t addressed especially new obligations and rights created by GDPR such as maintaining a record of processing activities or the right to data portability. 
							<li>Redraft your Data Protection Policy and Procedures document to address the gaps. 
					</ul>

				<?php } elseif($gap_analysis=="nopolicies") { ?>
					You do not currently have a Data Protection Policy or Procedures document. You should have a standalone policy statement or general staff policy that:
					<ul>
							<li>sets out your firm’s approach to data protection i.e. how it obtains, processes, retains, destroys personal data etc.  
							<li>responsibilities for implementing the policy and monitoring compliance;
							<li>is approved by management and is communicated to all staff; and
							<li>has a process for review and update at planned intervals or when required to ensure it remains relevant.
					</ul>

				<?php } ?>
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left">
				<?php if($privacy_notice=="yes") { ?>
					Your Privacy Notice and/or Privacy Statement has been updated, which is positive. To ensure ongoing compliance make sure they are easily located and relevant links are included in subsequent contacts with clients in particular to remind them of how you use their data. 
					<br>
				<?php } elseif($privacy_notice=="no") { ?>
					You have yet to update your Privacy Notice and/or Privacy Statement. It is recommended that they are reviewed and the following information included:
					<ul>
							<li>Adequate information to let individuals know who you are, 
							<li>All reasons for processing their data and the legal basis for each e.g. contractual, consent, legitimate interests, etc. 
							<li>Categories of third parties with whom you share their data with,
							<li>Any transfers of their data outside of the EU – state destination countries and the protections that attach to these transfers e.g. adequacy decision, model contractual clauses, etc.
							<li>Details of their Data Privacy rights such as access rights and how to request them. 
					</ul>

				<?php } elseif($privacy_notice=="nonotices") { ?>
					You do not currently have a Privacy Notice or Privacy Statement, it is recommended that you put one in place as soon as possible. A good Privacy Notice:
					<ul>
							<li>is concise and to the point;
							<li>is easy to understand;
							<li>is clearly signposted and easy to access;
							<li>is written in clear and plain language;
							<li>includes different information depending on whether you obtained the data directly from the individual or not; and
							<li>is reviewed regularly to make sure it remains accurate and up to date.            
					</ul>

					The Privacy Notice must contain the following:
					<ul>
							<li>Adequate information to let individuals know who you are, 
							<li>All reasons for processing their data and the legal basis for each e.g. contractual, consent, legitimate interests, etc. 
							<li>Categories of third parties with whom you share their data with,
							<li>Any transfers of their data outside of the EU – state destination countries and the protections that attach to these transfers e.g. adequacy decision, model contractual clauses, etc.
							<li>Details of their Data Privacy rights such as access rights and how to request them. 
					</ul>
			
				<?php } ?>
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left">
				<?php if($consent=="no") { ?>
					You do not rely on Consent which is positive provided you are not undertaking marketing activities or have a legitimate alternative legal basis.  
					<br><br>
				<?php } elseif($consent=="yes" or $consent=="sometimes") { ?>
					<?php if ($popup_consent=="yes") { ?>
					You rely on consent for marketing and it is properly documented, which is positive. To ensure ongoing compliance, it is recommended that you:
					<ul>
							<li>Regularly review consent to check that the relationship, processing and the purposes have not changed.
							<li>Have processes in place to refresh consent at appropriate intervals, including any parental consents.
							<li>Consider using privacy dashboards or other preference management tools as a matter of good practice.
							<li>Make it easy for individuals to withdraw their consent at any time and publicise how to do so.
							<li>Act on withdrawals of consent as soon as you can.
							<li>Don’t penalise individuals who wish to withdraw consent.
					</ul>

					<?php } elseif ($popup_consent=="no") { ?>
					You rely on consent for marketing but this consent is not documented. It is recommended that you immediately:
					<ul>
							<li>seek GDPR-compliant consent; or
							<li>stop the processing.
					</ul>
					If seeking consent:
					<ul>
							<li>Make the request for consent prominent and separate from your terms and conditions and use clear, plain language that is easy to understand.
							<li>Ask individuals to positively opt in.
							<li>Use unticked opt-in boxes or similar active opt-in methods.
							<li>Specify why you want the data and what you’re going to do with it.
							<li>Give granular options to allow individuals to consent separately to different types of processing wherever appropriate e.g. one opt-in for email marketing, one opt-in for text marketing. 
							<li>Name your business and any specific third party organisations who will rely on this consent.
							<li>Tell individuals they can withdraw consent at any time and how to do this.
							<li>Ensure that individuals can refuse to consent without detriment.
							<li>Don’t make consent a precondition of service.
					</ul>
					You should also:
					<ul>
							<li>Keep a record of when and how you got consent from the individual.
							<li>Keep a record of exactly what they are told at the time.
					</ul>

					<?php } elseif ($popup_consent="unsure") { ?>
					You rely on consent for marketing but are not sure you can demonstrate this consent. It is recommended that you:
					<ul>
							<li>seek fresh GDPR-compliant consent; or
							<li>stop the processing.
					</ul>
					If seeking fresh consent:
					<ul>
							<li>Make the request for consent prominent and separate from your terms and conditions.
							<li>Ask individuals to positively opt in.
							<li>Use unticked opt-in boxes or similar active opt-in methods.
							<li>Use clear, plain language that is easy to understand.
							<li>Specify why you want the data and what you’re going to do with it.
							<li>Give granular options to allow individuals to consent separately to different types of processing wherever appropriate.
							<li>Name your business and any specific third party organisations who will rely on this consent.
							<li>Tell individuals they can withdraw consent at any time and how to do this.
							<li>Ensure that individuals can refuse to consent without detriment.
							<li>Don’t make consent a precondition of service.
					</ul>
					You should also:
					<ul>
							<li>Keep a record of when and how you got consent from the individual.
							<li>Keep a record of exactly what they are told at the time.
					</ul>

				<?php 	}
					}
				?>
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left">
				<?php if($share=="no") { ?>
					You do not transfer or share data with third parties which is positive in terms of minimising risk to data you process. 
					<br><br>
				<?php } elseif($share=="no" or $share="sometimes") { ?>
					<?php if($popup_share=="yes") { ?>
						You may share data with 3rd Parties and you are happy the obligations of the controller and processor in the relationship properly set out in a written legal agreement which is positive. To ensure ongoing compliance, make sure:
						<ul>
							<li>All contracts establishing new 3rd party relationships have adequate protections in place regarding the protection of personal data.
							<li>All updated contracts retain relevant levels of protection going forward. 
						</ul>

					<?php } elseif($popup_share=="no") { ?>
						You may share data with 3rd Parties but the obligations of the controller and processor in the relationship are not properly set out in a written legal agreement. It is recommended that you:
						<ul>
							<li>ensure that you have a written contract in place whenever you use a processor (a natural or legal person or organisation which processes personal data on your behalf);
							<li>put contracts in place which include certain specific terms, as a minimum, to ensure that data processing meets the requirements of the GDPR;
							<li>outline in each contract the technical and organisational arrangements the processor must have in place;
							<li>include arrangements for security of processing, keeping records of processing activities, and notification of data breaches.
						</ul>

					<?php } elseif($popup_share=="unsure") { ?>
						You may share data with 3rd Parties but you are not sure that the obligations of the controller and processor in the relationship are properly set out in a written legal agreement. It is recommended that you:
						<ul>
							<li>check both new and existing contracts in force include certain specific terms, as a minimum, to ensure that data processing meets the requirements of the GDPR;
							<li>make sure the contract outlines the technical and organisational arrangements the processor must have in place;
							<li>make sure the contract includes arrangements for security of processing, keeping records of processing activities, and notification of data breaches.
						</ul>

					<?php } ?>
			
				<?php } ?>
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left">
				<?php if($transferEU=="no") { ?>
					You do not transfer data outside of the EU which is positive in terms of minimising risk to data you process. 
					<br><br>
				<?php } elseif($transferEU=="yes" or $transferEU=="sometimes") { ?>
					<?php if($popup_transferEU=="yes") { ?>
					Your company transfers data outside the EU and the legal basis for the transfer is recorded which is positive. To ensure ongoing compliance, it is recommended that:
					<ul>
							<li>Such transfers are regularly reviewed to ensure the legal basis remains appropriate and the security measures which protect the transfer remain robust. 
					</ul>

					<?php } elseif ($popup_transferEU="no") { ?>
					Your company transfers data outside the EU but you are not satisfied that the legal basis is recorded. It is recommended that all arrangements for transfer outside the EU of personal data are assessed and measures put in place to ensure:
					<ul>
							<li>that any data you transfer outside the EU complies with the conditions for transfer set out in Chapter V of the GDPR;
							<li>that you have adequate safeguards and data security in place, that it is documented in a written contract using standard data protection contract clauses OR you can record an EU adequacy decision applies to the destination country OR an alternative legal basis for transfer exists; and
							<li>that you can implement measures to audit any documented security arrangements on a periodic basis.
					</ul>

					<?php } elseif ($popup_transferEU="unsure") { ?>
					Your company transfers data outside the EU but you are not sure if the legal basis is recorded. It is recommended that all arrangements for transfer outside the EU of personal data are assessed to ensure:
					<ul>
							<li>that any data you transfer outside the EU complies with the conditions for transfer set out in Chapter V of the GDPR;
							<li>that you have adequate safeguards and data security in place, that it is documented in a written contract using standard data protection contract clauses OR you can record an EU adequacy decision applies to the destination country OR an alternative legal basis for transfer exists; and
							<li>that you can implement measures to audit any documented security arrangements on a periodic basis.
					</ul>

					<?php } ?>
					
				<?php } ?>
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left">
				<?php if($access_request=="yes") { ?>
					You are satisfied that your company has a process to ensure responses to Subject Access requests can be provided within the 1 month timeframe which is positive. To ensure ongoing compliance, it is recommended that:
					<ul>
							<li>All such requests are logged in a SAR log and timelines reviewed for any slippage on a regular basis. 
					</ul>

				<?php } elseif ($access_request=="no") { ?>
					Your company does not have a process to ensure Subject Access requests can be responded to within the 1 month timeframe. It is recommended that:
					<ul>
							<li>a process is put in place immediately to allow you to recognise and respond to any requests for personal data within the timescales;
							<li>include right of access procedures within your data protection policy;
							<li>provide awareness training to all staff and specialist training to individuals who deal with any requests; 
							<li>establish a policy on how to record any requests you receive verbally;
							<li>consider if you can provide remote access to a secure self-service system to provide the information directly to an individual in response to a request (this will not be appropriate for all organisations, but there are some sectors where this may work well).
					</ul>

				<?php } elseif ($access_request="maybe") { ?>
					You are not sure whether your company has a process to ensure responses to Subject Access requests can be provided within the 1 month timeframe. It is recommended that:
					<ul>
							<li>a process is put in place immediately to allow you to recognise and respond to any requests for personal data within the timescales;
							<li>include right of access procedures within your data protection policy;
							<li>provide awareness training to all staff and specialist training to individuals who deal with any requests; 
							<li>establish a policy on how to record any requests you receive verbally;
							<li>consider if you can provide remote access to a secure self-service system to provide the information directly to an individual in response to a request (this will not be appropriate for all organisations, but there are some sectors where this may work well).
					</ul>

				<?php } ?>
			</div>
		</div>
		
		<div class="container">
			<div class="col-sm-12 text-left">
				<?php if($secure_measures=="yes") { ?>
					You are satisfied that your company has appropriate technical and organisational measures in place to ensure personal data is kept safely and securely which is positive. To ensure continued compliance, it is recommended that regular reviews are undertaken to assess the robustness of these measures and additions or improvements made where necessary. 
					<br>
				<?php } elseif ($secure_measures=="no") { ?>
					You are not sure if your company has appropriate technical and organisational measures in place to ensure personal data is kept safely and securely. It is recommended that procedures are put in place to:
					<ul>
							<li>continually minimise the amount and type of data you collect, process and store, such as by undertaking regular information and internal process audits across appropriate areas of the business;
							<li>consider pseudonymising the personal data where appropriate to reduce concerns with data sharing and data retention;
							<li>regularly undertake reviews of your public-facing documents, policies and privacy notice(s) to ensure they meet the renewed transparency requirements under the GDPR;
							<li>ensure any current and/or new processes or systems enable you to comply with an individual’s rights under the GDPR; and
							<li>create, review and improve your data security features and controls on an ongoing basis.
					</ul>

				<?php } elseif ($secure_measures="maybe") { ?>
					You are not sure if your company has appropriate technical and organisational measures in place to ensure personal data is kept safely and securely. It is recommended that procedures are put in place to:
					<ul>
							<li>continually minimise the amount and type of data you collect, process and store, such as by undertaking regular information and internal process audits across appropriate areas of the business;
							<li>consider pseudonymising the personal data where appropriate to reduce concerns with data sharing and data retention;
							<li>regularly undertake reviews of your public-facing documents, policies and privacy notice(s) to ensure they meet the renewed transparency requirements under the GDPR;
							<li>ensure any current and/or new processes or systems enable you to comply with an individual’s rights under the GDPR; and
							<li>create, review and improve your data security features and controls on an ongoing basis.
					</ul>

				<?php } ?>
			</div>
		</div>
		<div class="container">
			<div class="col-sm-12 text-left">
			<p><br>RegSol are specialists in GDPR compliance. Please <a href="about.php#contact">contact us</a> if you would like assistance with any of the items above, or any other compliance concerns you may have.
			</div>
		</div>
		
				
		
	</body>
</html>