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
</head>
<body>
    <h1>Area Privata</h1>
    <?php
        echo "Benvenuto " . $_SESSION['nome'] . $_SESSION['cognome'];
        // if(isset($_SESSION['cognome'])){
        //     echo "Benvenuto " . $_SESSION['nome'] . " " . $_SESSION['cognome'];
        // } else {
        //     echo "Errore: variabile di sessione 'cognome' non impostata.";
        // }

    ?>

    <a href="logout.php">Logout</a>

    <?php


        // Recupero eventi dell'utente
        $email = $_SESSION['email']; // sostituisci con la variabile contenente l'email dell'utente
        $sql = "SELECT nome_evento, data_evento FROM eventi WHERE FIND_IN_SET('$email', attendees) > 0;";
        $result = $conn->query($sql);

        // Mostra risultati in HTML
        if ($result->num_rows > 0) {
            // Inizializza tabella HTML
            echo "<table><tr><th>Nome evento</th><th>Data evento</th></tr>";

            // Stampa righe della tabella
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["nome_evento"] . "</td><td>" . $row["data_evento"] . "</td></tr>";
            }

            // Chiudi tabella HTML
            echo "</table>";
        } else {
            echo "Nessun evento trovato";
        }

        // Chiudi connessione al database
        $conn->close();

    ?>
</body>
</html>