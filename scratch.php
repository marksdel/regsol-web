<?php		
			//print all result sets
			$result = mysqli_query($con1,"select id, question, answer from GDPRResults");										
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
			//end print all result sets
			
			
			
	?>