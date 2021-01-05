<!doctype html>
<html>
    <head>
            <link href="css/index.css" type="text/css" rel="stylesheet" >
            <link href="css/register.css" type="text/css" rel="stylesheet" >
            <link rel="icon" type="image/x-icon" href="https://www.flaticon.com/svg/static/icons/svg/3022/3022607.svg">
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Inscription</title>
            <!--
            Affiche un formulaire où il faut entrer : prénom, nom, email et mot de passe
            Ainsi qu'un bouton "S'inscrire'"
            -->
    </head>
    <header>
        <a class="header" href="/codes">
        <img class="header" src="/images/home.png">
        </a>
    </header>
    <body>
        <div class="fadeIn H1">
            <div class="page-title-holder">
                <h1> Inscription </h1>
            </div>
        </div>




        <div class = "wrapper fadeInDown"> 
            <div id = "formContent">
                <form action="register" method="POST">
                   
                    <input class = "fadeIn second" type = "text"  name = "prenom" placeholder="prenom" value = "{$prenom|default:''}"><div class="erreur">{$messages.prenom|default:''}</div>
                
                    <input class = "fadeIn third" type = "text" name="nom" placeholder="nom" value="{$nom|default:''}"> <div class="erreur">{$messages.nom|default:''}</div>
            
                    <input class = "fadeIn fourth" type="email" name="email" placeholder="Email" value="{$email|default:''}"  required> <div class="erreur">{$messages.email|default:''}</div>
            
                    <input class ="fadeIn fifth" type="password"  name="passe" placeholder="Mot de passe" required> <div class="erreur">{$messages.passe|default:''}</div>
                
                    <p> <input class = "fadeIn six" type ="submit" value = "S'inscrire"> </p>
            </div> 
        </div> 
    
</form>

    </body>
</html>