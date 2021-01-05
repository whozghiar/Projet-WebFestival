<?php

require('../includes/pdo.php');

/**   
    * Cette fonction permet de nettoyer les noms des fichiers en enlevant les caractères spéciaux.
    *
    * @param nom Le nom du fichier à nettoyer.
    *
    * @return preg_replace[...], le nom nettoyé.
*/ 
function nettoyer_nom_fichier($nom){
    $transliterator = Transliterator::createFromRules(
    ':: NFD; :: [:Nonspacing Mark:] Remove; ::NFC;', Transliterator::FORWARD
    );
    $normalized = $transliterator->transliterate($nom);
    return preg_replace("/[^a-zA-Z0-9\.]/","-",$normalized);
    }

/** 
 * Cette fonction permet de vérifier les membres d'un groupe.
 * 
 * @param nomMembre le nom du Membre à vérifier
 * @param prenomMembre le prénom du Membre à vérifier
 * @param instrumentMembre l'instrument du Membre à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si les champs ne sont pas remplis, la variable erreur passe à True.
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 * 
*/ 
function verifMembre($nomMembre,$prenomMembre,$instrumentMembre,&$messages,&$erreur){

    for($i=1;$i<=sizeof($nomMembre);$i++){
        if (empty($nomMembre[$i]) or empty($prenomMembre[$i]) or empty($instrumentMembre[$i])){
          $erreur = True; 
          $messages['membre'] = "Veuillez completer tous les champs des membres";
        }
      }

}

/** 
 * Cette fonction permet de vérifier le nom du groupe.
 *
 * @param nomGrp Le nom du groupe à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ est vide, la variable erreur passe à True.
 * Si le champ a une longueur supérieure à 30 caractères, la variable erreur passe à True.
 * 
 * En cas d'erreur, On ajoute un message d'erreur personnalisé.
 *
 *  @return Void la fonction ne retourne rien.
 * 
*/ 
function verifNomGroupe($nomGrp,&$messages,&$erreur){

    if (empty($nomGrp)){
        $erreur = True; 
        $messages['nomGrp'] = "Veuillez saisir un nom de groupe";
    }

    if (strlen($nomGrp)>30){
        $erreur = True;
        $messages['nomGrp'] = "Veuillez saisir un nom plus court (-30 caractères)";
        $_POST['nomGrp']="";
    }

}

/** 
 * Cette fonction permet de vérifier l'année de création du groupe.
 * 
 * @param anneeCrea L'année de création du groupe à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ est vide, la variable erreur passe à True.
 * Si le champ n'est pas numérique, la variable erreur passse à True. 
 * Si le nombre de caractère du champ est supérieur à 4 ou inférieur à 4 , la variable erreur passe à True.
 * Si l'année de création est inférieure ou égale à 1930 OU supérieure ou égale à 2021, la variable erreur passe à True.
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 * 
 * 
 * 
 */
function verifAnnee($anneeCrea,&$messages,&$erreur){
    if(empty($anneeCrea)){
        $erreur = True;
        $messages['anneeCrea'] = "Veuillez saisir une année.";
      }
  
      if (!is_numeric($anneeCrea)){
        $erreur = True;
        $messages['anneeCrea'] = "Veuillez saisir une année valide.";
        $_POST['annee']="";
      }
  
      if ((strlen($anneeCrea) > 4) or (strlen($anneeCrea) < 4)){
        $erreur = True;
        $messages['anneeCrea'] = "L'année est incorrecte, veuillez rééssayer";
        $_POST['annee']="";
      }
  
      if ((intval($anneeCrea)<=1930) and (intval($anneeCrea)>=2021)){
        $erreur = True;
        $messages['anneeCrea'] = "Veuillez saisir une année entre 1930 et 2021";
        $_POST['annee']="";
      }
    
}


/** 
 * Cette fonction permet de vérifier si le champ pour l'URL Facebook ou du site existe et si sont correctement remplis.
 * 
 * @param urlFB L'url Facebook ou du site du groupe à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ est vide, la variable erreur passe à True.
 * Si le champ n'est pas vide : 
 *  Si le champ n'est pas un url valide et ne contient pas le mot "soundcloud" dedans, la variable erreur passe à True. 
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 */
function verifUrlFb($urlFB,&$messages,&$erreur){
    if(empty($urlFB)){
        $erreur = True;
        $messages['urlFB'] = "<br> Veuillez saisir une URL Facebook.";

      }
      else {
        if(!filter_var($urlFB, FILTER_VALIDATE_URL)){
            $erreur = True;
            $messages['urlFB'] = "<br> Veuillez saisir une URL valide.";
            $_POST['facebook']="";
        }
      }
}

/** Cette fonction permet de vérifier si le champ pour l'URL SoundCloud est correctement remplis.
 * 
 * @param urlSC L'url SoundCloud du groupe à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ n'est pas vide : 
 *  Si le champ n'est pas un url valide et ne contient pas le mot "soundcloud" dedans, la variable erreur passse à True. 
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
*/
function verifUrlSc($urlSC,&$messages,&$erreur){
    if(!empty($urlSC)){
        if((!filter_var($urlSC, FILTER_VALIDATE_URL)) or (strpos($urlSC,'soundcloud')==FALSE)){
            $erreur = True;
            $messages['urlSC'] = "<br> Veuillez saisir une URL Soundclound valide.";
            $_POST['soundcloud']="";
      }}
}

/** Cette fonction permet de vérifier si le champ pour l'URL YouTube est correctement remplis.
 * 
 * @param urlSC L'url YouTube ou du site du groupe à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ n'est pas vide : 
 *  Si le champ n'est pas un url valide et ne contient pas le mot "Youtube" dedans, la variable erreur passse à True. 
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 * 
 */
function verifUrlYt($urlYT,&$messages,&$erreur){
    if (!empty($urlYT)){
        if((!filter_var($urlYT, FILTER_VALIDATE_URL)) or (strpos($urlYT,'youtube')==FALSE)){
            $erreur = True;
            $messages['urlYT'] = "<br> Veuillez saisir une URL YouTube valide.";
            $_POST['youTube']="";
        }
      }
      
}

/**
 * Cette fonction permet de vérifier le code Postal.
 * 
 * @param cp Le code postal à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ est vide, la variable erreur passe à True. 
 * Si le champ n'est pas en format numérique, la variable erreur passe à True.
 * Si le champ a un nombre de caractères inférieur ou supérieur à 5, la variable erreur passe à True.
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 * 
 * 
*/
function verifCodePostal($cp,&$messages,&$erreur){

    if (empty($cp)){
        $erreur = True;
        $message['cp'] = "Veuillez saisir un code postal.";
        $_POST['codePostal'] = "";
    }

    if (!is_numeric($cp)){
        $erreur = True;
        $messages['cp'] = "Veuillez saisir un code postal valide.";
        $_POST['codePostal']="";
    }

    if((strlen($cp) < 4) or (strlen($cp) > 5)){
        $erreur = True;
        $messages['cp'] = "Veuillez saisir un code postal valide (entre 5 et 6 chiffres).";
        $_POST['codePostal'] = "";
    }
}

/**
 * Cette fonction permet de vérifier le texte de présentation du groupe.
 * 
 * @param presTexte Le texte de présentation à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ est vide, la variable erreur passe à True. 
 * Si le champ est en format numérique, la variable erreur passe à True.
 * Si le champ a un nombre de caractères supérieur à 500 caractères, la variable erreur passe à True.
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 *
 */
function verifPresTexte($presTexte,&$messages,&$erreur){
    
    if (empty ($presTexte)){
        $erreur = True;
        $messages['presTexte'] = "Veuillez présenter votre groupe. (500 car. max)";
    }

    if (is_numeric($presTexte)){
        $erreur = True;
        $messages['presTexte'] = "Utilisez des lettres !";
        $_POST['presTexte']="";
    }

    if (strlen($presTexte) > 500){
        $erreur = True;
        $messages['presTexte'] = "Votre texte dépasse les 500 caractères.";
        $_POST['presTexte']="";
    }

}

/**
 * Cette fonction permet de vérifier le texte d'expérience scénique du groupe.
 * 
 * @param expScenique Le texte d'expérience scénique à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ est vide, la variable erreur passe à True. 
 * Si le champ est en format numérique, la variable erreur passe à True.
 * Si le champ a un nombre de caractères supérieur à 500 caractères, la variable erreur passe à True.
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 *
 */

function verifExpScenique($expScenique,&$messages,&$erreur){

    if (empty ($expScenique)){
        $erreur = True;
        $messages['expScenique'] = "Veuillez présenter votre expérience scénique. (500 car. max)";
    }

    if (is_numeric($expScenique)){
        $erreur = True;
        $messages['expScenique'] = "Utilisez des lettres !";
        $_POST['expScenique']="";
    }

    if (strlen($expScenique) > 500){
        $erreur = True;
        $messages['expScenique'] = "Votre texte dépasse les 500 caractères.";
        $_POST['expScenique']="";
    }
}

/**
 * Cette fonction permet de vérifier la ville du représentant du groupe.
 * 
 * @param villeRep La ville du représentant à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ est vide, la variable erreur passe à True. 
 * Si le champ est en format numérique, la variable erreur passe à True.
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 *
 */

function verifVille($villeRep,&$messages,&$erreur){
    if (empty ($villeRep)){
        $erreur = True;
        $messages['villeRep'] = "Saisissez votre ville.";
      }

      if (is_numeric($villeRep)){
        $erreur = True;
        $messages['villeRep'] = "Utilisez des lettres !";
        $_POST['ville']="";
      }

}

/**
 * Cette fonction permet de vérifier le style musical du groupe.
 * 
 * @param styleMus Le style musical du groupe à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ est vide, la variable erreur passe à True. 
 * Si le champ est en format numérique, la variable erreur passe à True.
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 *
 */
function verifStyle($styleMus,&$messages,&$erreur){
    if (empty ($styleMus)){
        $erreur = True;
        $messages['styleMus'] = "Veuillez présenter votre style musical.";
      }

      if (is_numeric($styleMus)){
        $erreur = True;
        $messages['styleMus'] = "Utilisez des lettres !";
        $_POST['styleMus']="";
      }
}

/**
 * Cette fonction permet de vérifier le N° de tel du groupe.
 * 
 * @param tel Le téléphone du groupe à vérifier
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * 
 * Si le champ est vide, la variable erreur passe à True. 
 * Si le champ n'est pas en format numérique, la variable erreur passe à True.
 * Si le champ a un nombre de caractères inférieur à 10 caractères ou supérieur à 10 caractères, la variable erreur passe à True.
 * 
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 *
 */
function verifTel($tel,&$messages,&$erreur){
    if (empty ($tel)){
        $erreur = True;
        $messages['tel'] = " Veuillez saisir votre N° de téléphone";
      }

      if (!is_numeric($tel)){
        $erreur = True;
        $messages['tel'] = " Utilisez des chiffres !";
        $_POST['tel']="";
      }

      if ((strlen(trim($tel))>10) or (strlen(trim($tel))<10) ){
        $erreur = True;
        $messages['tel'] = " N° Incorrect, Réessayez avec un N° de téléphone au bon format !";
        $_POST['tel']="";        
      }
}


/**
 * Cette fonction permet de vérifier le fichier PDF du groupe envoyé.
 * 
 * @param typefichier Le type du fichier envoyé.
 * @param nomWeb le nom du fichier envoyé.
 * @param size la taille du fichier envoyé
 * @param nomTmp le nom temporaire du fichier envoyé.
 * @param CodeErr le code d'erreur associé au fichier envoyé. 
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * @param nomGrp le nom du groupe auquel correspond le fichier envoyé.
 * 
 * S'il n'y a pas d'erreur, on nettoie le nom du fichier.
 * 
 * Si le le fichier existe et qu'il n'y a pas de code d'erreur : 
 *  Si la taille est supérieure à 1,5 Mo, la variable erreur passe à True.
 *  
 *  Sinon on récupère l'extension du fichier, on la vérifie, si elle n'est pas en .PDF, la variable erreur passe à True.
 * 
 * Sinon, la variable erreur passe à True.
 *  
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 *
 */

function verifFichierPDF($typefichier,&$nomWeb,$size,$nomTmp,$CodeErr,&$messages,&$erreur,$nomGrp){

        if (isset($_FILES["$typefichier"]) AND $CodeErr == 0){
          if ($size<= 1500000){
            $infosfichier = pathinfo($nomWeb);
            $extension_fichier = $infosfichier['extension'];
            $extension_verif = 'pdf';
            if ($extension_fichier==$extension_verif){
                $nomWeb=nettoyer_nom_fichier($nomWeb);
            }
            else {
              $erreur = True;
              $messages["$typefichier"] = "Veuillez joindre un fichier au format PDF.";
            }

          }
          else{
            $erreur = True;
            $messages["$typefichier"] = "Fichier trop lourd";
          }
        }
        else{
          $erreur = True;
          $messages["$typefichier"] = "Erreur lors de l'upload du fichier.";
        }

}

/**
 * Cette fonction permet de vérifier les photos du groupe envoyées.
 * 
 * @param nomWebGrp Le nom de la photo envoyée.
 * @param sizeGrp La taille du fichier envoyé.
 * @param nomTmpGrp le nom temporaire du fichier envoyé.
 * @param CodeErrGrp le code d'erreur associé au fichier envoyé. 
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * @param nomGrp le nom du groupe auquel correspond le fichier envoyé.
 * 
 * S'il n'y a pas d'erreur, on nettoie le nom du fichier.
 * 
 * Si le le fichier existe et qu'il n'y a pas de code d'erreur : 
 *  Si la taille est supérieure à 6 Mo, la variable erreur passe à True.
 *  
 *  Sinon on récupère l'extension du fichier, on la vérifie, si elle n'est pas en .png;.jpeg;.jpg;.gif, la variable erreur passe à True.
 * 
 * Sinon, la variable erreur passe à True.
 *  
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 *
 */

function verifPhotos(&$nomWebGrp,$sizeGrp,$nomTmpGrp,$codeErrGrp,&$messages,&$erreur,$nomGrp){

    for($i=1;$i<=2;$i++){
    if (isset($_FILES["photoGrp$i"]) AND $codeErrGrp[$i] == 0){
              
        if ($sizeGrp[$i] <= 6000000){

          $infosfichier = pathinfo($nomWebGrp[$i]);
          $extension_fichier = pathinfo($nomWebGrp[$i], PATHINFO_EXTENSION); //infosfichier['extension'];
          $extension_verif = array('png','jpeg','jpg','gif');
          if (in_array($extension_fichier,$extension_verif)){
            $nomWebGrp[$i]=nettoyer_nom_fichier($nomWebGrp[$i]);
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
}

/**
 * Cette fonction permet de vérifier les extraits de musiques du groupe envoyés.
 * 
 * @param nomWebmus Le nom de la musique envoyée.
 * @param sizemus La taille du fichier envoyé.
 * @param nomTmpmus le nom temporaire du fichier envoyé.
 * @param codeErrmus le code d'erreur associé au fichier envoyé. 
 * @param messages Un tableau associatif de messages d'erreur. 
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * @param nomGrp le nom du groupe auquel correspond le fichier envoyé.
 * 
 * S'il n'y a pas d'erreur, on nettoie le nom du fichier.
 * 
 * Si le le fichier existe et qu'il n'y a pas de code d'erreur : 
 *  Si la taille est supérieure à 20 Mo, la variable erreur passe à True.
 *  
 *  Sinon on récupère l'extension du fichier, on la vérifie, si elle n'est pas en .mp3 , la variable erreur passe à True.
 * 
 * Sinon, la variable erreur passe à True.
 *  
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * 
 * @return Void la fonction ne retourne rien.
 *
 */

function verifMusiques(&$nomWebmus,$sizemus,$nomTmpmus,$codeErrmus,&$messages,&$erreur,$nomGrp){

    for($i=1;$i<=3;$i++){
        if (isset($_FILES["mus$i"]) AND $codeErrmus[$i] == 0){
              
            if ($sizemus[$i] <= 20000000){
  
              $infosfichier = pathinfo($nomWebmus[$i]);
              $extension_fichier = pathinfo($nomWebmus[$i], PATHINFO_EXTENSION);
              $extension_verif = 'mp3';
              if ($extension_fichier==$extension_verif){
                $nomWebmus[$i]=nettoyer_nom_fichier($nomWebmus[$i]);
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

/** Cette fonction permet de déplacer le fichier
 * 
 * @param nomTmp Le nom temporaire du fichier (nom du fichier à l'envoie)
 * @param nomGrp Le nom du groupe auqel appartient le fichier.
 * @param nomWeb Le nom que le fichier aura dans le dossier de stockage. 
 * 
 * @return Void la fonction ne retourne rien.
 */
function uploadFile($nomTmp,$nomGrp,$nomWeb){
    move_uploaded_file($nomTmp,"../data/upload/$nomGrp ".basename($nomWeb));
}

/** Cette fonction permet de vérifier les identifiants de l'utilisateur. 
 * 
 * @param mail Le nom temporaire du fichier (nom du fichier à l'envoie)
 * @param mdp Le nom du groupe auqel appartient le fichier.
 * @param erreur Un booléen qui passe à True en cas d'erreur.
 * @param messages Un tableau associatif de messages d'erreur. 
 * 
 * Si le champ du mail est vide, la variable erreur passe à True.
 * Si le champ du mot de passe est vide, la variable erreur passe à True.
 * 
 * Sinon, on vérifie la correspondance avec la base de données.
 *  Si aucune ligne n'est retournée par la requête de vérification du mail, la variable erreur passe à True.
 *  Si le mot de passe n'est pas vérifié, la variable erreur passe à True.
 *  
 * En cas d'erreur, on ajoute un message d'erreur personnalisé.
 * @return Void la fonction ne retourne rien.
 */

function verifLogs($mail,$mdp,&$erreur,&$messages){

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
            $compte = $req -> fetch();
        }

        if (isset($compte)){
            if (password_verify($mdp,$compte[5])){

                $_SESSION['user'] = $compte[4];
                $_SESSION['mail'] = $compte[2];
                $_SESSION['userType'] = $compte[1];
                $_SESSION['candidat'] = $compte[6];
                $_SESSION['id'] = $compte[0];
      
            }

            else{
                $erreur = True;
                $messages['passe'] = "Mot de passe incorrect";
            }
        }
    }

}


function verifRegister($prenom,$nom,$mail,$mdp,&$erreur,&$messages){
    if (empty($prenom)){
        $erreur = True;
        $messages["prenom"] = '<br>Vous devez saisir un Prénom.';
      }
    
      if (empty($nom)){
        $erreur = True;
        $messages["nom"] = '<br>Vous devez saisir un Nom.';
      }
      if (empty($mail)){
        $erreur = True;
        $messages["email"] = '<br>Vous devez saisir une Email.';
      }
    
      elseif (!filter_var($mail,FILTER_VALIDATE_EMAIL)){
        $erreur = True;
        $messages["email"]='<br>Vous devez saisir une Email VALIDE.';
      }
    
      if (empty($mdp)){
        $erreur = True;
        $messages["passe"] = '<br>Vous devez saisir un mot de passe.';
      }
    
      elseif  (strlen($mdp) < 8 ){
        $erreur = True;
        $messages["passe"] = '<br>Votre mot de passe doit faire 8 caractères minimum.';
      }
    
      else {
        $db = Flight::get('db');
        // MAIL
        $req = $db -> prepare( "SELECT mail FROM utilisateurs where mail = :mail");
        $req -> execute (array(':mail' => "$mail"));
    
        if ($req -> rowCount() > 0)
        {
          $erreur = True;
          $messages['email'] = '<br> Email déjà existante.';
        }
      }
    
}