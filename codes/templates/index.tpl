<!doctype html>
<html>
    <head>
	    <link href="css/index.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>index</title>
    </head>
    <body>
        <div class="fadeIn H">
            <div class="page-title-holder">
                <h1> Accueil </h1>
            </div>
        
                {if isset ($user)}
                <p> <h2> Bonjour {$user} ! </h2> </p>
                <br>
                <p> <h3> Vous pouvez désormais naviguer sur le site. </h3> </p>

            <div class = "wrapper fadeInDown">
            <div id = "formContent">
                <a href="candidature" class="btns">Candidater </a>
                <br>
                <br>
                <a href="logout" class="logout">Se déconnecter </a>
            </div>
            </div>

                {else}
                <p>  Vous êtes déjà inscrits ? 
                    <br><br> <br>
                    <a href="login" class="btns"> Connectez vous </a> </p> 
                    <br> 
                    <p> OU <p> 
                    <br> 
                <p> <a href = "register" class="btns"> Inscrivez vous </a> <br> Vous verrez, c'est cool !  </p>
                {/if}
        </div>
    </body>
</html> 