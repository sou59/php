<?php
    $tab = array(); // Cette « déclaration » est inutile en PHP
    
    // Affectation d'un tableau pour chaque élément du tableau $tab
    $tab[0] = array(10, 5, 45,  65, 58,  41);
    $tab[1] = array(5,  1,  4, 165, 58,   1);
    $tab[2] = array(10, 4, 35,   5, 48, 142);
    $tab[3] = array("a", true, 4.56, "texte", "salspareil", array("another", "dimension"));
    $tab[4] = array("grumpy", "happy", "sleepy", "sneeze", "doc", "whitesnow");
    
    echo "<pre>";
       var_dump($tab);
       var_dump($tab[4][1]);
    echo "</pre>";
?>
<!-- Affichage du tableau sous une forme HTML, grace aux structures du contrôle -->
<table summary="Tableau multidimensionnel" border="1">
    <tr>
        <th>Index</th>
        <th>&Eacute;lement du tableau</th>
    </tr>
    <?php foreach ($tab as $key => $val): ?>
        <tr>
            <td><?=$key?></td>
            <td>[<?=@implode(",", $val)?>]</td>
        </tr>
    <?php endforeach; ?>
</table>
