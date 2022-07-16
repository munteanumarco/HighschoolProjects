<?php
	
	$servername = "localhost";
    $dbname = "id16438914_arduino";
    $username = "id16438914_username";
    $password = "Tz25-EzBi|?c%y0K";
    $api_key_value = "tPmAT5Ab3j7F9";

    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	$api_key = test_input($_POST["api_key"]);
    	if($api_key == $api_key_value){
	        
	        $temperature = test_input($_POST["temperature"]);
	        $humidity = test_input($_POST["humidity"]);
	        $date = test_input($_POST["date"]);
	        // Create connection

	        $conn = new mysqli($servername, $username, $password, $dbname);
        	// Check connection
	        if ($conn->connect_error) {
	            die("Connection failed: " . $conn->connect_error);
	        } 
	        
	        $sql = 'INSERT INTO stare_actuala (TEMP,UMID,DATA)
	        VALUES (' . $temperature . ', ' . $humidity . ', "'. $date .'")';
	        
	         if ($conn->query($sql) === TRUE) {
            	echo "New record created successfully";
	        } 
	        else {
	            echo "Error: " . $sql . "<br>" . $conn->error;
	        }
	    
	        $conn->close();
	    	}
	    	else{
	    		echo "Wrong API Key";
	    	}
	}
else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
