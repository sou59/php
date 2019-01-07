<?php
   define('URL_BASE', 'http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']));

   if (get_magic_quotes_gpc()) { // Nécessaire sur PHP < 5.4, si l'option pas désactivé par défaut dans la configuration serveur
      foreach ($_GET    as &$val) $val = stripslashes($val);
      foreach ($_POST   as &$val) $val = stripslashes($val);
      foreach ($_COOKIE as &$val) $val = stripslashes($val);
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

      // Gestion des fichiers
      if (isset($_FILES) && isset($_FILES['cv']) && isset($_FILES['cv']['error'])) {
         
         var_dump($_FILES);
         
         if ($_FILES['cv']['error'] != 0) { // 0 = Transfert OK
            // Message d'erreur
            $err[] = "Le champ 'cv' est obligatoire !";
         } else {
            // Création si nécessaire du répertoire de stockage des fichiers
            if (!file_exists('uploads/.')) {
               mkdir('uploads/');
            }
            
            // Donner le chemin complet avec nom de fichier
            $cv = "uploads/".$_FILES['cv']['name'];
            
            // Déplacer le fichier temporaire, vers sa position finale
            move_uploaded_file($_FILES['cv']['tmp_name'], $cv);
         }
      } else  $err[] = "Le champ 'cv' est obligatoire !";
      
      if (!isset($err)) {
         // Traiter le forumulaire
         $tosee[] = "<b>Prénom :</b>   <i>$prenom</i>";
         $tosee[] = "<b>Nom :</b>      <i>$nom</i>";
         $tosee[] = "<b>Sexe :</b>     <i>$sexe</i>";
         $tosee[] = "<b>Courriel :</b> <i>$courriel</i>";
         $tosee[] = "<b>Message :</b>  <i>$message</i>";
         $tosee[] = "<b>C.V. :</b>     <i><a href='".URL_BASE."/$cv'>".URL_BASE."/$cv</a></i>";
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

<form action="?" method="post" enctype="multipart/form-data">
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
      <input id="courriel" name="courriel" type="email" placeholder="Courriel" value="<?php echo isset($courriel) ? $courriel : ""; ?>" required="required" />
   </p>
   <p>
      <label for="cv">C.V.</label><br />
      <input id="cv" name="cv" type="file" required="required" />
      <ul>
        <li>file_uploads :        <strong><?=get_cfg_var('file_uploads') == true ? 'Autorisé' : 'Interdit'?></strong></li>
        <li>upload_max_filesize : <strong><?=get_cfg_var('upload_max_filesize')?>io</strong></li>
        <li>post_max_size :       <strong><?=get_cfg_var('post_max_size')?>io</strong></li>
      </ul>
   </p>	
   <p>
      <label for="message">Message</label><br />
      <textarea id="message" name="message" cols="50" rows="15"><?php echo isset($message) ? $message : ""; ?></textarea>
   </p>
   <p>
      <input id="submit" name="submit" type="submit" value="Soumettre le formulaire" />
   </p>
</form>


   </body>
</html>
