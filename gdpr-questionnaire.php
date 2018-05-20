<html>

	<script>
		function show(elementId) {
			document.getElementById(elementId).classList.remove('hide');
		}
		
		function hide(elementId) {
			document.getElementById(elementId).classList.add('hide');
		}
		
		function showQuestion(elementId) {
			show(elementId+'_question');
			show(elementId+'_answers');
			show(elementId+'_space');
			show(elementId+'_blanks');
		}
		function hideQuestion(elementId) {
			hide(elementId+'_question');
			hide(elementId+'_answers');
			hide(elementId+'_space');
			hide(elementId+'_blanks');
		}
			
	</script>
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
		<div class="container">			
			<div align="middle" height="100px" class="col-md-5">
				<br><img height="46px" align="middle" src="images/logo_white_text.png">
			</div>
			<div class="col-md-5">
				<h2>GDPR Questionnaire</h2>
			</div>
			<hr>
		</div>
		<div class="container">
			<div class="col-sm-3 text-right">
				<label for="name" > Name (optional)</label>
			</div>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="name" name="name" placeholder="Name">
			</div>
		</div>
		<div class="container text-right">
			<div class="col-sm-3">
				<label for="name"> Company (optional)</label>
			</div>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="company" name="company"  placeholder="Company">
			</div>
		</div>
		<br><br><br>
		
		<form class="form-horizontal" role="form" method="post" action="process-gdpr-questionnaire.php">
			<div class="container">
				<label for="name" class="col-sm-8 control-label"> 1. Have all staff been made aware of what GDPR entails and how it may impact?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="staff_training" id="staff1" value="formal" required> Yes - Formal Training </label>
					<label class="radio"><input type="radio" name="staff_training" id="staff2" value="informal" required> Yes - Informal Training</label> 
					<label class="radio"><input type="radio" name="staff_training" id="staff3" value="no" required> No<br></label>
				</div>
				 
				<div><br><br><p>&nbsp;</p></div>
				<label for="name" class="col-sm-8 control-label"> 2. Does your company have a Data Protection Officer(DPO)?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="dpo" id="dpo1" value="yes" required onclick="hideQuestion('popup_dpo')"> Yes</label>
					<label class="radio"><input type="radio" name="dpo" id="dpo2" value="no" required onclick="showQuestion('popup_dpo')"> No</label>
					<label class="radio"><input type="radio" name="dpo" id="dpo3" value="unsure" required onclick="hideQuestion('popup_dpo')"> Unsure</label>
				</div>	
				 <div><br><br><p>&nbsp;</p></div>
				 
				<label id="popup_dpo_question" for="name" class="col-sm-8 control-label" > 2A. If no, have you assessed whether or not your company needs one?</label>
				<div id="popup_dpo_answers" class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="popup_dpo" id="popup_dpo1" value="yesneeded" > Yes - We need one  </label>
					<label class="radio"><input type="radio" name="popup_dpo" id="popup_dpo2" value="yesnotneeded" > Yes - We don't need one </label>
					<label class="radio"><input type="radio" name="popup_dpo" id="popup_dpo3" value="notassessed" >  No</label>
				</div>					
				<div id="popup_dpo_space" class="col-sm-4">&nbsp;</div>
				<div id="popup_dpo_blanks"><br><br><p>&nbsp;</p></div>
				<script>hideQuestion('popup_dpo'); </script>
				
				<label for="name" class="col-sm-8 control-label"> 3. Has a Data Protection Audit been conducted regarding your company's procedures?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="audit" id="audit1" value="recently" required> Yes, recently </label>
					<label class="radio"><input type="radio" name="audit" id="audit2" value="notin12months" required> Yes, but not in last 12 months</label>
					<label class="radio"><input type="radio" name="audit" id="audit3" value="no" required> No</label>
				</div>	
				 
				<div><br><br><p>&nbsp;</p></div>
				<label for="name" class="col-sm-8 control-label"> 4. Has your company created a Data Register/Inventory to document how it interacts with Personal Data?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="register" id="register1" value="yes" required> Yes </label>
					<label class="radio"><input type="radio" name="register" id="register2" value="no" required> No </label>
					<label class="radio"><input type="radio" name="register" id="register3" value="unsure" required> Unsure </label>
				</div>	
				 
				<div><br><br><p>&nbsp;</p></div>
				<label for="name" class="col-sm-8 control-label"> 5. Have you performed a gap analysis on your Data Protection Policy and Procedures?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="gap_analysis" id="gap1" value="yes" required> Yes </label>
					<label class="radio"><input type="radio" name="gap_analysis" id="gap2" value="no" required> No </label>
					<label class="radio"><input type="radio" name="gap_analysis" id="gap3" value="nopolicies" required> We don't have any</label>
				</div>	
				 
				<div><br><br><p>&nbsp;</p></div>
				<label for="name" class="col-sm-8 control-label"> 6. Have privacy notices and/or privacy statements been updated for GDPR?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="privacy_notice" id="notice1" value="yes" required> Yes  </label>
					<label class="radio"><input type="radio" name="privacy_notice" id="notice2" value="no" required> No </label>
					<label class="radio"><input type="radio" name="privacy_notice" id="notice3" value="nonotices" required> We don't have any </label>
				</div>	
				 
				<div><br><br><p>&nbsp;</p></div>
				
				<label for="name" class="col-sm-8 control-label"> 7. Do you rely on consent for processing e.g. for marketing purposes?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="consent" id="consent1" value="yes" required onclick="showQuestion('popup_consent')"> Yes  </label>
					<label class="radio"><input type="radio" name="consent" id="consent2" value="no" required onclick="hideQuestion('popup_consent')"> No </label>
					<label class="radio"><input type="radio" name="consent" id="consent3" value="sometimes" required onclick="showQuestion('popup_consent')"> Sometimes </label>
				</div>	
				 
				<div><br><br><p>&nbsp;</p></div>
				<label id="popup_consent_question" for="name" class="col-sm-8 control-label" > 7A. If yes, is this consent properly documented?</label>
				<div id="popup_consent_answers" class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="popup_consent" id="popup_consent1" value="yes" > Yes  </label>
					<label class="radio"><input type="radio" name="popup_consent" id="popup_consent2" value="no" > No </label>
					<label class="radio"><input type="radio" name="popup_consent" id="popup_consent3" value="unsure" > Unsure</label>
				</div>					
				<div id="popup_consent_space" class="col-sm-4">&nbsp;</div>
				<div id="popup_consent_blanks"><br><br><p>&nbsp;</p></div>
				<script>hideQuestion('popup_consent'); </script>
				
				<label for="name" class="col-sm-8 control-label" onload="hideQuestion('popup_share')"> 8. Do you transfer or share data with 3rd parties?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="share" id="share1" value="yes" required onclick="showQuestion('popup_share')"> Yes  </label>
					<label class="radio"><input type="radio" name="share" id="share2" value="no" required onclick="hideQuestion('popup_share')"> No </label>
					<label class="radio"><input type="radio" name="share" id="share3" value="sometimes" required onclick="showQuestion('popup_share')"> Sometimes </label>
				</div>	
				
				<div><br><br><p>&nbsp;</p></div>
				<label id="popup_share_question" for="name" class="col-sm-8 control-label" > 8A. If yes (at all), are the obligations of the controller and processor in the relationship properly set out in a written legal agreement?</label>
				<div id="popup_share_answers" class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="popup_share" id="popup_share1" value="yes" > Yes  </label>
					<label class="radio"><input type="radio" name="popup_share" id="popup_share2" value="no" > No </label>
					<label class="radio"><input type="radio" name="popup_share" id="popup_share3" value="unsure" > Unsure</label>
				</div>					
				<div id="popup_share_space" class="col-sm-4">&nbsp;</div>
				<div id="popup_share_blanks"><br><br><p>&nbsp;</p></div>
				<script>hideQuestion('popup_share'); </script>
				
				<label for="name" class="col-sm-8 control-label" onload="hideQuestion('popup_transferEU')">9. Do you transfer data outside of the EU?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="transferEU" id="transferEU1" value="yes" required onclick="showQuestion('popup_transferEU')"> Yes  </label>
					<label class="radio"><input type="radio" name="transferEU" id="transferEU2" value="no" required onclick="hideQuestion('popup_transferEU')"> No </label>
					<label class="radio"><input type="radio" name="transferEU" id="transferEU3" value="sometimes" required onclick="showQuestion('popup_transferEU')"> Sometimes </label>
				</div>	
				
				<div><br><br><p>&nbsp;</p></div>
				<label id="popup_transferEU_question" for="name" class="col-sm-8 control-label" > 9A. If yes, is the legal basis for the transfer recorded e.g. standard contractual clauses?</label>
				<div id="popup_transferEU_answers" class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="popup_transferEU" id="popup_transferEU1" value="yes" > Yes  </label>
					<label class="radio"><input type="radio" name="popup_transferEU" id="popup_transferEU2" value="no" > No </label>
					<label class="radio"><input type="radio" name="popup_transferEU" id="popup_transferEU3" value="unsure" > Unsure</label>
				</div>					
				<div id="popup_transferEU_space" class="col-sm-4">&nbsp;</div>
				<div id="popup_transferEU_blanks"><br><br><p>&nbsp;</p></div>
				<script>hideQuestion('popup_transferEU'); </script>
				
				<label for="name" class="col-sm-8 control-label"> 10. Is the company capable of responding to Data Subject requests such as an access request within the new One Month timeframe?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="access_request" id="access_request1" value="yes" required> Yes  </label>
					<label class="radio"><input type="radio" name="access_request" id="access_request2" value="no" required> No </label>
					<label class="radio"><input type="radio" name="access_request" id="access_request3" value="maybe" required> Maybe</label>
				</div>	
				<div><br><br><p>&nbsp;</p></div>
				
				<label for="name" class="col-sm-8 control-label"> 11. Do you have appropriate technical and organisational measures in place to ensure personal data is kept safely and securely?</label>
				<div class="col-sm-4 gdpr-answer">
					<label class="radio"><input type="radio" name="secure_measures" id="secure_measures1" value="yes" required> Yes  </label>
					<label class="radio"><input type="radio" name="secure_measures" id="secure_measures2" value="no" required> No </label>
					<label class="radio"><input type="radio" name="secure_measures" id="secure_measures3" value="maybe" required> Maybe</label>
				</div>	
				<div><br><br><p>&nbsp;</p></div>
				
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-3">
						<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
					</div>
				</div>
			</div>


	</form> 
	
	</body>
		
</html>