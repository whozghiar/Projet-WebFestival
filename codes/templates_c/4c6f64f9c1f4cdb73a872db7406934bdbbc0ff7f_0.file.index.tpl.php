<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-21 14:04:24
  from 'C:\laragon\www\projetWEB\codes\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe0ab68cf7294_31600631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4c6f64f9c1f4cdb73a872db7406934bdbbc0ff7f' => 
    array (
      0 => 'C:\\laragon\\www\\projetWEB\\codes\\templates\\index.tpl',
      1 => 1608557543,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe0ab68cf7294_31600631 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
	    <link href="css/index.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>index</title>
    </head>
    <body>
        <h1> Accueil </h1>
            <?php if ((isset($_smarty_tpl->tpl_vars['user']->value))) {?>
            <p> <h2> Bonjour <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 ! </h2> </p>
            <br>
            <p> <h3> Vous pouvez désormais naviguer sur le site. </h3> </p>
            <br>
            <br>

            <a href="logout"><input type="button" value="Se déconnecter"> </a>
            <br>
            <br>
            <a href="profil"><input type="button" value="Voir le profil"> </a>


            <?php } else { ?>
            <p>  Vous êtes déjà inscrits ? <a href="login"> Connectez vous </a> </p> 
                <br> <br> 
                <p> OU <p> 
                <br> <br>
            <p> <a href = "register"> Inscrivez vous </a> <br> Vous verrez, c'est cool !  </p>
            <?php }?>
    </body>
</html> <?php }
}
