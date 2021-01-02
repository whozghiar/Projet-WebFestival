<!doctype html>
<html>
    <head>
	    <link href="css/index.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>index</title>
    </head>
    <header>
        <a class="header" href="/codes">
        <img class="header" src="/images/home.png">
        </a>
    </header>
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
                        {if ($candidat==1)}
                        <a href="candidature" class="btns">Candidater </a>
                        {else}
                        <a href="detail_candidature" class="btns">Voir ma candidature </a>
                        {/if}
                        {if $userType=="Administrateur" || $userType=="Responsable"}
                        <br>
                        <a href="liste" class="btns">Liste des candidatures </a>
                        {/if}
                        {if $userType=="Administrateur"}
                        <br>
                        <a href="userListe" class="btns">Liste des utilisateurs </a>
                        {/if}
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