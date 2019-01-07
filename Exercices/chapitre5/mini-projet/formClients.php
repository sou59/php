<?php
  require ('scripts/autoloader.inc.php');

  // Gérer le formulaire
  if (isset($_POST['submit'])) {
    // Tester les variables
    $civilite  = in_array($_POST['civilite'], array("M.", "Mme", "Mlle")) ? $_POST['civilite'] : "M.";
    $prenom    = $_POST['prenom'];
    $nom       = $_POST['nom'];
    $forfait   = in_array($_POST['forfait'], array("zen", "play", "jet")) ? $_POST['forfait'] : null;
    $telephone = $_POST['telephone'];
    
    // Tester les erreurs
    unset($err);
    if (empty($prenom))   $err[] = "Le champ 'prenom' est obligatoire !";
    if (empty($forfait))  $err[] = "La sélection d'un forfait est obligatoire !";

    
    // Si aucun erreur
    if (!isset($err)) {
        // Créer le client, puis l'enregistrer de façons permanente
        $client = new Client($civilite, $prenom, $nom);
        $client->ajouterForfait(ForfaitFactory::create($forfait, new Telephone($telephone)));        
        $client->save(); // Se charge d'enregistrer le nouveau client de façons persistante
        
        // Préparer l'affichage des données
        $tosee[] = "<b>Nom :</b>       <i>{$client->getHtmlFullName()}</i>";
        $tosee[] = "<b>Forfait :</b>   <i>$forfait</i>";
        $tosee[] = "<b>Téléphone :</b> <i>$telephone</i>";
    }
  }
  
  
  if (isset($tosee)) {
    // Afficher une page de validation d'enregistrement
    require ('templates/formClients-merci.phtml');
  } else {
    // Afficher le formulaire
    require ('templates/formClients.phtml');
  }
