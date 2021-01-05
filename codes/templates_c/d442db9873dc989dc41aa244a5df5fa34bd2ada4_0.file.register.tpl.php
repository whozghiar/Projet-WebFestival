<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 17:46:32
  from 'C:\projetWEB\codes\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff4a5f862c5c8_96731515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd442db9873dc989dc41aa244a5df5fa34bd2ada4' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\register.tpl',
      1 => 1609868762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff4a5f862c5c8_96731515 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
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
                   
                    <input class = "fadeIn second" type = "text"  name = "prenom" placeholder="prenom" value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prenom']->value)===null||$tmp==='' ? '' : $tmp);?>
"><div class="erreur"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['prenom'])===null||$tmp==='' ? '' : $tmp);?>
</div>
                
                    <input class = "fadeIn third" type = "text" name="nom" placeholder="nom" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nom']->value)===null||$tmp==='' ? '' : $tmp);?>
"> <div class="erreur"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['nom'])===null||$tmp==='' ? '' : $tmp);?>
</div>
            
                    <input class = "fadeIn fourth" type="email" name="email" placeholder="Email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['email']->value)===null||$tmp==='' ? '' : $tmp);?>
"  required> <div class="erreur"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['email'])===null||$tmp==='' ? '' : $tmp);?>
</div>
            
                    <input class ="fadeIn fifth" type="password"  name="passe" placeholder="Mot de passe" required> <div class="erreur"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['passe'])===null||$tmp==='' ? '' : $tmp);?>
</div>
                
                    <p> <input class = "fadeIn six" type ="submit" value = "S'inscrire"> </p>
            </div> 
        </div> 
    
</form>

    </body>
</html><?php }
}
