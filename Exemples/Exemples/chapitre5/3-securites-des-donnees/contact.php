<?php
    // Nécessaire sur PHP < 5.4, si l'option pas désactivé par défaut dans la configuration serveur
   if (get_magic_quotes_gpc()) {
      foreach ($_GET    as &$val) { $val = stripslashes($val); } // Prendre chaque super-globales (GET, POST, COOKIE) ...
      foreach ($_POST   as &$val) { $val = stripslashes($val); } // ... est supprimer les anti-slashs (\) que les ...
      foreach ($_COOKIE as &$val) { $val = stripslashes($val); } // ... magic_quotes auraient pu mettre.
   }

   // Reception d'un formulaire
   if (isset($_POST['submit'])) {
      $prenom   = $_POST['prenom'];
      $nom      = $_POST['nom'];
      $sexe     = in_array($_POST['sexe'], array("H", "F")) ? $_POST['sexe'] : "";
      $courriel = filter_input(INPUT_POST, 'courriel', FILTER_VALIDATE_EMAIL);     // Filter les courriels
      $message  = $_POST['message'];
      
      unset($err);
      if (empty($prenom))   $err[] = "Le champ 'prenom' est obligatoire !";
      if (empty($courriel)) $err[] = "Le champ 'courriel' est obligatoire !";

      if (!isset($err)) {
         // Traiter le formulaire
         $tosee[] = "<b>Prénom :</b>   <i>$prenom</i>";
         $tosee[] = "<b>Nom :</b>      <i>$nom</i>";
         $tosee[] = "<b>Sexe :</b>     <i>$sexe</i>";
         $tosee[] = "<b>Courriel :</b> <i>$courriel</i>";
         $tosee[] = "<b>Message :</b>  <i>$message</i>";
      }
   }
?><!DOCTYPE HTML>
<html>
   <head>
      <title>Sécurité des formulaires</title>
      <meta charset="UTF-8" />
   </head>
   <body>
<?php
   if (isset($err)) {
      echo "<div class='infos'>".implode("<br />", $err)."</div>";
   } else if (isset($tosee)) {
      echo "<div class='infos'>".implode("<br />", $tosee)."</div>";
   }
?>

<form action="?" method="post">
   <p>
      <label for="prenom">Prénom</label><br />
      <input id="prenom" name="prenom" type="text" placeholder="Prénom" value="<?php echo isset($prenom) ? $prenom : ""; ?>" required="required" />
   </p>
   <p>
      <label for="nom">Nom</label><br />
      <input id="nom" name="nom" type="text" placeholder="Nom" value="<?php echo isset($nom) ? $nom : ""; ?>" />
   </p>
   <p>
      <label for="sexe">Sexe</label><br />
      <select id="sexe" name="sexe">
         <option value="X">Indéfini</option>
         <option value="H" <?php echo (isset($sexe) && $sexe == "H" ? "selected='selected'" : ""); ?>>Homme</option>
         <option value="F" <?php echo (isset($sexe) && $sexe == "F" ? "selected='selected'" : ""); ?>>Femme</option>
      </select>
   </p>
   <p>
      <label for="courriel">Courriel</label><br />
      <input id="courriel" name="courriel" type="email" placeholder="Courriel" value="<?php echo isset($courriel) ? $courriel : ""; ?>" />
   </p>
   <p>
      <label for="message">Message</label><br />
      <textarea id="message" name="message" cols="50" rows="15"><?php echo isset($message) ? $message : ""; ?></textarea>
   </p>
   <p>
      <input id="submit" name="submit" type="submit" value="Soumettre le formulaire" />
   </p>
</form>


<div>
  <ol>
    <li>Ajouter des ', et des " dans les champs</li>
    <li>Utiliser des outils comme l'inspection d'élément pour supprimer les protections clients</li>
    <li>Regarder dans php ce qui est vraiment protégé ou non</li>
    <li>Mettre comme message, exactement : « &lt;script&gt;alert('Brèche de sécurité')&lt;/script&gt; »</li>
  </ol>
</div>

   </body>
</html>
