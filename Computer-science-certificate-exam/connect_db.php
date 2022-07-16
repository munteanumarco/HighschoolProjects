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