<?php
   if ( !isset($_COOKIE['test']) ) {
       setcookie('test', 'Coucou');
   }
   @var_dump($_COOKIE['test']);
   // Affiche NULL la première fois
   // Affiche Coucou toutes les autres fois
