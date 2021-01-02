<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-02 18:33:33
  from 'C:\projetWEB\codes\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff0bc7dc9b170_51859246',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd442db9873dc989dc41aa244a5df5fa34bd2ada4' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\register.tpl',
      1 => 1609608921,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff0bc7dc9b170_51859246 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
            <link href="css/register.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Inscription</title>
    </head>
    <header>
        <a class="header" href="/codes">
        <img class="header" src="/images/home.png">
        </a>
    </header>
    <body>
        <div class="fadeIn H1">
            <h1> Inscription : </h1>
        </div>




        <div class = "wrapper fadeInDown"> 
            <div id = "formContent">
                <form action="register" method="POST">
                   
                    <input class = "fadeIn second" type = "text"  name = "prenom" placeholder="prenom" value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prenom']->value)===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['prenom'])===null||$tmp==='' ? '' : $tmp);?>

                
                    <input class = "fadeIn third" type = "text" name="nom" placeholder="nom" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nom']->value)===null||$tmp==='' ? '' : $tmp);?>
"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['nom'])===null||$tmp==='' ? '' : $tmp);?>

            
                    <input class = "fadeIn fourth" type="email" name="email" placeholder="Email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['email']->value)===null||$tmp==='' ? '' : $tmp);?>
"  required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['Email'])===null||$tmp==='' ? '' : $tmp);?>

            
                    <input class ="fadeIn fifth" type="password"  name="passe" placeholder="Mot de passe" required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['passe'])===null||$tmp==='' ? '' : $tmp);?>

                
                    <p> <input class = "fadeIn six" type ="submit" value = "S'inscrire"> </p>
            </div> 
        </div> 
    
</form>

    </body>
</html><?php }
}
