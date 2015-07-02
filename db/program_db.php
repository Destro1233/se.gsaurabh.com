		<?php
		header("Content-Type: application/json; charset=UTF-8");
		if(!isset($conn)){
				//Database Connectivity - ip, username, password, database name
			$conn = new mysqli("50.62.209.121:3306", "saurabh_se", "#8vNp96y","softeng");
		 }
		if ($conn->connect_error) {
			 die("Connection failed: " . $conn->connect_error);
		}
		$result = mysqli_query($conn, "SELECT program_name, program_number,program_release FROM program");
		$outp = "";
		while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
			if ($outp != "") {$outp .= ",";}
			$outp .= '{"progname":"'  . $rs["program_name"] . '",';
			$outp .= '"prognumber":"'   . $rs["program_number"]        . '",';
			$outp .= '"progrelease":"'. $rs["program_release"]     . '"}';
		}
		$outp ='{"records":['.$outp.']}';
		$conn->close();
		
		echo($outp);
		?> 