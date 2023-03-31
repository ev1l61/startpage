<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profil bearbeiten</title>
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery-3.6.1.min.js"></script>
</head>
<body>
<?php
    if (!isset($_COOKIE["name"]))
        exit("<div class='message'>"
            ."<p>du bist nicht angemeldet</p>"
            ."<a href='index.php'>zur Anmeldung</a></div>");

    include "classes.php";
?>
    <header>
        <nav>
            <div class="hamburger-menu">
                <input id="menu__toggle" type="checkbox" />
                <label class="menu__btn" for="menu__toggle">
                <span></span>
                </label>

                <ul class="menu__box">
                    <li><a class="menu__item" href="start.php">Zurück</a></li>
                    <li><a class="menu__item" href="#">Dashboard bearbeiten</a></li>
                    <li><a class="menu__item" href="index.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="loginChange">
        <section>
            <p>Hier kannst du deinen Namen und/oder dein Passwort ändern:</p>
            <form action="profileChange.php" method="post">
                <label for="name">neuer Name:</label>
                <input type="text" name="name" id="name">
                <label for="password">neues Passwort:</label>
                <input type="password" name="password">
                <label for="password">Passwort bestätigen:</label>
                <input type="password" name="passwordConfirm">
                <input type="submit" value="Ändern" name="send" id="send">
            </form>
        </section>
    </main>

</body>
</html>
