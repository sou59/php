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
      {
         "prenom" => "toto",
         "nom" => "titi",
         "telephone" => "0320121212",
         "forfait" => {
            0 => "Fixe",
            1 => "Zen",
            3 => "Play",
            4 => "Jet"
         },
         "donnees" => ""
      },
      {
         "prenom" => "souad",
         "nom" => "marcel",
         "telephone" => "0312345678",
         "forfait" => {
            0 => "Fixe",
            1 => "Zen",
            3 => "Play",
            4 => "Jet"
         },
         "donnees" => ""
      },
      {
         "prenom" => "nico",
         "nom" => "charly",
         "telephone" => "0314321587",
         "forfait" => {
            0 => "Fixe",
            1 => "Zen",
            3 => "Play",
            4 => "Jet"
         },
         "donnees" => ""
      },

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
               <th>Type forfait</th>
               <th>Téléphone</th>
            </tr>
         </thead>
         <tbody>
         <?php foreach($tabClient as $tabClients)   ?>
            <tr>
               <td>  <?php $tabClient['nom'] ?>  </td>
               <td>  <?php $tabClient['forfait'] ?>  </td>
               <td>  <?php $tabClient['donnees'] ?>  </td>
            </tr>
         </tbody>
      </table>
   </body>
</html>
<?php
   /*
      Stocker le tableau dans un fichier « export.txt »
   */
?>
