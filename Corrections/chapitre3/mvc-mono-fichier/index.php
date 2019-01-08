<?php
   // Créer un set de fonctions personnalisées
   function getHtmlDataUsage($utilise, $max) {
      if (is_null($max)) $return = "<em>Pas de données</em>";
      else {
         $return = ( ((int) ($utilise/1024/1024*100)) /100 ).' / '.( ((int) ($max/1024/1024*100)) /100 );
      }

      return $return;
   }
   function getZoneGeoFromPhone($telephone) {
      $prefix = substr($telephone, 0, 2);
      switch ($prefix) {
      case '01': return 'Région parisienne';
      case '02': return 'Région nord-ouest et « Océan Indien »';
      case '03': return 'Région nord-est';
      case '04': return 'Région sud-est dont Corse';
      case '05': return 'Région sud-ouest et « Océan Atlantique »';
      case '06': 
      case '07': return 'Téléphone mobile';
      case '08': return 'Numéro spéciaux';
      case '09':
      default:
         return 'Pas de zone';
      }
   }


   /* 
      Créer un tableau $tabClients avec au moins 5 clients, comportant les informations suivantes :
      - Prénom
      - Nom
      - Numéro de téléphone
      - Type de forfait (Zen, Play, Jet)
      - Données utilisées (Si Internet dans le forfait)
   */

   $tabForfaits[1]['nom']      = 'Zen';
   $tabForfaits[1]['data_max'] = null;
   $tabForfaits[2]['nom']      = 'Play';
   $tabForfaits[2]['data_max'] = 100*1024*1024;
   $tabForfaits[3]['nom']      = 'Jet';
   $tabForfaits[3]['data_max'] = 500*1024*1024;
   
   $ii = 0;
   $tabClients[$ii]['civilite']     = 'M.';
   $tabClients[$ii]['prenom']       = 'Jean';
   $tabClients[$ii]['nom']          = 'ALOUET';
   $tabClients[$ii]['telephone']    = '0102030405';
   $tabClients[$ii]['typeForfait']  = 2;
   $tabClients[$ii]['data_utilise'] = 34034;
   $ii++;
   $tabClients[$ii]['civilite']     = 'Mme';
   $tabClients[$ii]['prenom']       = 'Alice';
   $tabClients[$ii]['nom']          = 'DELAH';
   $tabClients[$ii]['telephone']    = '0607080304';
   $tabClients[$ii]['typeForfait']  = 1;
   $tabClients[$ii]['data_utilise'] = null;
   $ii++;
   $tabClients[$ii]['civilite']     = 'Mlle';
   $tabClients[$ii]['prenom']       = 'Louise';
   $tabClients[$ii]['nom']          = 'DELAH';
   $tabClients[$ii]['telephone']    = '0607080305';
   $tabClients[$ii]['typeForfait']  = 2;
   $tabClients[$ii]['data_utilise'] = 456789;
   $ii++;
   $tabClients[$ii]['civilite']     = 'M.';
   $tabClients[$ii]['prenom']       = 'Albert';
   $tabClients[$ii]['nom']          = 'DUPONT';
   $tabClients[$ii]['telephone']    = '0825010101';
   $tabClients[$ii]['typeForfait']  = 1;
   $tabClients[$ii]['data_utilise'] = null;
   $ii++;
   $tabClients[$ii]['civilite']     = 'M.';
   $tabClients[$ii]['prenom']       = 'Durand';
   $tabClients[$ii]['nom']          = 'DUPOND';
   $tabClients[$ii]['telephone']    = '0901010101';
   $tabClients[$ii]['typeForfait']  = 3;
   $tabClients[$ii]['data_utilise'] = '34567890';
   // téléphone toujours en string sinon convertit en octale
   unset($ii);

   /*
      Stocker le tableau dans un fichier « export.txt »
   */
   file_put_contents('export.forfaits.txt', serialize($tabForfaits));
   file_put_contents('export.clients.txt',  serialize($tabClients));

   /*
      Parcourir le tableau $tabClients pour afficher les informations en HTML
      Détecter la zone géographique, les mobiles, et les numéros spéciaux en fonction du numéro.
   */

?>
<!DOCTYPE html>
<html>
   <head>
      <title>Correction Chapitre 3</title>
      <meta charset="UTF-8" />
   </head>
   <body>
      <table border='1'>
         <thead>
            <tr>
               <th>Nom complet</th>
               <th>Type forfait</th>
               <th>Téléphone</th>
               <th>Zone géographique</th>
               <th>Données utilisées / max (Mio)</th>
            </tr>
         </thead>
         <tbody>
         <?php for ($ii = 0 ; $ii < 5 ; $ii++) { ?>
            <tr>
               <td><?=$tabClients[$ii]['civilite']?> <?=$tabClients[$ii]['prenom']?> <?=$tabClients[$ii]['nom']?></td>
               <td><?=$tabForfaits[$tabClients[$ii]['typeForfait']]['nom']?></td>
               <td><?=$tabClients[$ii]['telephone']?></td>
               <td><?=getZoneGeoFromPhone($tabClients[$ii]['telephone'])?></td>
               <td><?=getHtmlDataUsage($tabClients[$ii]['data_utilise'], $tabForfaits[$tabClients[$ii]['typeForfait']]['data_max'])?></td>
            </tr>
         <?php } ?>
         </tbody>
      </table>
   </body>
</html>
