<?php
  $image = 'php.png';

  $fb['image']       = 'http://' . $_SERVER['SERVER_NAME'] . '/' . $image;
  $size              = getimagesize($image);
  $fb['imageType']   = $size['mime'];
  $fb['imageWidth']  = $size[0];
  $fb['imageHeight'] = $size[1];
?><!DOCTYPE html>
<html>
  <head>
    <title>Correction Chapitre 3</title>
    <meta charset="UTF-8" />
    
    <meta property="og:image"        content="<?=$fb['image']?>" />
    <meta property="og:image:type"   content="<?=$fb['imageType']?>" />
    <meta property="og:image:width"  content="<?=$fb['imageWidth']?>" />
    <meta property="og:image:height" content="<?=$fb['imageHeight']?>" />    
  </head>
  <body>
    <p>Cette page n'affiche rien de particulier, ce qui est important ce sont les balises &lt;meta&gt; (voir la source)<p>
    <h1 style="font-size:1.2em;">Transformer cette page en code orienté objet, maintenable et réutilisable dans d'autres applications</h1>
    <pre>
        class <strong>FbImage</strong> {
          public function __construct($urlImage) {
            
          }
          public function __tostring() {
            return "";
          }
        }
    </pre>
    <pre>
        Controller : <strong>$fb = new FbImage($image);</strong>
        Vue :        <strong>echo $fb;</strong>
    </pre>
  </body>
</html>
