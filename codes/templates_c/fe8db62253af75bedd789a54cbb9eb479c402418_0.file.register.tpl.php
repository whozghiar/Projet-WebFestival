<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-21 17:20:49
  from 'C:\git\projetWEB\codes\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe0d97188ebc7_75511644',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe8db62253af75bedd789a54cbb9eb479c402418' => 
    array (
      0 => 'C:\\git\\projetWEB\\codes\\templates\\register.tpl',
      1 => 1608571080,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe0d97188ebc7_75511644 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
            <link href="css/register.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
    </head>
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
