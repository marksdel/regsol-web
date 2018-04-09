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
	<h2>RegSol - GDPR Questionnaire</h2>
	
	<form class="form-horizontal" role="form" method="post" action="process-gdpr-questionnaire.php">
			<div class="container">
				<label for="name" class="col-sm-6 control-label"> 1. Have all staff been made aware of what GDPR entails and how it may impact?</label>
				<div class="col-sm-3 gdpr-answer">
					<label class="radio"><input type="radio" name="staff_training" id="staff1" value="formal" required> Yes - Formal Training </label>
					<label class="radio"><input type="radio" name="staff_training" id="staff2" value="informal" required> Yes - Informal Training</label> 
					<label class="radio"><input type="radio" name="staff_training" id="staff3" value="no" required> No<br></label>
				</div>
				<div class="col-sm-3">&nbsp;</div>
				<div><br><br><p>&nbsp;</p></div>
				<label for="name" class="col-sm-6 control-label"> 2. Has your company assessed whether it needs a DPO or not?</label>
				<div class="col-sm-3 gdpr-answer">
					<label class="radio"><input type="radio" name="dpo_required" id="dpo1" value="needed" required> Yes - We need one </label>
					<label class="radio"><input type="radio" name="dpo_required" id="dpo2" value="notneeded" required> Yes - We don't need one</label>
					<label class="radio"><input type="radio" name="dpo_required" id="dpo3" value="notassessed" required> No</label>
				</div>	
				<div class="col-sm-3">&nbsp;</div>
				<div><br><br><p>&nbsp;</p></div>
				<label for="name" class="col-sm-6 control-label"> 3. Has a Data Protection Audit been conducted regarding your company's procedures?</label>
				<div class="col-sm-3 gdpr-answer">
					<label class="radio"><input type="radio" name="audit" id="audit1" value="recently" required> Yes, recently </label>
					<label class="radio"><input type="radio" name="audit" id="audit2" value="notin12months" required> Yes, but not in last 12 months</label>
					<label class="radio"><input type="radio" name="audit" id="audit3" value="no" required> No</label>
				</div>	
				<div class="col-sm-3">&nbsp;</div>
				<div><br><br><p>&nbsp;</p></div>
				<label for="name" class="col-sm-6 control-label"> 4. Has your company created a Data Register/Inventory to document how it interacts with Personal Data?</label>
				<div class="col-sm-3 gdpr-answer">
					<label class="radio"><input type="radio" name="register" id="register1" value="yes" required> Yes </label>
					<label class="radio"><input type="radio" name="register" id="register2" value="no" required> No </label>
					<label class="radio"><input type="radio" name="register" id="register3" value="noidea" required> No idea</label>
				</div>	
				<div class="col-sm-3">&nbsp;</div>
				<div><br><br><p>&nbsp;</p></div>
				<label for="name" class="col-sm-6 control-label"> 5. Have you performed a gap analysis on your Data Protection Policy and Procedures?</label>
				<div class="col-sm-3 gdpr-answer">
					<label class="radio"><input type="radio" name="gap_analysis" id="gap1" value="yes" required> Yes </label>
					<label class="radio"><input type="radio" name="gap_analysis" id="gap2" value="no" required> No </label>
					<label class="radio"><input type="radio" name="gap_analysis" id="gap3" value="nopolicies" required> We don't have any</label>
				</div>	
				<div class="col-sm-3">&nbsp;</div>
				<div><br><br><p>&nbsp;</p></div>
				<label for="name" class="col-sm-6 control-label"> 6. Have privacy notices and/or privacy statements been updated for GDPR?</label>
				<div class="col-sm-3 gdpr-answer">
					<label class="radio"><input type="radio" name="privacy_notice" id="notice1" value="yes" required> Yes  </label>
					<label class="radio"><input type="radio" name="privacy_notice" id="notice2" value="no" required> No </label>
					<label class="radio"><input type="radio" name="privacy_notice" id="notice3" value="nonotices" required> We don't have any </label>
				</div>	
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<input id="submit" name="submit" type="submit" value="Submit" class="btn btn-primary">
					</div>
				</div>
			</div>


	</form> 
	
	</body>
		
</html>