<?php
  //require('classes/Client.class.php');
  //require('classes/Forfait.class.php');
  
  // /!\ Il faudra commenter les lignes du dessus, et implémenter un spl_autoload_register
  spl_autoload_register(function ($className) {
    if (file_exists("classes/$className.class.php")) {
      require ("classes/$className.class.php");
    } else {
      return false;
    }
  });

