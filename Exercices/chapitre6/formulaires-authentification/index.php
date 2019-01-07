<?php
    session_start();
    
    if (isset($_POST['username']) && isset($_POST['userpass'])) {
        if ($_POST['username'] == 'admin' && $_POST['userpass'] == 'coucou') {
            // Connexion réussi
            $_SESSION['username'] = $_POST['username'];
   
            // Redirection vers l'extranet
            header("Location: admin/");
            exit();
        } else {
            $err[] = "Erreur dans votre mot de passe !";
        }
    }


?><!DOCTYPE HTML>
<html>
    <head>
        <title>Chapitre 6 &ndash; Formulaire d'authentification</title>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    </head>
    <body>
        <?php if (isset($err)) { ?>
            <div class='infos'><?php echo implode("<br />", $err); ?></div>
        <?php } ?>
  
        <form action="?" method="post">
            <label for="username">Utilisateur</label><br />
            <input type="text" maxlength="50" name="username" id="username" />
            <br />
            <br />
   
            <label for="userpass">Mot de passe</label><br />
            <input type="password" maxlength="100" name="userpass" id="userpass" />
            <br />
            <br />
   
            <input type="submit" value="M'authentifier" />
        </form>
 
    </body>
</html>