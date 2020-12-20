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
      "titre"=>"Register",
      "messages"=>array()
    );
    Flight::render('register.tpl',$data);
  });


/*
    Cette route permet d'envoyer les données de connexion rentrés par l'utilisateur par la méthode POST (son mot de passe, son nom et son email)
   On vérifie si l'emai n'est pas déjà dans la base de données, si c'est le cas on message d'eereur pour dire qu'elle est déjà utilisé. 

*/

  Flight::route('POST /register', function(){
  
    $erreur = false;
    $messages=array();
    $mail = $_POST['email'];
    $nom = $_POST['nom'];
    if (empty($_POST["nom"])){
      $erreur = true;
      $messages["nom"] = 'Saisir un Nom';
    }
    if (empty($_POST["email"])){
      $erreur = true;
      $messages["email"] = 'Saisir une adresse mail';
    }
    else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
      $erreur = true;
      $messages["email"] = "Email invalide";
    }
    else{
      $db = Flight::get('db');
      $statement = $db -> prepare("select Email from logs where Email = :email");
      $statement -> execute(array(':email' => "$mail"));
      if($statement -> rowCount() > 0){
        $erreur = true;
        $messages['email'] = 'Email déjà utilisé.';
      }
    }
    $mdp = $_POST['mdp'];
    if (empty($mdp)){
      $erreur = true;
      $messages['mdp'] = 'Saisir un mot de passe';
    }
    else if(strlen($mdp)<8){
      $messages['mdp']="Le mot de passe doit contenir au moins 8 caractères";
  }
  
    if ($erreur){
      Flight::view()->assign('messages',$messages);
  
      Flight::render('register.tpl',$_POST);
  
    }
    else{
      $statement = $db -> prepare("insert into logs (Nom, Email, Motdepasse) VALUES (:nom, :mail, :mdp)");
              $mdp = password_hash($mdp, PASSWORD_DEFAULT);
              $statement -> execute(array(':nom' => $nom, ':mail' => $mail, ':mdp' => $mdp));
              $_SESSION['logged'] = true;
              $_SESSION['username'] = $_POST["nom"];
              Flight::redirect('sucess');
    }
  
  
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


  /*
    Cette route permet d'accéder à la page de connexion par la méthode  POST
    On vérifie si les deux champs ne sont pas vides, si c'est le cas on renvoie une erreur. De plus on execute une commande SQl pour vérifier si l'email et le mot de passe sont bien dans la base.
    Si c'est le cas on renvoie à la route "/" sinon on envoie un message d'erreur pour dire qu'un des deux champs est incorrect.
*/

  Flight::route("POST /login", function(){
    $error = false;
    if (empty($_POST['email'])) $error["email"] = "champs vide";
    if (empty($_POST['mdp'])) $error["mdp"] = "champs vide";
    if (!$error) {
        $db = Flight::get("db");
        $req = $db->prepare("SELECT * FROM `logs` WHERE `Email` = ?");
        $req->execute(array($_POST['email'])); // On execute la commande sql (avec cette email à la place de ?)
        if ($data = $req->fetch()) { // Si résultat
            if (password_verify($_POST['mdp'], $data['Motdepasse'])) { // Si mot de passe correct
                $_SESSION['logged'] = true;
                $_SESSION['username'] = $data['Nom'];
            } else $error['error'] = "Adresse Email ou mot de passe invalide.";
        }
        else $error['error'] = "Adresse email ou mot de passe invalide.";
    }
    if ($error) {
        Flight::render("templates/login.tpl", 
          array(
            "post" => $_POST, 
            "error" => $error
          )
        );
  
    } else {
        Flight::redirect("/"); //Si aucune erreur l'utilisateur et redirigé vers la page d'acceuil
    }
  });

/*
    Cette route permet d'accéder à la page de formulaire des candidatures par la méthode GET
    On y déclare un tableau, dans lequel on retrouve le titre de la page, sa route complète et les messages d'erreurs qui s'afficheront.
    On fait ensuite un rendu du fichier template : "formulaire_candidature.tpl" ; un formulaire nous demandans de rentrer toutes les informations pour que les groupes puissent s'inscire et soumettre leur candidature.

*/

  Flight::route('GET /formulaire_candidature', function(){
    $data=array(
      "titre"=>"formulaire_candidature",
      "messages"=>array()
    );
    Flight::render('formulaire_candidature.tpl',$data);
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