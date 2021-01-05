<?php
require('../includes/pdo.php');
require('fonctions.php');

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

Flight::route('GET /echo',function(){
  echo "test";
  $data=array();
  Flight::render('register.tpl',$data);
});


/*
    Cette route permet d'accéder à la page d'enregistrement par la méthode GET
    On y déclare un tableau, dans lequel on retrouve le titre de la page, sa route complète et les messages d'erreurs qui s'afficheront.
    On fait ensuite un rendu du fichier template : "register.tpl" ; un formulaire nous demandans de rentrer un nom, une adresse mail ainsi qu'un mot de passe.

*/
Flight::route('GET /register', function(){
  if(isset ($_SESSION['user']))
    Flight::redirect('/');
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

  verifRegister($prenom,$nom,$mail,$mdp,$erreur,$messages);


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

/*
    Cette route permet d'accéder à la page success par la méthode GET
    Cette route peut seulement être accéder si l'utilisateur n'est pas connecté, à la suite d'un enregistrement. Elle affiche le fichier success.tpl
    Qui correspond à un bouton renvoyant vers la connexion.

*/

Flight::route('GET /success', function(){
  if(isset ($_SESSION['user']))
    Flight::redirect('/');
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
    if(isset ($_SESSION['user']))
    Flight::redirect('/');
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

  verifLogs($mail,$mdp,$erreur,$messages); 
  if ($erreur==False){

    Flight::redirect("/");
    

  }

  else{
    Flight::view()->assign('messages',$messages);
    Flight::render("login.tpl",$_POST);
  }

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
    $urlFB = $_POST['facebook'];
    $urlSC = $_POST['soundcloud'];
    $urlYT = $_POST['youTube'];
    $nomMembre = $_POST['nomMembre'];
    $prenomMembre = $_POST['prenomMembre'];
    $instrumentMembre = $_POST['instrumentMembre'];

    verifMembre($nomMembre,$prenomMembre,$instrumentMembre,$messages,$erreur);

    //Statut, sacem et producteur
    if($_POST['statut']=="Oui"){
      $statut=0;
    }
    else{
      $statut=1;
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
      //Test Côté PHP :
       $fNomGrp = Flight::request()->data->nomGrp;
        verifNomGroupe($fNomGrp,$messages,$erreur);
      //Test Côté Serveur :
        verifNomGroupe($nomGrp,$messages,$erreur);
      

    // Test Sur l'année :
      // Test Côté PHP
        $fannee = Flight::request()->data->annee;
        verifAnnee($fannee,$messages,$erreur);
      // Test Côté Serveur
        verifAnnee($anneeCrea,$messages,$erreur);
  
    // Test sur l'URL Facebook ou site :
      // Test Côté PHP
        $furlFB = Flight::request()->data->facebook;
        verifUrlFb($urlFB,$messages,$erreur);
      // Test Côté Serveur
        verifUrlFb($furlFB,$messages,$erreur);

    // Test sur l'URL SoundCloud:
      // Test Côté PHP :
        $furlSC = Flight::request()->data->soundcloud;
        verifUrlSc($furlSC,$messages,$erreur);
      // Test Côté Serveur :
        verifUrlSc($urlSC,$messages,$erreur);  

    // Test sur l'URL YouTube:
      // Test Côté PHP :
        $furlYT = Flight::request()->data->youTube;
        verifUrlYt($furlYT,$messages,$erreur);
      // Test Côté Serveur : 
        verifUrlYt($urlYT,$messages,$erreur);

    // Test sur le code Postal :
        // Test Côté PHP : 
          $fcp = Flight::request()->data->codePostal;
          verifCodePostal($fcp,$messages,$erreur);
        // Test Côté Serveur : 
          verifCodePostal($cp,$messages,$erreur);
        


    // Test sur la présentation du texte :
      // Test Côté PHP : 
        $fpresTexte = Flight::request()->data->presTexte;
        verifPresTexte($fpresTexte,$messages,$erreur);
        // Test Côté Serveur : 
        verifPresTexte($presTexte,$messages,$erreur);
        
    // Test sur l'experience scenique':
      // Test Côté PHP :
        $fexpScenique = Flight::request()->data->expScenique;
        verifExpScenique($fexpScenique,$messages,$erreur);
      // Test Côté Serveur :
        verifExpScenique($expScenique,$messages,$erreur);
      
    // Test sur la ville : 
      // Test Côté PHP :
        $fvilleRep = Flight::request()->data->ville;
        verifVille($fvilleRep,$messages,$erreur);
      // Test Côté Serveur :
        verifVille($villeRep,$messages,$erreur);

      // Test sur le style musical : 
        // Test Côté PHP : 
        $fstyleMus = Flight::request()->data->styleMus;
        verifStyle($fstyleMus,$messages,$erreur);
        // Test Côté Serveur :
        verifStyle($styleMus,$messages,$erreur);


    // Test sur le Tel : 
          // Test Côté PHP : 
            $ftel = Flight::request()->data->tel;
            verifTel($ftel,$messages,$erreur);
          // Test Côté Serveur :
            verifTel($tel,$messages,$erreur);


    if(isset(Flight::request()->files)){ //FICHIER

      // Fichier FicheTechnique.pdf
      $nomWebFT = $_FILES['ficheTechnique']['name'];
      $sizeFT = $_FILES['ficheTechnique']['size'];
      $nomTmpFT = $_FILES['ficheTechnique']['tmp_name'];
      $codeErrFT = $_FILES['ficheTechnique']['error'];
      
      verifFichierPDF("ficheTechnique",$nomWebFT,$sizeFT,$nomTmpFT,$codeErrFT,$messages,$erreur,$nomGrp);
         

      // Fichier DocumentSACEM.pdf
      $nomWebSacem = $_FILES['sacem']['name'];
      $sizeSacem = $_FILES['sacem']['size'];
      $nomTmpSacem = $_FILES['sacem']['tmp_name'];
      $codeErrSacem = $_FILES['sacem']['error'];

      verifFichierPDF("sacem",$nomWebSacem,$sizeSacem,$nomTmpSacem,$codeErrSacem,$messages,$erreur,$nomGrp);


      // Fichier DossierPresse.pdf
      $nomWebDp = $_FILES['dossierPresse']['name'];
      $sizeDp = $_FILES['dossierPresse']['size'];
      $nomTmpDp = $_FILES['dossierPresse']['tmp_name'];
      $codeErrDp = $_FILES['dossierPresse']['error'];
      
        if(!empty($_FILES['dossierPresse']['name'])){
          verifFichierPDF("dossierPresse",$nomWebDp,$sizeDp,$nomTmpDp,$codeErrDp,$messages,$erreur,$nomGrp);
      }

      // Fichier photoGrp.jpg

      for($i=1;$i<=2;$i++){
        $nomWebGrp[$i] = $_FILES["photoGrp$i"]['name'];
        $sizeGrp[$i] = $_FILES["photoGrp$i"]['size'];
        $nomTmpGrp[$i] = $_FILES["photoGrp$i"]['tmp_name'];
        $codeErrGrp[$i]= $_FILES["photoGrp$i"]['error'];
      }
   
      verifPhotos($nomWebGrp,$sizeGrp,$nomTmpGrp,$codeErrGrp,$messages,$erreur,$nomGrp);
      
      // Fichier mus.mp3
      for($i=1;$i<=3;$i++){
        $nomWebmus[$i] = $_FILES["mus$i"]['name'];
        $sizemus[$i] = $_FILES["mus$i"]['size'];
        $nomTmpmus[$i] = $_FILES["mus$i"]['tmp_name'];
        $codeErrmus[$i] = $_FILES["mus$i"]['error'];  
      }
        verifMusiques($nomWebmus,$sizemus,$nomTmpmus,$codeErrmus,$messages,$erreur,$nomGrp);
    }

  /* Dans le cas où une erreur est trouvé, on assigne $messages contenant les messages d'erreur à Flight, on récupère ensuite
    les requètes SQL nécessaires à notre formulaire, celle-ci sont assignés. De même pour les fichier et le nombre de membre.tmpfile
    On redirige ensuite vers le template formulaire_candidature.tpl dans lequel on passe $_POST.
  */
    if ($erreur){ 

      Flight::view()->assign('messages',$messages);
      $db = Flight::get('db');
      $reqDep=$db->query("SELECT nom FROM departements ");
      $reqScenes=$db->query("SELECT s.type FROM scenes s ");
      Flight::view()->assign('reqDep',$reqDep);
      Flight::view()->assign('reqScenes',$reqScenes);
      Flight::view()->assign('$_FILES',$_FILES);
      Flight::view()->assign('membreLength',sizeof($nomMembre));
      
      Flight::render("formulaire_candidature.tpl",$_POST);
      
  
    }
  
    /* Sinon, on rentre les données dans la base de donnée et on upload les fichiers*/
    else{

    //On télécharge les fichiers et on les met dans le dossier upload.
      uploadFile($nomTmpFT,$nomGrp,$nomWebFT);
      uploadFile($nomTmpSacem,$nomGrp,$nomWebSacem);
      uploadFile($nomTmpDp,$nomGrp,$nomWebDp);

      for($i=1;$i<=3;$i++){
        uploadFile($nomTmpmus[$i],$nomGrp,$nomWebmus[$i]);
        if($i<3)
          uploadFile($nomTmpGrp[$i],$nomGrp,$nomWebGrp[$i]);
      }

    //Récupération des id nécessaire pour avoir le département, la scène et l'utilisateur
      $db = Flight::get('db');
      $ReqIDDep = $db->prepare("SELECT id FROM departements WHERE nom=:nom");
      $ReqIDDep -> execute(array(':nom' => "$dep"));
      $idDep = $ReqIDDep -> fetchAll();
      $ReqidScene = $db->prepare("SELECT s.id FROM scenes s WHERE s.type=:scene");
      $ReqidScene -> execute(array(':scene' => "$scene"));
      $idScene = $ReqidScene -> fetchAll();
      $mail = $_SESSION['mail'];
      $Reqiduser = $db->prepare("SELECT id FROM utilisateurs WHERE mail=:mail");
      $Reqiduser -> execute(array(':mail' => "$mail"));
      $iduser = $Reqiduser -> fetchAll();
    //Cette requète complète la table candidature avec les données obtenue par le formulaire
      $req = $db->prepare("
                            INSERT INTO 
                              candidatures(nomGroupe,id_departement,id_scene,id_utilisateur,villeRepresentant,codePostalRepresentant,telRepresentant,styleMusique,anneeCreation,presentationTexte,expScenique,webFacebook,soundcloud,youtube,associatif,sacem,producteur,dossierPresse,ficheTechnique,docSacem) 
                            VALUES 
                              (:nomGroupe,:id_departement,:id_scene,:id_utilisateur,:villeRepresentant,:codePostalRepresentant,:telRepresentant,:styleMusique,:anneeCreation,:presentationTexte,:expScenique,:webFacebook,:soundcloud,:youtube,:associatif,:sacem,:producteur,:dossierPresse,:ficheTechnique,:docSacem)
                            ");
      $req -> bindParam(':nomGroupe',$nomGrp);
      $req -> bindParam(':id_departement',$idDep[0][0]);
      $req -> bindParam(':id_scene',$idScene[0][0]);
      $req -> bindParam(':id_utilisateur',$iduser[0][0]);
      $req -> bindParam(':villeRepresentant',$villeRep);
      $req -> bindParam(':codePostalRepresentant',$cp);
      $req -> bindParam(':telRepresentant',$tel);
      $req -> bindParam(':styleMusique',$styleMus);
      $req -> bindParam(':anneeCreation',$anneeCrea);
      $req -> bindParam(':presentationTexte',$presTexte);
      $req -> bindParam(':expScenique',$expScenique);
      $req -> bindParam(':webFacebook',$urlFB);
      $req -> bindParam(':soundcloud',$urlSC);
      $req -> bindParam(':youtube',$urlYT);
      $req -> bindParam(':associatif',$statut);
      $req -> bindParam(':sacem',$sacem);
      $req -> bindParam(':producteur',$producteur);
      $req -> bindParam(':dossierPresse',$nomWebDp);
      $req -> bindParam(':ficheTechnique',$nomWebFT);
      $req -> bindParam(':docSacem',$nomWebSacem);
      $req -> execute();
      
      //Récupération de l'id de la candidature crée.
      $user=$iduser[0][0];
      $ReqidCandidature = $db -> prepare("SELECT id FROM candidatures WHERE id_utilisateur=:iduser");
      $ReqidCandidature -> execute(array(':iduser' => "$user"));
      $idCandidature = $ReqidCandidature -> fetchAll();
      //Cette requète complète la table membres avec les données obtenue par le formulaire
      $reqMembres = $db -> prepare ("
                                    INSERT INTO
                                        membres(nom,prenom,instrument,id_candidature)
                                    VALUES
                                        (:nom,:prenom,:instrument,:id_candidature)
                                    ");
      for($i=1;$i<=sizeof($_POST['nomMembre']);$i++){
        $reqMembres -> bindParam(':nom',$nomMembre[$i]);
        $reqMembres -> bindParam(':prenom',$prenomMembre[$i]);
        $reqMembres -> bindParam(':instrument',$instrumentMembre[$i]);
        $reqMembres -> bindParam(':id_candidature',$idCandidature[0][0]);
        $reqMembres -> execute();
      }

      //Cette requète complète la table photos avec les données obtenue par le formulaire
      $reqPhoto = $db -> prepare ("
                                    INSERT INTO
                                        photos(nomfichier,id_candidature)
                                    VALUES
                                        (:nomfichier,:id_candidature)
                                    ");
      for($i=1;$i<=2;$i++){
        $reqPhoto -> bindParam(':nomfichier',$nomWebGrp[$i]);
        $reqPhoto -> bindParam(':id_candidature',$idCandidature[0][0]);
        $reqPhoto -> execute();
      }

      //Cette requète complète la table mp3s avec les données obtenue par le formulaire
      $reqMus = $db -> prepare ("
                                    INSERT INTO
                                        mp3s(nomfichier,id_candidature)
                                    VALUES
                                        (:nomfichier,:id_candidature)
                                    ");
      for($i=1;$i<=3;$i++){
        $reqMus -> bindParam(':nomfichier',$nomWebmus[$i]);
        $reqMus -> bindParam(':id_candidature',$idCandidature[0][0]);
        $reqMus -> execute();
      }
      //Cette requète modifie la table utilisateur pour indiquer que l'utilisateur possède deja une candidature.
      $reqUser = $db -> prepare ("
                                  UPDATE utilisateurs
                                  SET candidat = '0'
                                  WHERE id=$user
                                ");
      $reqUser -> execute();
      $_SESSION['candidat']=0;
      
      Flight::redirect("/");
    }
  });

  /*
    Cette route permet d'accéder à une page qui affiche le détail d'une candidatures par la méthode GET,
    Après avoir effectué une verification, afin de savoir si l'utilisateur peut voir ou non cette candidature.
    On fait ensuite un rendu du fichier template : "detail_candidature.tpl" ; Ce template fait un affichage en detail des candidatures des groupes.
  */

  Flight::route('GET /detail_candidature(/@iduser)', function($iduser){ //Le paramètre iduser permet d'acceder à la candidature par un id
    if(!isset($_SESSION['user'])){ //Si aucun utilisateur n'est connecté
      Flight::redirect("/");
    }else{
    if ($_SESSION['candidat']=="1" and $_SESSION['userType']=="Candidat"){ //Si l'utilisateur n'est ni responsable ni administrateur
      Flight::redirect("/");
    }

      $db = Flight::get('db');

        if ($iduser==NULL){//Si l'url est juste "/detail_candidature" on en déduit que l'utilisateur tente d'accéder à sa propre candidature. On cherche donc le nom, le prénom et l'id utilisateur.
          $mail = $_SESSION['mail'];
          $Reqiduser = $db->prepare("SELECT nom,prenom,id FROM utilisateurs WHERE mail=:mail");
          $Reqiduser -> execute(array(':mail' => "$mail"));
          $requser = $Reqiduser -> fetchAll();
          $iduser=$requser[0][2];
          $lien=1;
        }
        else{//Si l'url est "/detail_candiature/" suivi d'un id, on cherche alors seulement le  nom et le prénom de l'utilisateur
          $Reqiduser = $db->prepare("SELECT nom,prenom FROM utilisateurs WHERE id=:iduser");
          $Reqiduser -> execute(array(':iduser' => "$iduser"));
          $requser = $Reqiduser -> fetchAll();
          $lien=0;
        }
      if ($_SESSION['id']!=$iduser and $_SESSION['userType']=="Candidat"){ //Si l'utilisateur est un candidat qui tente d'accéder à une candidature différente de la sienne
         Flight::redirect("/");
      }
      // Selections des différentes données qui vont être affichées
      $ReqNomDep = $db -> prepare("SELECT departements.nom FROM departements,candidatures,utilisateurs WHERE departements.id=candidatures.id_departement AND candidatures.id_utilisateur=:iduser");
      $ReqNomDep -> execute(array(':iduser' => "$iduser"));
      $reqdep = $ReqNomDep -> fetchAll();
      $nomDep=$reqdep[0][0];

      $ReqTypeScene = $db -> prepare("SELECT scenes.type FROM scenes,candidatures,utilisateurs WHERE scenes.id=candidatures.id_scene AND candidatures.id_utilisateur=:iduser");
      $ReqTypeScene -> execute(array(':iduser' => "$iduser"));
      $reqScene = $ReqTypeScene -> fetchAll();
      $typeScene=$reqScene[0][0];

      $ReqAllCandidature = $db -> prepare("
                                    SELECT id,nomGroupe,villeRepresentant,codePostalRepresentant,telRepresentant,styleMusique,anneeCreation,presentationTexte,expScenique,webFacebook,soundcloud,youtube,associatif,sacem,producteur,dossierPresse,ficheTechnique,docSacem
                                    FROM candidatures
                                    WHERE id_utilisateur=:iduser
                                    ");
      $ReqAllCandidature -> execute(array(':iduser' => "$iduser"));
      $reqCandidature = $ReqAllCandidature -> fetchAll();
      $idCandidature=$reqCandidature[0][0];

      $ReqPhotos = $db -> prepare("SELECT nomfichier FROM photos WHERE id_candidature=:idCandidature");
      $ReqPhotos -> execute(array(':idCandidature' => "$idCandidature"));
      
      $ReqMus = $db -> prepare("SELECT nomfichier FROM mp3s WHERE id_candidature=:idCandidature");
      $ReqMus -> execute(array(':idCandidature' => "$idCandidature"));

      $ReqMembres = $db -> prepare("SELECT nom,prenom,instrument FROM membres WHERE id_candidature=:idCandidature");
      $ReqMembres -> execute(array(':idCandidature' => "$idCandidature"));
      $Membres = $ReqMembres -> fetchAll();

      $data=array(
        "titre"=>"detail_candidature",
        "messages"=>array(),
        "lien"=>$lien,
        "nomUser"=>$requser[0][0],
        "prenomUser"=>$requser[0][1],
        "nomDep"=>$nomDep,
        "typeScene"=>$typeScene,
        "reqMus"=>$ReqMus,
        "reqPhotos"=>$ReqPhotos,
        "Membres"=> $Membres,
        "nomGrp"=> $reqCandidature[0][1],
        "villeRepresentant"=>$reqCandidature[0][2],
        "codePostalRepresentant"=>$reqCandidature[0][3],
        "telRepresentant"=>$reqCandidature[0][4],
        "styleMusique"=>$reqCandidature[0][5],
        "anneeCreation"=>$reqCandidature[0][6],
        "presentationTexte"=>$reqCandidature[0][7],
        "expScenique"=>$reqCandidature[0][8],
        "webFacebook"=>$reqCandidature[0][9],
        "soundcloud"=>$reqCandidature[0][10],
        "youtube"=>$reqCandidature[0][11],
        "associatif"=>$reqCandidature[0][12],
        "sacem"=>$reqCandidature[0][13],
        "producteur"=>$reqCandidature[0][14],
        "dossierPresse"=>$reqCandidature[0][15],
        "ficheTechnique"=>$reqCandidature[0][16],
        "docSacem"=>$reqCandidature[0][17],
        "iduser"=>$iduser
      );

      Flight::render('detail_candidature.tpl',$data);
    }
  });

  /*
    Cette route permet d'accéder à une page qui liste les candidatures par la méthode GET
    Après des vérifications afin de vérifié si l'utilisateur a accès à la page, on récupère les valeurs nécessaire dans la base de donnée.
    On fait ensuite un rendu du fichier template : "liste_candidature.tpl" ; Ce template fait un affichage d'une liste des candidatures des groupes.
  */

  Flight::route('GET /liste', function(){
  if(!isset ($_SESSION['user'])){
    Flight::redirect("/");
  }else{
  if ($_SESSION['userType']=="Candidat"){
    Flight::redirect("/");
  }
    $db = Flight::get('db');
    $dep=array();
    $scene=array();
    $nom=array();
    //Cette requète récupère les données que l'on veut dans tous les candidatures.
    $ReqAllCandidature = $db -> prepare("
                                  SELECT nomGroupe,villeRepresentant,codePostalRepresentant,styleMusique,anneeCreation,id_utilisateur,id_scene,id_departement
                                  FROM candidatures
                                  ");
    $ReqAllCandidature -> execute();
    $candidatures = $ReqAllCandidature -> fetchAll();

    foreach ($candidatures as $i=>$value){
      $idDep=$value[7];
      $idscene=$value[6];
      $iduser=$value[5];
      //Cette requète récupère le nom du département pour la candidature
      //On récupère ce nom pour chaque candidature.
      $ReqNomDep = $db -> prepare("SELECT nom FROM departements WHERE id=:idDep");
      $ReqNomDep -> execute(array(':idDep' => "$idDep"));
      $reqdep = $ReqNomDep -> fetchAll();

      $dep[$i]= $reqdep[0][0];
  
      //Cette requète récupère le type de scène pour la candidature
      //On récupère ce type pour chaque candidature.
      $ReqTypeScene = $db -> prepare("SELECT type FROM scenes WHERE id=:idscene");
      $ReqTypeScene -> execute(array(':idscene' => "$idscene"));
      $reqScene = $ReqTypeScene -> fetchAll();

      $scene[$i]= $reqScene[0][0];

      //Cette requète récupère le nom de l'utilisateur pour la candidature
      //On récupère ce nom pour chaque candidature.
      $ReqNomUser = $db -> prepare("SELECT nom FROM utilisateurs WHERE id=:iduser");
      $ReqNomUser -> execute(array(':iduser' => "$iduser"));
      $reqUser = $ReqNomUser -> fetchAll();

      $nom[$i]= $reqUser[0][0];

    }

    $data=array(
      "titre"=>"liste_candidature",
      "messages"=>array(),
      "nom"=>$nom,
      "dep"=>$dep,
      "scene"=>$scene,
      "candidatures"=> $candidatures
    );

    Flight::render('liste_candidature.tpl',$data);
  }
  });

   /*
    Cette route permet d'accéder à une page qui liste les utilisateurs par la méthode GET
    Après des vérifications afin de vérifié si l'utilisateur a accès à la page, on récupère les valeurs nécessaire dans la base de donnée.
    On fait ensuite un rendu du fichier template : "userListe.tpl" ; Ce template fait un affichage d'une liste des utilisateurs.
  */

  Flight::route('GET /userListe', function(){
    if (!isset ($_SESSION['user'])){
      Flight::redirect("/");
    }
    else{
      if ($_SESSION['userType']=="Candidat"){
        Flight::redirect("/");
      }
    }
    $db = Flight::get('db');
    $ReqAllUser = $db -> prepare("
                                  SELECT nom,prenom,mail,type,candidat,id
                                  FROM utilisateurs
                                  ");
    $ReqAllUser -> execute();
    $users = $ReqAllUser -> fetchAll();

    $data=array(
      "titre"=>"liste_utilisateurs",
      "messages"=>array(),
      "users"=> $users
    );

    Flight::render('userListe.tpl',$data);
  });

   /*
    Cette route permet d'accéder à une page qui liste les utilisateurs par la méthode POST
    Elle permet de changer le type de l'utilisateur dans la base des données.
    On fait ensuite un rendu du fichier template : "userListe.tpl" ; Ce template fait un affichage d'une liste des utilisateurs.
  */
  Flight::route('POST /userListe', function(){
  
    $db = Flight::get('db');
    $type = $_POST['type'];
    $reqUser = $db -> prepare ("
                                  UPDATE utilisateurs
                                  SET type=:type
                                  WHERE id=:id
                                ");
    foreach ($type as $id=>$value){
      $reqUser -> execute(array(':type' => "$value",':id' => "$id"));
    }
    Flight::redirect("/userListe");
  });

  /*
    Cette route permet de supprimer une candidature
    Après vérification de l'utilisateur, elle supprime les fichiers dans le dossier upload puis dans les tables.
    Cette route possède un argument optionel. Dans le cas où quelqu'un d'autre qu'un candidat veut supprimer la candidature d'un utilisateur, on utilise son id en paramètre.
    On redirige ensuite vers l'index.
  */

  Flight::route('/delete(/@iduser)', function($iduser){
    $db = Flight::get('db');
    if(!isset ($_SESSION['user'])){
      Flight::redirect("/");
    }else{
        if(empty($iduser)){ // Si il n'y a pas de paramètre, on récupère l'id de l'utilisateur 
          $mail=$_SESSION['mail'];
          $Reqiduser = $db->prepare("SELECT id FROM utilisateurs WHERE mail=:mail");
          $Reqiduser -> execute(array(':mail' => "$mail"));
          $users = $Reqiduser -> fetchAll();
          $iduser=$users[0][0];
          $lien=0;
        }else{
          $lien=1;
        }
      if($_SESSION['userType']=="Candidat" and $_SESSION['id']!=$iduser){
          Flight::redirect("/");
      }else{

        // Récupération de l'id de la candidature ainsi que le nom du groupe et les noms des différents fichiers.
        $ReqidCandidature = $db -> prepare("SELECT id,nomGroupe,dossierPresse,ficheTechnique,docSacem FROM candidatures WHERE id_utilisateur=:iduser");
        $ReqidCandidature -> execute(array(':iduser' => "$iduser"));
        $ResidCandidature = $ReqidCandidature -> fetchAll();
        $idCandidature=$ResidCandidature[0][0];
        $nomGrp=$ResidCandidature[0][1];
        $dossierPresse = $ResidCandidature[0][2];
        $ficheTechnique = $ResidCandidature[0][3];
        $docSacem=$ResidCandidature[0][4];

        // Suppression du fichier dossier presse dans le dossier upload si il existe.
        if($dossierPresse!=NULL){
          if($lien){
            if(file_exists("../data/upload/$nomGrp $dossierPresse")) unlink("../data/upload/$nomGrp $dossierPresse");
          }else{
            if(file_exists("../../data/upload/$nomGrp $dossierPresse")) unlink("../../data/upload/$nomGrp $dossierPresse");
          }
        }
        // Suppression du fichier fiche Techniquedans le dossier upload.
        if($lien){
          if(file_exists("../data/upload/$nomGrp $ficheTechnique")) unlink("../data/upload/$nomGrp $ficheTechnique");
        }else{
          if(file_exists("../../data/upload/$nomGrp $ficheTechnique")) unlink("../../data/upload/$nomGrp $ficheTechnique");
        }
        // Suppression du fichier doc sacem dans le dossier upload.
        if($lien){
          if(file_exists("../data/upload/$nomGrp $docSacem")) unlink("../data/upload/$nomGrp $docSacem");
        }else{
          if(file_exists("../../data/upload/$nomGrp $docSacem")) unlink("../../data/upload/$nomGrp $docSacem");
        }

        // Récupération des noms des fichiers photos pour la candidature
        $ReqPhotos = $db -> prepare("SELECT nomfichier FROM photos WHERE id_candidature=:idCandidature");
        $ReqPhotos -> execute(array(':idCandidature' => "$idCandidature"));
        foreach($ReqPhotos as $photo){ // Suppression des fichiers photos dans le dossier upload
          if($lien){
            if(file_exists("../data/upload/$nomGrp $photo[0]")) unlink("../data/upload/$nomGrp $photo[0]");
          }else{
            if(file_exists("../../data/upload/$nomGrp $photo[0]")) unlink("../../data/upload/$nomGrp $photo[0]");
          }
        }

        // Récupération des noms des fichiers musique pour la candidature
        $ReqMus = $db -> prepare("SELECT nomfichier FROM mp3s WHERE id_candidature=:idCandidature");
        $ReqMus -> execute(array(':idCandidature' => "$idCandidature"));
        foreach($ReqMus as $Mus){// Suppression des fichiers musique dans le dossier upload
          if($lien){
            if(file_exists("../data/upload/$nomGrp $Mus[0]")) unlink("../data/upload/$nomGrp $Mus[0]");
          }else{
            if(file_exists("../../data/upload/$nomGrp $Mus[0]")) unlink("../../data/upload/$nomGrp $Mus[0]");
          }
        }

        //Suppression des données liés à la candidature dans la table photos.
        $reqDeletePhotos = $db -> prepare("DELETE FROM photos WHERE id_candidature=:idCandidature");
        $reqDeletePhotos -> execute(array(':idCandidature' => "$idCandidature"));
        //Suppression des données liés à la candidature dans la table mp3s.
        $reqDeleteMus = $db -> prepare("DELETE FROM mp3s WHERE id_candidature=:idCandidature");
        $reqDeleteMus -> execute(array(':idCandidature' => "$idCandidature"));
        //Suppression des données liés à la candidature dans la table membres.
        $reqDeleteMembre = $db -> prepare("DELETE FROM membres WHERE id_candidature=:idCandidature");
        $reqDeleteMembre -> execute(array(':idCandidature' => "$idCandidature"));
        //Suppression des données liés à la candidature dans la table candidatures.
        $reqDeleteCandidature = $db -> prepare ("DELETE FROM candidatures WHERE id_utilisateur=:iduser");
        $reqDeleteCandidature -> execute(array(':iduser' => "$iduser"));
        //Modification de la table utilisateur pour indiquer que l'utilisateur n'a pas fait de candidature.
        $reqUser = $db -> prepare ("
                                      UPDATE utilisateurs
                                      SET candidat = '1'
                                      WHERE id=$iduser
                                    ");
        $reqUser -> execute();
        if($iduser==$_SESSION['id'])
          $_SESSION['candidat']=1;

        Flight::redirect("/"); // Redirection vers l'accueil
      }
    }
});

/*
    Cette route permet de se déconnecter.
    On redirige vers l'index.
  */
  Flight::route("/logout", function(){
    $_SESSION = array(); // Réinitialisation de la variable de session
    session_destroy(); // Déstruction de la session
    session_start(); // Nouvelle session
    $_SESSION['logged'] = false;
    Flight::redirect("/"); // Redirection vers l'accueil
});

