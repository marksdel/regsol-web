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

			/* Sanitize input. Trust *nothing* sent by the client. */
			$staff_training=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['staff_training']);
			$dpo_required=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['dpo_required']);
			$audit=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['audit']);
			$register=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['register']);
			$gap_analysis=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['gap_analysis']);
			$privacy_notice=preg_replace('/[^a-zA-Z0-9\ ]/','',$_REQUEST['privacy_notice']);			
			
			/* Escape your input: use htmlspecialchars to avoid most obvious XSS attacks. */			
			$staff_training=htmlspecialchars($staff_training);
			$dpo_required=htmlspecialchars($dpo_required);
			$audit=htmlspecialchars($audit);
			$register=htmlspecialchars($register);
			$gap_analysis=htmlspecialchars($gap_analysis);
			$privacy_notice=htmlspecialchars($privacy_notice);
			
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
				$result = mysqli_query($con1,"select max(id) from gdprresultsindex");										
				if (!$result) {
					echo 'Could not run query: ' . mysql_error();
					exit;
				}
				$row = mysqli_fetch_row($result);
				$index = $row[0];
				echo $row[0];
				
				//insert questions and answers using index
				$qry=$conn->prepare("INSERT INTO gdprresults (id, question, answer) values 
				($index, 'staff_training','$staff_training'),
				($index, 'dpo_required', '$dpo_required'),
				($index, 'audit','$audit'),
				($index, 'register','$register'),
				($index, 'gap_analysis','$gap_analysis'),
				($index, 'privacy_notice','$privacy_notice')");
				$qry->execute();
				
				//print all result sets
				$result = mysqli_query($con1,"select id, question, answer from gdprresults");										
				if (!$result) {
					echo 'Could not run query: ' . mysql_error();
					exit;
				}
				
				$index=0;
				while ($row = $result->fetch_array()) {
					if ($index != $row["id"]) {
						echo "<br>";
						$index = $row["id"];
						echo $row["id"] . " : ";
					}
					echo $row["question"] . "=" . $row["answer"] . "," ;
				}
				
				
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
	</body>
</html>