<?php
    setcookie('name', '', time() - 3600);
    setcookie('permission', '', time() - 3600);
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Anmeldung</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <main>
        <div class="loginSite">
            <h1>Willkommen, bitte melde dich an:</h1> 

            <div class="login">
                <form action="login.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                    <label for="password">Passwort:</label>
                    <input type="password" name="password" required>
                    <input type="submit" value="Anmelden" name="send" id="send">
                </form>
            </div>

            <p>noch kein Profil?</p>
            <a id=signUp href="#"> hier registrieren</a>
        </div>

        <div class="anmeldeForm">
            <img id="close" src="image/close-ring-svgrepo-com.svg" alt="">
            <h2>neues Profil anlegen</h2>
            <form action="signUp.php" method="post">
                <input type="text" name="name" id="name" placeholder="Name" required> <br>
                <input type="password" name="password" placeholder="Passwort" required> <br>
                <input type="submit" value="neues Profil erstellen" name="send" id="send">
            </form>
       </div> 

    </main>    
    <script>

    </script>
</body>
</html>
