<?php
require('../includes/pdo.php');


/*

  Cette page correspond à la page d'accueil. On y déclare dans un tableau data le titre de la page ainsi que la route
  Par la suite, on fait un rendu flight du fichier template : "index.tpl".

 */
Flight::route('GET /', function(){
  $data = array(
    "titre" => "Index",
  );
  Flight::render('index.tpl',$data);

});


/*
    Cette route permet d'accéder à la page d'enregistrement par la méthode GET
    On y déclare un tableau, dans lequel on retrouve le titre de la page, sa route complète et les messages d'erreurs qui s'afficheront.
    On fait ensuite un rendu du fichier template : "register.tpl" ; un formulaire nous demandans de rentrer un nom, une adresse mail ainsi qu'un mot de passe.

*/
Flight::route('GET /register', function(){
    $data=array(
      "titre"=>"Inscription",
      "messages"=>array()
    );
    Flight::render('register.tpl',$data);
  });


/**
 * Cette route utilise la méthode POST,
 * on y déclare une variable $erreur de type Booléen, qui nous servira d'indicateur d'erreur, TRUE s'il y en a une, FALSE sinon.
 * On déclare également un tableau $messages qui contiendra les messages d'erreur.
 *
 * On implémente des variables $prenom $nom ; $mail ; $mdp qui sont les 4 champs rentrés par l'utilisateur.
 *
 * 
 * Dans un premier temps, on vérifier que le champ "nom" envoyé n'est pas vide.
 * S'il l'est, la variable erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "nom".
 *
 * On vérifie que le champ "prenom" envoyé n'est pas vide.
 * S'il l'est, la variable erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "prenom". 
 * 
 * On vérifie que le champ "mail" envoyé n'est pas vide.
 * S'il l'est, la variable erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "mail".
 *
 * Sinon, On vérifie que le champ "mail" envoyé correspond à un mail valide.
 * S'il ne l'est pas, la variable erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "mail".
 *
 * On vérifie que le champ "motdepasse" n'est pas vide.
 * S'il l'est, la variable erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "passe".
 *
 * Sinon, on vérifie que le champ "motdepasse" est d'une longueur supérieure à 8 caractères.
 * S'il ne l'est pas, la variable erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "passe".
 *
 *
 * Autrement, on fait une requête préparée puisque l'utilisateur injecte des valeurs de champs.
 * Cette requête vérifie que l'Email inséré n'est pas déjà présente dans la base de données.
 * Si elle l'est, la variable erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "mail".
 *
 * En cas d'erreur, on assigne à une variable flight "messages" le tableau de messages d'erreurs que nous pourrons ré-utiliser dans le fichier template : "register.tpl".
 * On réutilise le tableau $_POST pour ne pas avoir à retaper les champs valides par l'utilisateur.
 *
 * S'il n'y a pas d'erreur, on peut procéder à l'insertion des champs rentrés par l'utilisateur dans notre base de données.
 * On commence tout d'abord par un chiffrage du mot de passe de manière "salée", on récupère ensuite la base de données.
 * On y insère les champs rentrés par l'utilisateur dans une requête préparée.
 * L'opérateur " bindParam " permet de lier un paramètre un nom de variable spécifique.
 * On exécute ensuite la requête.
 * On redirige l'utilisateur sur la page "Success" rendue par le fichier template "success.tpl".
 *
 */

Flight::route('POST /register', function(){
  $erreur = False;
  $messages=array();

  $prenom = $_POST["prenom"];
  $nom = $_POST["nom"];
  $mail = $_POST["email"];
  $mdp = $_POST["passe"];

  if (empty($nom)){
    $erreur = True;
    $messages["prenom"] = 'Vous devez saisir un Prénom.';
  }

  if (empty($nom)){
    $erreur = True;
    $messages["nom"] = 'Vous devez saisir un Nom.';
  }
  if (empty($mail)){
    $erreur = True;
    $messages["email"] = 'Vous devez saisir une Email.';
  }

  elseif (!filter_var($mail,FILTER_VALIDATE_EMAIL)){
    $erreur = True;
    $messages["email"]='Vous devez saisir une Email VALIDE.';
  }

  if (empty($mdp)){
    $erreur = True;
    $messages["passe"] = 'Vous devez saisir un mot de passe.';
  }

  elseif  (strlen($mdp) < 8 ){
    $erreur = True;
    $messages["passe"] = 'Votre mot de passe doit faire 8 caractères minimum.';
  }

  else {
    $db = Flight::get('db');
    // MAIL
    $req = $db -> prepare( "SELECT mail FROM utilisateurs where mail = :mail");
    $req -> execute (array(':mail' => "$mail"));

    if ($req -> rowCount() > 0)
    {
      $erreur = True;
      $messages['email'] = 'Email déjà existante.';
    }
  }



  if ($erreur){
    Flight::view()->assign('messages',$messages);

    Flight::render('register.tpl',$_POST);

  }

  else{
    $mdp = password_hash($mdp,PASSWORD_DEFAULT);
    $db = Flight::get('db');
    $req = $db -> prepare("INSERT INTO utilisateurs(mail,nom,prenom,motdepasse) VALUES (:mail,:nom,:prenom,:passe)");
    $req -> bindParam(':prenom',$prenom);
    $req -> bindParam(':nom',$nom);
    $req -> bindParam(':mail',$mail);
    $req -> bindParam('passe',$mdp);
    $req -> execute();
    Flight::redirect('/success');

  }


});

Flight::route('GET /success', function(){
  $data=array(
    "titre" => "Succès"
  );
  Flight::render('success.tpl',$data);
});


/*
    Cette route permet d'accéder à la page de connexion par la méthode GET
    On y déclare un tableau, dans lequel on retrouve le titre de la page, sa route complète et les messages d'erreurs qui s'afficheront.
    On fait ensuite un rendu du fichier template : "login.tpl" ; un formulaire nous demandans de rentrer une adresse mail ainsi qu'un mot de passe.

*/

  Flight::route('GET /login', function(){
    $data=array(
      "titre"=>"Login",
      "messages"=>array()
    );
    Flight::render('login.tpl',$data);
  });


 /**
 * La méthode POST de la route /login permet de vérifier la correspondance entre les champs rentrés par l'utilisateur
 * et la base de données.
 *
 * On initialise une variable $erreur à la valeur False. Elle déterminera si une erreur survient durant le traitement TRUE si oui, FALSE sinon.
 * On initialise également un tableau $messages  qui contiendra les messages d'erreurs en fonction des champs problématiques.
 * On initialise des variables $mail, $mdp qui correspondent respectivement à la valeur du champ concerné, rentré par l'utilisateur.
 *
 * On vérifie que le champ "Email" n'est pas vide.
 * S'il l'est, la variable $erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "email".
 *
 * On vérifie que le champ "Motdepasse" n'est pas vide.
 * S'il l'est, la variable $erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "passe".
 *
 * Si les conditions ci-dessus ne sont pas remplies, on procède à une requête préparée.
 * Cette requête est préparée puisque les données traitées sont injectées par l'utilisateur.
 * On associe grâce à la fonction "bindParam" le paramètre email à la variable $mail.
 * On exécute la requête SQL.
 *
 * Si aucune ligne ne ressort de cette requête alors l'identifiant par email n'existe pas dans la table.
 * La variable $erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "email".
 * Sinon, on insère dans une variable $compte le résultat de la requête.
 *
 * Si cette variable $compte existe, on vérifie la correspondance des mots de passe.
 * Si la correspondance est vérifiée, on insère dans une tableau $_SESSION à la clé "user" la valeur de l'élément d'indice [0] du tableau $compte (le Nom d'utilisateur)
 *
 * Si le mot de passe n'est pas vérifié
 * La variable $erreur passe à True et on ajoute un message d'erreur dans le tableau à la clé "passe".
 *
 *
 * S'il n'y a pas d'erreur dans le traitement, on redirige l'utilisateur sur la page d'index lié à la route "/"
 * Sinon, on renvoie la page de login avec les champs erronés.
 */


Flight::route('POST /login', function(){
  $erreur = False;
  $messages = array();
  $mail = $_POST["email"];
  $mdp = $_POST["passe"];

  if(empty($mail)){

    $erreur = True;
    $messages['Email'] = "L'email est invalide, SAISISSEZ UN MAIL VALIDE.";
  }

  if (empty($mdp)){

    $erreur = True;
    $messages['passe'] = "Le mot de passe est invalide, SAISISSEZ UN MOT DE PASSE.";
  }

  else {
    $db = Flight::get('db');
    $req = $db -> prepare ("SELECT * FROM utilisateurs WHERE mail=:email");
    $req -> bindParam(':email',$mail);
    $req -> execute();
    if ($req -> rowCount()==0){

      $erreur = True;
      $messages['Email'] = " Les identifiants n'existent pas.";
    }

    else{

      $compte= $req -> fetch();

    }

    if (isset($compte)){

      if (password_verify($mdp,$compte[5])){

          $_SESSION['user'] = $compte[4];
          $_SESSION['mail'] = $compte[2];
          $_SESSION['candidat'] = $compte[6];

        }

      else{

          $erreur = True;
          $messages['passe'] = "Mot de passe incorrect";

        }
    }

  }

  if ($erreur==False){

    Flight::redirect("/");
    

  }

  else{
    Flight::view()->assign('messages',$messages);
    Flight::render("login.tpl",$_POST);
  }

});



  /*
    Cette route permet d'accéder à la page de liste des candidatures par la méthode GET
    On y déclare un tableau, dans lequel on retrouve le titre de la page, sa route complète et les messages d'erreurs qui s'afficheront.
    On fait ensuite un rendu du fichier template : "liste_candidature.tpl" ; Une liste permettant de consulter tous les groupes de musiques s'étant inscrit.

*/

  Flight::route('GET /liste_candidature', function(){
    $data=array(
      "titre"=>"liste_candidature",
      "messages"=>array()
    );
    Flight::render('liste_candidature.tpl',$data);
  });



  /*
    Cette route permet d'accéder à la page de candidature, dans laquelle, un utilisateur, est en capacité d'inscrire son groupe à l'évènement.
    On déclare dans cette route, un tableau comportant le titre de la page ainsi que d'éventuels messages d'erreurs.

    On utilise une requête directe dans laquelle on sélectionne le nom des départements, afin qu'ils soient proposés dans une liste déroulante du formulaire.
    On utilise également une requête directe dans laquelle on sélectionne les types de scènes, afin qu'ils soient proposés dans une liste déroulante du formulaire.
  */



  Flight::route('GET /candidature', function(){
    $db = Flight::get('db');

    $data=array(
      "titre"=>"Candidature",
      "messages"=>array(),
      "reqDep"=>$db->query(
        "SELECT nom FROM departements "),

      "reqScenes"=>$db->query(
        "SELECT s.type FROM scenes s ")
      
    );
    Flight::render('formulaire_candidature.tpl',$data);
  });



  Flight::route('POST /candidature', function(){
    $erreur = False;
    $messages = array();
    $nomGrp = $_POST['nomGrp'];
    $dep = $_POST['dep'];
    $villeRep = $_POST['ville'];
    $cp = $_POST['codePostal'];
    $tel = $_POST['tel'];
    $anneeCrea = $_POST['annee'];
    $scene = $_POST['scene'];
    $styleMus = $_POST['styleMus'];
    $presTexte = $_POST['presTexte'];
    $expScenique = $_POST['expScenique'];
    $ulrFB = $_POST['facebook'];
    $urlSC = $_POST['soundcloud'];
    $urlYT = $_POST['youTube'];
    $nomMembre = $_POST['nomMembre'];
    $prenomMembre = $_POST['prenomMembre'];
    $instrumentMembre = $_POST['instrumentMembre'];
    if($_POST['statut']=="Oui"){
      $statue=0;
    }
    else{
      $statue=1;
    }
    if($_POST['sacem']=="Oui"){
      $sacem=0;
    }
    else{
      $sacem=1;
    }
    if($_POST['producteur']=="Oui"){
      $producteur=0;
    }
    else{
      $producteur=1;
    }
    // Test sur le nom du groupe :

      //Test Côté client :
      
      $fNomGrp = Flight::request()->data->nomGrp;
      
      if (empty($fNomGrp)){
        $erreur = True;
        $messages['nomGrp'] = "(Client) Veuillez saisir un nom de groupe ";
      }

      // Test Côté serveur :
       
      if (empty($nomGrp)){
        $erreur = True; 
        $messages['nomGrp'] = "(Serveur) Veuillez saisir un nom de groupe";
      }


      if (strlen($nomGrp)>30){
        $erreur = True;
        $messages['nomGrp'] = "(Serveur) Veuillez saisir un nom plus court (-30 caractères)";
        $_POST['nomGrp'];
      }

 // Test Sur l'année :

    // Test Côté Client :
    $fannee = Flight::request()->data->annee;

    if(empty($fannee)){
      $erreur = True;
      $messages['anneeCrea'] = " (Client) Veuillez saisir une année.";
    }
    
    if (!is_numeric($fannee)){
      $erreur = True;
      $messages['anneeCrea'] = "(Client)Veuillez saisir une année valide.";
      $_POST['annee'];
    }
    if((strlen($fannee)<4) or (strlen($fannee)>4)){
      $erreur = True;
      $messages['anneeCrea'] = " (Client) Veuillez saisir une année valide.";
      $_POST['annee'];
    }
    
    if ((intval($fannee)>=1930) or (intval($fannee)<=2021)){
      $erreur = True;
      $messages['anneeCrea'] = " (Client) Veuillez saisir une année entre 1930 et 2021";
      $_POST['annee'];
    }
    // Test côté Serveur : 


    if(empty($anneeCrea)){
      $erreur = True;
      $messages['anneeCrea'] = "(Serveur) Veuillez saisir une année.";
    }

    if (!is_numeric($anneeCrea)){
      $erreur = True;
      $messages['anneeCrea'] = "(Serveur)Veuillez saisir une année valide.";
      $_POST['annee'];
    }

    if ((strlen($anneeCrea) > 4) or (strlen($anneeCrea) < 4)){
      $erreur = True;
      $messages['anneeCrea'] = "(Serveur) L'année est incorrecte, veuillez rééssayer";
      $_POST['annee'];
    }

    if ((intval($anneeCrea)>=1930) or (intval($anneeCrea)<=2021)){
      $erreur = True;
      $messages['anneeCrea'] = "(Serveur) Veuillez saisir une année entre 1930 et 2021";
      $_POST['annee'];
    }
    
  // Test sur l'URL Facebook ou site :

    // Test Côté Client :
      $furlFB = Flight::request()->data->facebook;
      
      if(empty($furlFB)){
        $erreur = True;
        $messages['urlFB'] = "<br>(Client) Veuillez saisir une URL.";
      }
      else {
        if(!filter_var($furlFB, FILTER_VALIDATE_URL)){
            $erreur = True;
            $messages['urlFB'] = "<br>(Client) Veuillez saisir une URL valide.";
            $_POST['facebook'];
        }
      }  
    // Test Côté Serveur : 
      if(empty($urlFB)){
        $erreur = True;
        $messages['urlFB'] = "<br>(Serveur) Veuillez saisir une URL.";
      }
      else {
        if(!filter_var($urlFB, FILTER_VALIDATE_URL)){
            $erreur = True;
            $messages['urlFB'] = "<br>(Serveur) Veuillez saisir une URL valide.";
            $_POST['facebook'];
        }
      }

  // Test sur l'URL SoundCloud:

    // Test Côté Client :
    $furlSC = Flight::request()->data->soundcloud;
    if(empty($furlSC)){
      $erreur = True;
      $messages['urlSC'] = "<br>(Client) Veuillez saisir une URL Soundcloud.";
      $_POST['soundcloud']="";
    }
    else {
      if((!filter_var($furlSC, FILTER_VALIDATE_URL)) or (strpos($furlSC,'soundcloud')==FALSE)){
          $erreur = True;
          $messages['urlSC'] = "<br>(Client) Veuillez saisir une URL Soundclound valide.";
          $_POST['soundcloud']="";
      }
    }  
  // Test Côté Serveur : 
    if(empty($urlSC)){
      $erreur = True;
      $messages['urlSC'] = "<br>(Serveur) Veuillez saisir une URL SoundCloud.";
    }
    else {
      if((!filter_var($urlSC, FILTER_VALIDATE_URL)) or (strpos($urlSC,'soundcloud')==FALSE)){
          $erreur = True;
          $messages['urlSC'] = "<br>(Serveur) Veuillez saisir une URL Soundcloud valide.";
          $_POST['soundcloud']="";
      }
    }

  // Test sur l'URL YouTube:

    // Test Côté Client :
    $furlYT = Flight::request()->data->youTube;
    if(empty($furlYT)){
      $erreur = True;
      $messages['urlYT'] = "<br>(Client) Veuillez saisir une URL YouTube.";
      $_POST['youTube']="";
    }
    else {
      if((!filter_var($furlYT, FILTER_VALIDATE_URL)) or (strpos($furlYT,'youtube')==FALSE)){
          $erreur = True;
          $messages['urlYT'] = "<br>(Client) Veuillez saisir une URL YouTube valide.";
          $_POST['youTube']="";
      }
    }  
  // Test Côté Serveur : 
    if(empty($urlYT)){
      $erreur = True;
      $messages['urlYT'] = "<br>(Serveur) Veuillez saisir une URL YouTube.";
    }
    else {
      if((!filter_var($urlYT, FILTER_VALIDATE_URL)) or (strpos($urlYT,'youtube')==FALSE)){
          $erreur = True;
          $messages['urlYT'] = "<br>(Serveur) Veuillez saisir une URL YouTube valide.";
          $_POST['youTube']="";
      }
    }







  // Test sur le code Postal :
    
    // Test Côté Client : 

      $fcp = Flight::request()->data->codePostal;

      if (empty ($fcp)){
        $erreur = True;
        $messages['cp'] = "(Client) Veuillez saisir un code postal.";

      }

      if((strlen($fcp) < 4) or (strlen($fcp) >5)){
        $erreur = True;
        $messages['cp'] = "(Client) Veuillez saisir un code postal valide (entre 5 et 6 chiffres).";
        $_POST['codePostal'] = "";
      }

      if (!is_numeric($fcp)){
        $erreur = True;
        $messages['codePostal'] = "(Client) Veuillez saisir un code postal valide.";
        $_POST['codePostal'];
      }
  

    // Test Côté Serveur  
      if (empty($cp)){
        $erreur = True;
        $message['cp'] = "(Serveur) Veuillez saisir un code postal.";
        $_POST['codePostal'] = "";
      }

      if (!is_numeric($cp)){
        $erreur = True;
        $messages['cp'] = "(Serveur) Veuillez saisir un code postal valide.";
        $_POST['codePostal'];
      }

      if((strlen($cp) < 4) or (strlen($cp) > 5)){
        $erreur = True;
        $messages['cp'] = "(Serveur) Veuillez saisir un code postal valide (entre 5 et 6 chiffres).";
        $_POST['codePostal'] = "";
      }
      


    // Test sur la présentation du texte :

      // Test Côté Client :
      
      $fpresTexte = Flight::request()->data->presTexte;

      if (empty ($fpresTexte)){
        $erreur = True;
        $messages['presTexte'] = "(Client) Veuillez présenter votre groupe. (500 car. max)";
      }

      if (is_numeric($fpresTexte)){
        $erreur = True;
        $messages['presTexte'] = "(Client) Utilisez des lettres !";
        $_POST['presTexte'];
      }

      if (strlen($fpresTexte) > 500){
        $erreur = True;
        $messages['presTexte'] = "(Client) Votre texte dépasse les 500 caractères.";
        $_POST['presTexte'];
      }

      // Test Côté Serveur :

      if (empty ($presTexte)){
        $erreur = True;
        $messages['presTexte'] = "(Serveur) Veuillez présenter votre groupe. (500 car. max)";
      }

      if (is_numeric($presTexte)){
        $erreur = True;
        $messages['presTexte'] = "(Serveur) Utilisez des lettres !";
        $_POST['presTexte'];
      }

      if (strlen($presTexte) > 500){
        $erreur = True;
        $messages['presTexte'] = "(Serveur) Votre texte dépasse les 500 caractères.";
        $_POST['presTexte'];
      }

      
    // Test sur la présentation du texte :
     
      // Test Côté Client :
      
      $fexpScenique = Flight::request()->data->expScenique;

      if (empty ($fexpScenique)){
        $erreur = True;
        $messages['expScenique'] = "(Client) Veuillez présenter votre expérience scénique. (500 car. max)";
      }
      if (is_numeric($fexpScenique)){
        $erreur = True;
        $messages['expScenique'] = "(Client) Utilisez des lettres !";
        $_POST['expScenique'];
      }

      if (strlen($fexpScenique) > 500){
        $erreur = True;
        $messages['expScenique'] = "(Client) Votre texte dépasse les 500 caractères.";
        $_POST['expScenique'];
      }

      // Test Côté Serveur :

      if (empty ($expScenique)){
        $erreur = True;
        $messages['expScenique'] = "(Serveur) Veuillez présenter votre expérience scénique. (500 car. max)";
      }

      if (is_numeric($expScenique)){
        $erreur = True;
        $messages['expScenique'] = "(Serveur) Utilisez des lettres !";
        $_POST['expScenique'];
      }

      if (strlen($expScenique) > 500){
        $erreur = True;
        $messages['expScenique'] = "(Serveur) Votre texte dépasse les 500 caractères.";
        $_POST['expScenique'];
      }
    
    // Test sur le style musical : 
      // Test Côté Client : 
      $fvilleRep = Flight::request()->data->ville;

      if (empty ($fvilleRep)){
        $erreur = True;
        $messages['villeRep'] = "(Client) Saisissez votre ville.";
      }

      if (is_numeric($fvilleRep)){
        $erreur = True;
        $messages['villeRep'] = "(Client) Utilisez des lettres !";
        $_POST['ville'];
      }
      // Test Côté Serveur :

      if (empty ($villeRep)){
        $erreur = True;
        $messages['villeRep'] = "(Serveur) Saisissez votre ville.";
      }

      if (is_numeric($villeRep)){
        $erreur = True;
        $messages['villeRep'] = "(Serveur) Utilisez des lettres !";
        $_POST['ville'];
      }

    // Test sur la ville : 
      // Test Côté Client : 
      $fstyleMus = Flight::request()->data->styleMus;

      if (empty ($fstyleMus)){
        $erreur = True;
        $messages['styleMus'] = "(Client) Veuillez présenter votre expérience scénique (500 car. max)";
      }

      if (is_numeric($fstyleMus)){
        $erreur = True;
        $messages['styleMus'] = "(Client) Utilisez des lettres !";
        $_POST['styleMus'];
      }
      // Test Côté Serveur :

      if (empty ($styleMus)){
        $erreur = True;
        $messages['styleMus'] = "(Serveur) Veuillez présenter votre style musical.";
      }

      if (is_numeric($styleMus)){
        $erreur = True;
        $messages['styleMus'] = "(Serveur) Utilisez des lettres !";
        $_POST['styleMus'];
      }


 // Test sur le Tel : 
      // Test Côté Client : 
      $ftel = Flight::request()->data->tel;

      if (empty ($ftel)){
        $erreur = True;
        $messages['tel'] = "(Client) Veuillez saisir votre N° de téléphone.";
      }

      if (!is_numeric($ftel)){
        $erreur = True;
        $messages['tel'] = "(Client) Utilisez des chiffres !";
        $_POST['tel'];
      }

      if ((strlen(trim($ftel))>10) or (strlen(trim($ftel))<10) ){
        $erreur = True;
        $messages['tel'] = "(Client) N° Incorrect, Réessayez avec un N° de téléphone au bon format !";
        $_POST['tel'];        
      }
      // Test Côté Serveur :

      if (empty ($tel)){
        $erreur = True;
        $messages['tel'] = "(Serveur) Veuillez saisir votre N° de téléphone";
      }

      if (!is_numeric($tel)){
        $erreur = True;
        $messages['tel'] = "(Serveur) Utilisez des chiffres !";
        $_POST['tel'];
      }

      if ((strlen(trim($tel))>10) or (strlen(trim($tel))<10) ){
        $erreur = True;
        $messages['tel'] = "(Serveur) N° Incorrect, Réessayez avec un N° de téléphone au bon format !";
        $_POST['tel'];        
      }


    $erreur = True;

    if(isset(Flight::request()->files)){

      // Fichier FicheTechnique.pdf
      $nomWebFT = $_FILES['ficheTechnique']['name'];
      $sizeFT = $_FILES['ficheTechnique']['size'];
      $nomTmpFT = $_FILES['ficheTechnique']['tmp_name'];
      $codeErrFT = $_FILES['ficheTechnique']['error'];
        // Test Côté Client :  

        // Test Côté Serveur : 
          if (isset($_FILES['ficheTechnique']) AND $codeErrFT == 0){
            
            if ($sizeFT<= 1500000){

              $infosfichier = pathinfo($nomWebFT);
              $extension_fichier = $infosfichier['extension'];
              $extension_verif = array('pdf','txt','odt');
              if (in_array($extension_fichier,$extension_verif)){
                move_uploaded_file($nomTmpFT,"../data/upload".basename($nomWebFT));
              }
              else {
                $erreur = True;
                $messages['ft'] = "Veuillez joindre un fichier au format PDF.";
              }

            }
            else{
              $erreur = True;
              $messages['ft'] = "Fichier trop lourd";
            }
         
          }
        else{
          $erreur = True;
          $messages['ft'] = "Erreur lors de l'upload du fichier.";
        }

         

      // Fichier DocumentSACEM.pdf
      $nomWebSacem = $_FILES['sacem']['name'];
      $sizeSacem = $_FILES['sacem']['size'];
      $nomTmpSacem = $_FILES['sacem']['tmp_name'];
      $codeErrSacem = $_FILES['sacem']['error'];

        // Test Côté Serveur : 
        if (isset($_FILES['sacem']) AND $codeErrSacem == 0){
            
          if ($sizeSacem<= 1500000){

            $infosfichier = pathinfo($nomWebSacem);
            $extension_fichier = $infosfichier['extension'];
            $extension_verif = array('pdf','txt','odt');
            if (in_array($extension_fichier,$extension_verif)){
              move_uploaded_file($nomTmpSacem,"../data/upload".basename($nomWebSacem));
            }
            else {
              $erreur = True;
              $messages['sacem'] = "Veuillez joindre un fichier au format PDF.";
            }

          }
          else{
            $erreur = True;
            $messages['sacem'] = "Fichier trop lourd";
          }
       
        }
      else{
        $erreur = True;
        $messages['sacem'] = "Erreur lors de l'upload du fichier.";
      }



      // Fichier DossierPresse.pdf
      $nomWebDp = $_FILES['dossierPresse']['name'];
      $sizeDp = $_FILES['dossierPresse']['size'];
      $nomTmpDp = $_FILES['dossierPresse']['tmp_name'];
      $codeErrDp = $_FILES['dossierPresse']['error'];
      
        // Test Côté Serveur : 
        if(!empty($_FILES['dossierPresse']['name'])){
          if (isset($_FILES['dossierPresse']) AND $codeErrDp == 0){
            if ($sizeDp<= 1500000){
              $infosfichier = pathinfo($nomWebDp);
              $extension_fichier = $infosfichier['extension'];
              $extension_verif = 'pdf';
              if ($extension_fichier==$extension_verif){
                move_uploaded_file($nomTmpDp,"../data/upload".basename($nomWebDp));
              }
              else {
                $erreur = True;
                $messages['dp'] = "Veuillez joindre un fichier au format PDF.";
              }

            }
            else{
              $erreur = True;
              $messages['dp'] = "Fichier trop lourd";
            }
          }
          else{
            $erreur = True;
            $messages['dp'] = "Erreur lors de l'upload du fichier.";
          }
      }
      // Fichier photoGrp1.jpg

      for($i=1;$i<=2;$i++){
        $nomWebGrp[$i] = $_FILES["photoGrp$i"]['name'];
        $sizeGrp[$i] = $_FILES["photoGrp$i"]['size'];
        $nomTmpGrp[$i] = $_FILES["photoGrp$i"]['tmp_name'];
        $codeErrGrp[$i]= $_FILES["photoGrp$i"]['error'];

          // Test Côté Serveur : 
          if (isset($_FILES["photoGrp$i"]) AND $codeErrGrp[$i] == 0){
              
            if ($sizeGrp[$i] <= 6000000){

              $infosfichier = pathinfo($nomWebGrp[$i]);
              $extension_fichier = pathinfo($nomWebGrp[$i], PATHINFO_EXTENSION); //infosfichier['extension'];
              $extension_verif = array('png','jpeg','jpg','gif');
              if (in_array($extension_fichier,$extension_verif)){
                move_uploaded_file($nomTmpGrp[$i],"../data/upload".basename($nomWebGrp[$i]));
                echo "Envoie effectué";
              }
              else {
                $erreur = True;
                $messages["photoGrp$i"] = "Veuillez joindre un fichier au format .png, .jpeg ou .jpg.";
              }

            }
            else{
              $erreur = True;
              $messages["photoGrp$i"] = "Fichier bien trop lourd";
            }
        
          }
        else{
          $erreur = True;
          $messages["photoGrp$i"] = "Erreur lors de l'upload du fichier.";
        }  
      }
      
      // Fichier mus1.mp3
      for($i=1;$i<=3;$i++){
        $nomWebmus[$i] = $_FILES["mus$i"]['name'];
        $sizemus[$i] = $_FILES["mus$i"]['size'];
        $nomTmpmus[$i] = $_FILES["mus$i"]['tmp_name'];
        $codeErrmus[$i] = $_FILES["mus$i"]['error'];  

        if (isset($_FILES["mus$i"]) AND $codeErrmus[$i] == 0){
              
          if ($sizemus[$i] <= 20000000){

            $infosfichier = pathinfo($nomWebmus[$i]);
            $extension_fichier = pathinfo($nomWebmus[$i], PATHINFO_EXTENSION); //infosfichier['extension'];
            $extension_verif = 'mp3';
            if ($extension_fichier==$extension_verif){
              move_uploaded_file($nomTmpmus[$i],"../data/upload".basename($nomWebmus[$i]));
              echo "Envoie effectué";
            }
            else {
              $erreur = True;
              $messages["mus$i"] = "Veuillez joindre un fichier au format .mp3.";
            }

          }
          else{
            $erreur = True;
            $messages["mus$i"] = "Fichier bien trop lourd";
          }
      
        }
        else{
          $erreur = True;
          $messages["mus$i"] = "Erreur lors de l'upload du fichier.";
        }
      }
    }

    if ($erreur){

      Flight::view()->assign('messages',$messages);
      $db = Flight::get('db');
      $reqDep=$db->query("SELECT nom FROM departements ");
      $reqScenes=$db->query("SELECT s.type FROM scenes s ");
      Flight::view()->assign('reqDep',$reqDep);
      Flight::view()->assign('reqScenes',$reqScenes);
      Flight::view()->assign('$_FILES',$_FILES);
      Flight::render("formulaire_candidature.tpl",$_POST);
      
  
    }
  
    else{
      /*
      $db = Flight::get('db');
      $idDep = $db -> query("SELECT id FROM departements WHERE nom=$_POST['dep']);
      $idScene = $db -> query("SELECT id FROM scenes WHERE type=$_POST['scene']);
      $iduser = $db -> query("SELECT id FROM utilisateurs WHERE mail=$_SESSION['mail']);
      $req = $db -> prepare("
                            INSERT INTO 
                              candidatures(nomGroupe,id_departement,id_scene,id_utilisateur,villeRepresentant,codePostalRepresentant,telRepresentant,styleMusique,anneeCreation,presentationTexte,expScenique,webFacebook,soundcloud,youtube,associatif,sacem,producteur,dossierPresse,ficheTechnique,docSacem) 
                            VALUES 
                              (:nomGroupe,:id_departement,:id_scene,:id_utilisateur,:villeRepresentant,:codePostalRepresentant,:telRepresentant,:styleMusique,:anneeCreation,:presentationTexte,:expScenique,:webFacebook,:soundcloud,:youtube,:associatif,:sacem,:producteur,:dossierPresse,:ficheTechnique,:docSacem)
                            ");
      $req -> bindParam(':nomGroupe',$nomGrp);
      $req -> bindParam(':id_departement',$idDep);
      $req -> bindParam(':id_scene',$idScene);
      $req -> bindParam(':id_utilisateur',$iduser);
      $req -> bindParam(':villeRepresentant',$villeRep);
      $req -> bindParam(':codePostalRepresentant',$cp);
      $req -> bindParam(':telRepresentant',$tel);
      $req -> bindParam(':styleMusique',$styleMus);
      $req -> bindParam(':anneeCreation',$anneeCrea);
      $req -> bindParam(':presentationTexte',$presTexte);
      $req -> bindParam(':expScenique',$expScenique);
      $req -> bindParam(':webFacebook',$ulrFB);
      $req -> bindParam(':soundcloud',$urlSC);
      $req -> bindParam(':youtube',$urlYT);
      $req -> bindParam(':associatif',$statut);
      $req -> bindParam(':sacem',$sacem);
      $req -> bindParam(':producteur',$producteur);
      $req -> bindParam(':dossierPresse',$nomWebDp);
      $req -> bindParam(':ficheTechnique',$nomWebFT);
      $req -> bindParam(':docSacem',$nomWebSacem);
      $req -> execute();
      
      $idCandidature = $db -> query("SELECT id FROM candidatures WHERE id_utilisateur=$iduser);
      $reqMembres = $db -> prepare ("
                                    INSERT INTO
                                        membres(nom,prenom,instrument,id_candidature)
                                    VALUES
                                        (:nom,:prenom,:instrument,:id_candidature)
                                    ");
      for($i=1;$i<$POST['nomMembre'].length;$i++){
        $reqMembres -> bindParam(':nom',$nomMembre[$i]);
        $reqMembres -> bindParam(':prenom',$prenomMembre[$i]);
        $reqMembres -> bindParam(':instrument',$instrumentMembre[$i]);
        $reqMembres -> bindParam(':id_candidature',$idCandidature);
        $reqMembres -> execute();
      }

      $reqPhoto = $db -> prepare ("
                                    INSERT INTO
                                        photos(nomfichier,id_candidature)
                                    VALUES
                                        (:nomfichier,:id_candidature)
                                    ");
      for($i=1;$i<=2;$i++){
        $reqPhoto -> bindParam(':nomfichier',$$nomWebGrp[$i]);
        $reqPhoto -> bindParam(':id_candidature',$idCandidature);
        $reqPhoto -> execute();
      }

      $reqMus = $db -> prepare ("
                                    INSERT INTO
                                        mp3s(nomfichier,id_candidature)
                                    VALUES
                                        (:nomfichier,:id_candidature)
                                    ");
      for($i=1;$i<=3;$i++){
        $reqMus -> bindParam(':nomfichier',$nomWebmus[$i]);
        $reqMus -> bindParam(':id_candidature',$idCandidature);
        $reqMus -> execute();
      }
      
      $reqUser = $db -> prepare ("
                                  UPDATE utilisateurs
                                  SET candidat = '0'
                                  WHERE id=$iduser
                                ");
      $reqUser -> execute();
      $_SESSION['candidat']=0;
      */
      
      Flight::redirect("/");
    }
  });









  /*
    Cette route permet d'accéder à la page de formulaire des candidatures par la méthode GET
    On y déclare un tableau, dans lequel on retrouve le titre de la page, sa route complète et les messages d'erreurs qui s'afficheront.
    On fait ensuite un rendu du fichier template : "detail_candidature.tpl" ; Ce template fait un affichage en detail des candidatures des groupes.

*/

  Flight::route('GET /detail_candidature', function(){
    $data=array(
      "titre"=>"detail_candidature",
      "messages"=>array()

    );
    Flight::render('detail_candidature.tpl',$data);
  });


  Flight::route("/logout", function(){
    $_SESSION = array(); // Réinitialisation de la variable de session
    session_destroy(); // Déstruction de la session
    session_start(); // Nouvelle session
    $_SESSION['logged'] = false;
    Flight::redirect("/"); // Redirection vers l'accueil
});

