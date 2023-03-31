<?php
    class News{
        var $url;
        var $site;
        

        function __construct($url, $site)
        {
            $news = simplexml_load_file($url);
            if ($news===false){
                exit ("keine XML-Datei vorhanden");
            }

            for ($i=0; $i<4; $i++)
            {
                echo "<div class='article " . $site . " unvisible' id=" . $site . ">" 
                ."<a href='" . $news ->channel->item[$i]->link . "'>"
                ."<h2>" .$news->channel->item[$i]->title . "</h2></a>"
                ."<p>" . $news->channel->item[$i]->description . "</p>"
                ."</div>";
            }   
        }
    }

    class profileChange{
            function __construct($pdo){

            $newName = $_POST['name'];
            $oldName = $_COOKIE['name'];
            $newPass = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if (!empty($_POST['name'])){
                $statement = $pdo->prepare("UPDATE startpage_user SET name=? WHERE name=?");
                $statement->execute(array($newName, $oldName));
                echo "<div class='message'>" 
                    ."<h1>Username geändert zu: " . $newName . "</h1>"
                    ."<a href='start.php'>zurück zur Startseite</a></div>";
            }
            if (!empty($_POST['password']) && $_POST['password'] === $_POST['passwordConfirm']){
                $statement = $pdo->prepare("UPDATE startpage_user SET password=? WHERE name=?");
                $statement->execute(array($newPass, $oldName));
                echo "<div class='message'>" 
                ."<h1>Passwort erfolgreich geändert</h1>"
                ."<a href='start.php'>zurück zur Startseite</a></div>";
            }
            if (!empty($_POST['password']) && $_POST['password'] != $_POST['passwordConfirm']) {
                echo "<div class='message'>" 
                ."<h1>Passwortbestätigung stimmt nicht mit Passwort überein</h1>"
                ."<a href='profile.php'>Zurück</a></div>";
            }
    }
    }

    class adminChange{
        function __construct($pdo){

        $name = $_GET['name'];
        $permission = $_GET['permission'];

        if ($permission == 0){
            $statement = $pdo->prepare("UPDATE startpage_user SET permission=1 WHERE name=?");
            $statement->execute(array($name));
            header('Location: admin.php');
        }
        if ($permission == 1){
            $statement = $pdo->prepare("UPDATE startpage_user SET permission=0 WHERE name=?");
            $statement->execute(array($name));
            header('Location: admin.php');
    }
}
}
?>