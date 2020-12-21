<!doctype html>
<html>
    <head>
            <link href="css/register.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>{$titre}</title>
    </head>
    <body>
        <div class="fadeIn H1"
            <h1> Inscription : </h1>
        </div>




        <div class = "wrapper fadeInDown"> 
            <div id = "formContent">
                <form action="register" method="POST">
                   
                    <input class = "fadeIn second" type = "text"  name = "prenom" placeholder="prenom" value = "{$prenom|default:''}">{$messages.prenom|default:''}
                
                    <input class = "fadeIn third" type = "text" name="nom" placeholder="nom" value="{$nom|default:''}"> {$messages.nom|default:''}
            
                    <input class = "fadeIn fourth" type="email" name="email" placeholder="Email" value="{$email|default:''}"  required> {$messages.Email|default:''}
            
                    <input class ="fadeIn fifth" type="password"  name="passe" placeholder="Mot de passe" required> {$messages.passe|default:''}
                
                    <p> <input class = "fadeIn six" type ="submit" value = "S'inscrire"> </p>
            </div> 
        </div> 
    
</form>

    </body>
</html>