<!doctype html>
<html>
    <head>
        <link href="css/index.css" type="text/css" rel="stylesheet" >
        <link rel="icon" type="image/x-icon" href="https://www.flaticon.com/svg/static/icons/svg/3022/3022607.svg">
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Accueil Festival</title>
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
        
                {if isset ($user)} <!-- On regarde si la personne est déjà connectée, si c'est le cas, il y a trois cas : -->
                    <p> <h2> Bonjour {$user} ! </h2> </p>
                    <br>
                    <p> <h3> Vous pouvez désormais naviguer sur le site. </h3> </p>

                    <div class = "wrapper fadeInDown">
                    <div id = "formContent">
                        {if ($candidat==1)} <!-- Dans le premier cas, la personne n'a pas fait de cancidature, il y a alors deux boutons : candidater et se déconnecter  -->
                        <a href="candidature" class="btns">Candidater </a>
                        {else} <!-- Dans le deuxième cas, la personne a fait une cancidature, il y a alors deux boutons : voir ma candidature et se déconnecter  -->
                        <a href="detail_candidature" class="btns">Voir ma candidature </a>
                        {/if}
                        <!-- Dans le dernier cas, la personne est un administrateur, il y a alors 4 boutons : voir ma candidature, liste des candidatures, liste des utilisateurs et se déconnecter  -->
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
                    
                {else} <!-- Sinon si la personne n'est pas connectée il y a deux boutons : connectez-vous et inscrivez-vous -->
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