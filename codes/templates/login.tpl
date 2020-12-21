<html>
    <head>
        
        <link href="css/login.css" type="text/css" rel="stylesheet" >
        <meta name= "viewport" content="width=device-width, initial-scale=1">
        
        <title>Login</title>
    </head>
    <body>
        <div class="fadeIn H1">
            <h1> Connexion : </h1>
        </div>

        <br> 
    <div class = "wrapper fadeInDown">
        <div id = "formContent">
            <form action="login" method="POST">

                <input class = "fadeIn second" type="email" name="email" placeholder="Email" value="{$email|default:''}"  required> {$messages.Email|default:''}
                
                <br>
                
                <input class ="fadeIn third" type="password"  name="passe" placeholder="Mot de passe" required> {$messages.passe|default:''}

                <p> <input class = "fadeIn fourth" type ="submit" value = "Se connecter"> </p>
        </div>
    </div>

    </body>
</html>