<?php
   /* 
      Créer un tableau $tabClients avec au moins 3 clients, comportant les informations suivantes :
      - Prénom
      - Nom
      - Numéro de téléphone
      - Type de forfait (Fixe, Zen, Play, Jet)
      - Données utilisées par ce numéro téléphonique (Si Internet dans le forfait)
   */
    
   $tabClients = array(
      0 => array(
         "prenom" => "toto",
         "nom" => "titi",
         "telephone" => "0120121212",
         "forfait" => "Fixe",
      ),
      1 => array(
         "prenom" => "souad",
         "nom" => "marcel",
         "telephone" => "0212345678",
         "forfait" => "Zen"
      ),
      3 => array(
         "prenom" => "nico",
         "nom" => "charly",
         "telephone" => "0314321587",
         "forfait" => "Play"
      )
   );
    
   /*
      Parcourir le tableau $tabClients pour afficher les informations en HTML
      Détecter la zone géographique, les mobiles, et les numéros spéciaux en fonction du numéro de téléphone.
   */
?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <meta charset="UTF-8" />
   </head>
   <body>
      <table border='1'>
         <thead>
            <tr>
               <th>Nom complet</th>
               <th>Prénom</th>
               <th>Téléphone</th>
               <th>Forfait</th>
               <th>Région</th>

            </tr>
         </thead>
         <tbody>
         <?php
            var_dump($tabClients);

            foreach($tabClients as $val):   ?>
            <tr>
               <td>  <?= $val['nom'] ?>  </td>
               <td>  <?= $val['prenom'] ?>  </td>
               <td>  <?= $val['telephone'] ?>  </td>
               <td>  <?= $val['forfait'] ?>  </td>
               <td>
                  <?php 
                     if (substr($val["telephone"], 0,2) == "01") {
                        echo "Zone Paris";
                     } else if (substr($val["telephone"], 0,2) == "02") {
                        echo "Zone Brest";
                     } else {
                        echo "Zone Nice";
                     }
                  ?> 
               </td>
            </tr>
          <?php endforeach; ?>

         </tbody>
      </table>
   </body>
</html>
<?php
   /*
      Stocker le tableau dans un fichier « export.txt »
   */
?>
