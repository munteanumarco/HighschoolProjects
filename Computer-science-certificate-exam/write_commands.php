<?php
include_once "connect_db.php";
if(isset($_POST["on"])){
    
    $sql = 'UPDATE comenzi SET MOTOR = 1';
    $result = mysqli_query($conn,$sql);
                    
    if(!$result)
    {                       
        echo "Fail inserare comanda noua";
    }
    $sql = 'UPDATE comenzi SET VITEZA = 50';
    $result = mysqli_query($conn,$sql);
                    
    if(!$result)
    {                       
        echo "Fail inserare comanda noua";
    }
    
}

if(isset($_POST["off"])){
    $sql = 'UPDATE comenzi SET MOTOR = 0';
    $result = mysqli_query($conn,$sql);
                    
    if(!$result)
    {                       
        echo "Fail inserare comanda noua";
    }
    $sql = 'UPDATE comenzi SET VITEZA = 0';
    $result = mysqli_query($conn,$sql);
                    
    if(!$result)
    {                       
        echo "Fail inserare comanda noua";
    }
    $sql = 'UPDATE comenzi SET LIMITA = 0';
    $result = mysqli_query($conn,$sql);
                    
    if(!$result)
    {                       
        echo "Fail inserare comanda noua";
    }
}

if(isset($_POST['v50'])){
    $sql = 'UPDATE comenzi SET VITEZA = 50';
    $result = mysqli_query($conn,$sql);
                    
    if(!$result)
    {                       
        echo "Fail inserare comanda noua";
    }
}

if(isset($_POST['v100'])){
     $sql = 'UPDATE comenzi SET VITEZA = 100';
    $result = mysqli_query($conn,$sql);
                    
    if(!$result)
    {                       
        echo "Fail inserare comanda noua";
    }
}

if(isset($_POST["limita_temp_btn"]))
{
    $sql = 'UPDATE comenzi SET LIMITA = '. $_POST["limita_temp"] .' ';
    $result = mysqli_query($conn,$sql);
                    
    if(!$result)
    {                       
        echo "Fail inserare comanda noua";
    }
}


header("Location: http://arduinocontrol.tk/control_panel.php");
?>