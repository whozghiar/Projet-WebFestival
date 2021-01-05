<html>
    <head>
        
        <link href="css/login.css" type="text/css" rel="stylesheet" >
        <link href="css/index.css" type="text/css" rel="stylesheet" >
        <meta name= "viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" type="image/x-icon" href="https://www.flaticon.com/svg/static/icons/svg/3022/3022607.svg">

        <title>Connexion</title>
        <!--
        Affiche un formulaire où il suffit d'entrer Email et mot de passe
        Ainsi qu'un bouton "Se connecter"
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
                <h1> Connexion </h1>
            </div>
        </div>

        <br> 
    <div class = "wrapper fadeInDown">
        <div id = "formContent">
            <form action="login" method="POST">

                <input class = "fadeIn second" type="email" name="email" placeholder="Email" value="{$email|default:''}"  required> <br> <div class="erreur">{$messages.Email|default:''}</div>
                
                <br>
                
                <input class ="fadeIn third" type="password"  name="passe" placeholder="Mot de passe" required> <br> <div class="erreur">{$messages.passe|default:''}</div>

                <p> <input class = "fadeIn fourth" type ="submit" value = "Se connecter"> </p>
        </div>
    </div>

    </body>
</html>