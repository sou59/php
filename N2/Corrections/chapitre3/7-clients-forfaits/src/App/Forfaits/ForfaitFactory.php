<?php
namespace App\Forfaits;

use \App\Application;

class ForfaitFactory
{

    public static function create($forfait)
    {
        // Lorsque l'on souhaite créer un objet de type forfait, il faut en fait que le système
        // aille chercher dans la bdd les informations
        $db = Application::getInstance()->getDb();
        $sql = "SELECT codeForfait, libelle, dataMax FROM forfaits WHERE libelle = :libelleForfait";
        $row = $db->fetchRow($sql, array("libelleForfait" => $forfait));

        $className = 'Forfait' . $row->libelle;

        if (!class_exists($className)) {
            // Création d'un classe sur mesure
            $dataMax = is_null($row->dataMax) ? 'null' : $row->dataMax;
            $classDefinition = <<<"CLASS"
                class $className extends \App\Forfaits\ForfaitAbstract {
                        function __construct() {
                                parent::__construct('{$row->libelle}', {$dataMax});
                        }
                }
CLASS;
            eval($classDefinition); // Evaluation de la classe --
                                    // Cette méthode est à utiliser avec beaucoup de précaution
                                    // en fonction de la provenance des données inclus dans l'evaluation

        }
        
        return new $className;
    }
}
