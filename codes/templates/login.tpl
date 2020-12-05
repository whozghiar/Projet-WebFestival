

<!doctype html>
<html>
    <head>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Register</title>
    </head>

<form action="register" method="POST
    <p> <label> Email : </label> <input type = "email" name="email" value="{$email|default:''}"> {$messages.email|default:''}</p>
    <p> <label>  Mot De Passe : </label> <input type = "password" name="passe"> {$messages.passe|default:''}</p>
    <p> <input type ="submit"> </p>
</form>
