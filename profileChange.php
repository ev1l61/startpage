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
        include "config.php";
        include "classes.php";

        if (!empty($_POST['name'])) {
            $name = $_POST["name"];
            setcookie('name', $name, time() + 3600 * 24 * 30);
        }

        try{
            $pdo = new PDO($dsn, $DBusername, $password);
        }
        catch(Exception $fehler){
            print $fehler->getMessage();
        }

        new profileChange($pdo);

        $pdo = null;
    ?>
</body>
</html>
