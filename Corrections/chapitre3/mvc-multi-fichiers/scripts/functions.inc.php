<?php
   function getHtmlDataUsage($utilise, $max) {
      if (is_null($max)) $return = "<em>Pas de données</em>";
      else {
         $return = ( ((int) ($utilise/1024/1024*100)) /100 ).' / '.( ((int) ($max/1024/1024*100)) /100 );
      }

      return $return;
   }
   function getZoneGeoFromPhone($telephone) {
      $prefix = substr($telephone, 0, 2);
      
      // dans une boucle la première fois enregistre le tableau, quand repasse le tableau existe déjà 
      static $tabPrefix = array(
        '01' => 'Région parisienne',
        '02' => 'Région nord-ouest et « Océan Indien »',
        '03' => 'Région nord-est',
        '04' => 'Région sud-est dont Corse',
        '05' => 'Région sud-ouest et « Océan Atlantique »',
        '06' => 'Téléphone mobile',
        '07' => 'Téléphone mobile',
        '08' => 'Numéro spéciaux',
        '09' => 'Pas de zone',
      );
      
      if (isset($tabPrefix[$prefix])) {
        return $tabPrefix[$prefix];
      } else {
        return 'Prefix inconnu ['.$prefix.']';
      }
   }
