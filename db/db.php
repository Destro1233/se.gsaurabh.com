<?php
/**
 * Created by PhpStorm.
 * User: Saurabh
 * Date: 5/28/2015
 * Time: 10:28 AM
 */
function db($sql){
    //Check for connection variable already set
    if(!isset($conn)){
        //Database Connectivity - ip, username, password, database name
        $conn = new mysqli("50.62.209.121:3306", "saurabh_se", "#8vNp96y","softeng");
    }

    //Check Connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return($result);
}

function insertdb($sql1){

// Create connection
    if(!isset($conn)){
        //Database Connectivity - ip, username, password, database name
        $conn = new mysqli("50.62.209.121:3306", "saurabh_se", "#8vNp96y","softeng");
    }
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($conn->query($sql1) === TRUE) {
        $conn->close();
        return TRUE;
    } else {
        $conn->close();
        //$failure = "Error updating record: " . $conn->connect_error;
        return FALSE;
    }

}
function numberOfRows($sql){
	//Check for connection variable already set
	if(!isset($conn)){
	//Database Connectivity
	$conn = new mysqli("50.62.209.121:3306", "saurabh_se", "#8vNp96y","softeng");
	}
	//Check Connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	return mysqli_num_rows($sql);
}
function rowcount($sql){
	//Check for connection variable already set
	if(!isset($conn)){
	//Database Connectivity
	$conn = new mysqli("50.62.209.121:3306", "saurabh_se", "#8vNp96y","softeng");

	}

	//Check Connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$query = $conn->prepare($sql);
	$query->execute();
	$query->store_result();
	$rows = $query->num_rows;
	return ($rows);
}
?>
