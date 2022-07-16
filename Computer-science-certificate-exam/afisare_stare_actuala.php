<?php

    $servername = "localhost";
    $dbname = "id16438914_arduino";
    $username = "id16438914_username";
    $password = "Tz25-EzBi|?c%y0K";

    $conn = mysqli_connect($servername,$username,$password);

    if(!$conn)
        {
            echo "Eroare la conectarea cu baza de date";
        }

    $selDB = mysqli_select_db($conn,$dbname);
        
    if(!$selDB)
    {
        echo "fail selectare db ";
    }

    $sql = ' SELECT TEMP,UMID,DATA FROM stare_actuala ORDER BY ID DESC LIMIT 1 ';
    
    $result = mysqli_query($conn,$sql);

    if(!$result)
    {
        echo "fail ext";
    }

    $values=mysqli_fetch_array($result);
	$temp = $values["TEMP"];
	$umid = $values["UMID"];
	$data = $values["DATA"];

?>