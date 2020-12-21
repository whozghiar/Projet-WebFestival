<!doctype html>
<html>
    <head>
	    <link href="css/index.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>index</title>
    </head>
    <body>
        <div class="fadeIn H">
            <h1> Accueil </h1>
        
                {if isset ($user)}
                <p> <h2> Bonjour {$user} ! </h2> </p>
                <br>
                <p> <h3> Vous pouvez désormais naviguer sur le site. </h3> </p>
                <br>
                <br>
            <div class = "wrapper fadeInDown">
            <div id = "formContent">
                <a href="logout"><input class = "fadeIn fourth" type="button" value="Se déconnecter"> </a>
                <br>
                <br>
                <a href="profil"><input class = "fadeIn fourth" type="button" value="Candidater"> </a>
            </div>
            </div>

                {else}
                <p>  Vous êtes déjà inscrits ? <a href="login"> Connectez vous </a> </p> 
                    <br> <br> 
                    <p> OU <p> 
                    <br> <br>
                <p> <a href = "register"> Inscrivez vous </a> <br> Vous verrez, c'est cool !  </p>
                {/if}
        </div>
    </body>
</html> 