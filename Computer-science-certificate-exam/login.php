<?php      
    session_start();
    $servername = "localhost";
    $dbname = "id16438914_arduino";
    $usernameDB = "id16438914_username";
    $passwordDB = "Tz25-EzBi|?c%y0K";

    $conn = mysqli_connect($servername,$usernameDB,$passwordDB);

    if(!$conn)
        {
            echo "Eroare la conectarea cu baza de date";
        }

    $selDB = mysqli_select_db($conn,$dbname);
        
    if(!$selDB)
    {
        echo "fail selectare db ";
    }
    
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
        
        $sql = ' SELECT * FROM utilizatori WHERE USERNAME = "'. $username .'" AND PAROLA = "'. $password .'"';
    
        $result = mysqli_query($conn, $sql);  
        
        
         if(!$result)
        {
            echo "fail ext";
            echo  mysqli_query($conn, $sql);
        }
        
        $count = mysqli_num_rows($result);
          
        if($count == 1){  
            $_SESSION['username'] = $username;
            $_SESSION['ventilator'] = 0;
            header("Location: http://arduinocontrol.tk/home.php");
        }  
        else{  
            echo '<h1 align = "center">Logare eșuată<br><a href = "index.html" style = "text-decoration:none;">Incearca din nou</a></h1>';  
        }     
?>  