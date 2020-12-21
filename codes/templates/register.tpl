<!doctype html>
<html>
    <head>
            <link href="css/register.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>{$titre}</title>
    </head>
    <body>

        <h1> Inscription : </h1>


<form action="register" method="POST">

    <fieldset>
        <div>
            <label for="aligned-name"> Prénom : </label>
            <input type = "text"  name = "prenom" placeholder="prenom" value = "{$prenom|default:''}">{$messages.prenom|default:''}
        <div>
        <div> 
            <label> Nom : </label> 
            <input type = "text" name="nom" placeholder="nom" value="{$nom|default:''}"> {$messages.nom|default:''}
        <div> 
        <div> 
            <label> Email : </label> 
            <input type = "email" name="email" placeholder="email" value="{$email|default:''}"> {$messages.email|default:''}
        <div> 
        <div> 
            <label>  Mot De Passe : </label> 
            <input type = "password" name="passe" placeholder="mot de passe"> {$messages.passe|default:''}
        <div> 
        <div> 
            <input class="bouton" type ="submit"> 
        <div> 
    </fieldset>
</form>

    </body>
</html>