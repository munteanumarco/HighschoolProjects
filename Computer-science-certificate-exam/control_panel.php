<?php
    include_once 'afisare_stare_actuala.php';
    include_once 'connect_db.php';
    session_start();
    if(!isset($_SESSION['username']))
        header("Location: http://arduinocontrol.tk ")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arduino Control - Panou de control</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/fav.png">
</head>
<body>
     <!-- Bara de navigare  -->
     <nav>
        <div class="logo">
            <a href="home.php"><img src="images/fav.png">
            <h4 style="color: #f9b30b;">Arduino Control</h4></a>
        </div>
        <ul class = "navbar-links">
            <li>
                <a href = "home.php"> <button class="main_btn">Acasă</button></a>
            </li>

            <li>
                <a href = "graphs.php"> <button class="main_btn">Grafice</button> </a>
            </li>

            <li>
                <a href = "control_panel.php"> <button class="main_btn">Panou control</button> </a>
            </li>
            <?php if($_SESSION['username']) echo'<li>
                <a href="logout.php"><button class="main_btn"> Logout </button></a>
            </li>' ?>

        </ul>
    <!-- Bara de navigare  -->

        <!-- Buton bara navigare pentru mobil -->
            <div class="burger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <!-- Buton bara navigare pentru mobil -->

    </nav>
    <div>
        <div class="bg-home">
            <h1>Panou Control</h1>        
        </div>
        
        <div class="info" style = "height:50vh;">
                <h1>
                     <span style = "color:rgb(51, 133, 255);">Temepratura actuală: <?php echo $temp; ?>°C</span><br>
                    <span style = "color:rgb(51, 133, 255);">Umiditate actuală: <?php echo $umid; ?>%</span><br>
                    <form action = "write_commands.php" method = "post">
                        Stare ventilator :
                        <?php
                        
                        $sql = ' SELECT MOTOR,VITEZA,LIMITA FROM comenzi ORDER BY ID DESC LIMIT 1 ';
                        
                        $result = mysqli_query($conn,$sql);
                    
                        if(!$result)
                        {
                            echo "fail ext";
                        }
                    
                        $values=mysqli_fetch_array($result);
                        
                        $motor = $values["MOTOR"];
                        $viteza = $values["VITEZA"];
                        $limita = $values["LIMITA"];
                        
                        if($motor == 1)
                            echo '
                            
                            <button name = "on"  class="main_btn"  style = "background-color: rgb(51, 133, 255);
                                        color: whitesmoke;">
                            ON
                        </button>
                         <button type = "submit" name = "off" class="main_btn" >
                        OFF
                        </button><br>';
                        else 
                            echo '<button type = "submit" name = "on" class="main_btn">
                            ON
                        </button>
                         <button type = "submit" name = "off" class="main_btn">
                        OFF
                        </button><br>';
                        ?>
                    
                    <?php
                    if($motor == 1)
                    {
                        if($viteza == 50)
                            echo 'Viteză ventilator:
                        <button name = "v50" type="submit" class="main_btn"  style = "background-color: rgb(51, 133, 255);color: whitesmoke;">
                            50%
                        </button>
                        <button name = "v100" type = "submit" class="main_btn">
                            100%
                        </button>
                        <br>';
                        else
                         echo 'Viteză ventilator:
                        <button name = "v50" type="submit" class="main_btn" >
                            50%
                        </button>
                        <button name = "v100" type = "submit" class="main_btn"  style = "background-color: rgb(51, 133, 255);color: whitesmoke;">
                            100%
                        </button>
                        <br>';
                    
                    if($limita == 0)
                    echo 'Limită temperatură (°C): <input name = "limita_temp" type="number">   <button name="limita_temp_btn" type = "submit" class="main_btn">
                        SET
                    </button>';
                    else
                    {
                         echo 'Limită temperatură (°C): <input name = "limita_temp" type="number">   <button name="limita_temp_btn" type = "submit" class="main_btn">
                        SET
                    </button><br> Limita actuala de temperatură  : '. $limita .' °C';
                    }
                        
                    }
                    ?>
                    </form>
                </h1>
        </div>
     </div>  
    <footer>
        Munteanu Marco -  2021 
    </footer>
    <script src="js/navbar.js"></script>
</body>
</html>