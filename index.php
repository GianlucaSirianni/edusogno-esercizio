<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edusogno</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==' crossorigin='anonymous' referrerpolicy='no-referrer'>
    <link rel="stylesheet" href="./assets/styles/style.css">
</head>

<body>

    <header class="nav">
        <div class="logo">
            <img src="./assets/img/logo-edusogno.PNG" alt="">
        </div>
    </header>

    <main>
        <div class="create">
            <h1>Crea il tuo account</h1>
        </div>
        <div class="register-form">
            <div class="form-container">  
                <form action="register.php" method="POST">
                    <div class="input-field">
                        <label for="firstname">Inserisci il nome</label>
                        <input type="text" name="firstname" id="firstname" placeholder="Mario" required>
                    </div>
                    <div class="input-field">
                        <label for="lastname">Inserisci il cognome</label>
                        <input type="text" name="lastname" id="lastname"  placeholder="Rossi" required>
                    </div>
                    <div class="input-field">
                        <label for="email">Inserisci l'email:</label>
                        <input type="email" name="email" id="email" placeholder="name@example.com" required>
                    </div>
                    <div class="input-field">
                        <label for="password">Inserisci la password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password"  placeholder="Scrivila qui" required>
                            <i class="fa-solid fa-eye fa-eye-slash" id="togglePassword"></i>
                        </div>

                    </div>
                    <div class="submit-btn">
                        <input id="btn" type="submit" value="Registrati">
                    </div>
                    <div class="text-center">
                        <p class="small"><a href="login.html">Hai già un account? <strong>Accedi</strong> </a></p>
                    </div>
                </form>
            </div> 
        </div>
    </main>


    <script type="text/javascript" src="./assets/js/script.js"></script>
</body>

</html>