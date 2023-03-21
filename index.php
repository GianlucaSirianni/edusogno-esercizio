<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>

    <header>
        
    </header>

    <div class="register-form">
    <form action="register.php" method="POST">
        <div class="input-field">
            <label for="firstname">Nome:</label>
            <input type="text" name="firstname" id="firstname" style="width: 300px;" placeholder="Inserisci il tuo nome" required>
        </div>
        <div class="input-field">
            <label for="lastname">Cognome:</label>
            <input type="text" name="lastname" id="lastname" style="width: 300px;" placeholder="Inserisci il tuo cognome" required>
        </div>
        <div class="input-field">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" style="width: 300px;" placeholder="Inserisci la tua E-mail" required>
        </div>
        <div class="input-field">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" style="width: 300px;" placeholder="Inserisci la tua password" required>
        </div>
        <div>
            <input type="submit" value="Registrati">
        </div>
        <p>se hai gia' un account vai al <a href="login.html">Login</a></p>

    </form>

    </div>



</body>

</html>