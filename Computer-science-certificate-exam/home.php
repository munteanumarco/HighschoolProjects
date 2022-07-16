<?php
    session_start();
    include_once 'afisare_stare_actuala.php';
    if(!isset($_SESSION['username']))
        header("Location: http://arduinocontrol.tk ")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arduino Control - Acasa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/fav.png">
</head>
<body class="home">
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
            <h1>
                Arduino Control  <br>
            </h1>
        </div>
        
        <div class="info" style="height: 30vh; color:  rgb(51, 133, 255); ">
            <h1>
                Bine ai venit <?php echo $_SESSION['username']?> ! <br><br>
                Temepratura actuală: <?php echo $temp; ?>°C<br><br>
                Umiditate actuală: <?php echo $umid; ?>%
            </h1>
        </div>

    </div>

    <footer>Munteanu Marco - 2021 </footer>

    <script src="js/navbar.js"></script>
</body>

</html>