<?php

require_once('config.php');


session_start();
if(!isset($_SESSION['is_logged']) || $_SESSION['is_logged'] !== true){
    header("location: login.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventi</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer'>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>
<body>
    <header class="nav flex">
        <div class="logo">
            <a href="/edusogno-esercizio">
                <img src="./assets/img/logo-edusogno.PNG" alt="">
            </a>
        </div>
        <div>
            <h1>Area Privata</h1>
        </div>
        <div class="nav-name">
        <?php
            echo "<p>Benvenuto " . "<div class='dropdown'><strong>" . $_SESSION['nome'] . " " . $_SESSION['cognome']. "</strong><i class='fa-solid fa-angle-down'></i><div class='dropdown-content'><p><a href='logout.php'>Logout</a></p></div></div>" . "</p>";
        ?>
        </div>
    </header>
    

    <?php
    // Recupero eventi dell'utente
    $email = $_SESSION['email']; 
    $sql = "SELECT nome_evento, data_evento FROM eventi WHERE FIND_IN_SET('$email', attendees) > 0;";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
    ?>

    <div class="row">

        <?php

        while($row = $result->fetch_assoc()) {
        ?>
            <div class="card">
                <h1>  <?php echo $row["nome_evento"]; ?></h1>
                <h4 class="grey"><?php echo $row["data_evento"]; ?></h4>
                <div class="submit-btn">
                    <input id="btn" type="submit" value="Join">
                </div>
            </div>
        <?php
        }
        ?>
        
    </div>

    <?php
    } else {
        ?>
        <div>
            <h1>Nessun evento trovato</h1>
        </div> 
        <?php 
    }
    
    // Chiudi connessione al database
    $conn->close();
    ?>
</body>
</html>