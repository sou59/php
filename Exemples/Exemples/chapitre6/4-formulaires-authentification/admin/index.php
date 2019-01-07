<?php
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header("HTTP/1.0 404 Not Found");
        echo "Erreur quatre cent quatre : Pas de page ici !";
        exit();
    }
    
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Chapitre 6 &ndash; Formulaire d'authentification</title>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    </head>
    <body>
        <div id="contents">
            ZONE ADMIN !
        </div>
    </body>
</html>

