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
    <header>
    </header>
    <main>
        <?php
        
            $con = new mysqli("", "root", "", "test");
            $ps = $con->prepare("INSERT INTO startpage_user"
                ."(name, password)"
                ."VALUES(?, ?)");

            $passwd = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $ps->bind_param("ss", $_POST["name"], $passwd); 
            $ps->execute();

            if($ps->affected_rows > 0)
                echo "<div class='message'>"
                    . "<p>Profil angelegt</p>"
                    . "<a href='index.php'>zurück zur Anmeldung</a></div>";
                
            else
                echo "<div class='message'>"
                    ."<p>etwas ist schiefgelaufen</p>"
                    ."<a href='index.php'>versuche es bitte erneut</a>></div>";

            $ps->close();
            $con->close();
        ?>
    </main>    
</body>
</html>

