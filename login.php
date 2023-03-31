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
        <?php
            include "config.php";
            include "classes.php";

            $name = $_POST["name"];
            setcookie('name', $name, time()+3600*24*30);

            $username=  "'" . $_POST['name'] . "'";
            
            $pdo = new PDO($dsn, $DBusername, $password);

            $sql = "SELECT * FROM startpage_user  WHERE name=$username";
            if ($res = $pdo->query($sql)) {
            echo $res->rowCount();
                if ($res->rowCount() == 0) {
                    echo "<div class='message'>"
                        . "<h1>Name unbekannt</h1>"
                        . "<a href='index.php'>zurück zur Anmeldung</a></div>";
                }

                foreach ($pdo->query($sql) as $row) {
                    setcookie('permission', $row["permission"], time() + 3600 * 24 * 30);
                    if (password_verify($_POST['password'], $row["password"])) {
                        header('Location: start.php');
                    } else {
                        echo "<div class='message'>"
                            . "<h1>Falsches Passwort</h1>"
                            . "<a href='index.php'>zurück zur Anmeldung</a></div>";
                    }
                }
            }
            else 
                exit("Fehler bei Abfrage");

            $pdo = null;
        ?>
    </main>    
</body>
</html>
