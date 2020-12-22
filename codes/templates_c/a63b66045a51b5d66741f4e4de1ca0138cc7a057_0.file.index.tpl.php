<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-22 13:31:33
  from 'C:\git\projetWEB\codes\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe1f5350a74f5_70220475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a63b66045a51b5d66741f4e4de1ca0138cc7a057' => 
    array (
      0 => 'C:\\git\\projetWEB\\codes\\templates\\index.tpl',
      1 => 1608643888,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe1f5350a74f5_70220475 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
	    <link href="css/index.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>index</title>
    </head>
    <body>
        <div class="fadeIn H">
            <h1> Accueil </h1>
        
                <?php if ((isset($_smarty_tpl->tpl_vars['user']->value))) {?>
                <p> <h2> Bonjour <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 ! </h2> </p>
                <br>
                <p> <h3> Vous pouvez désormais naviguer sur le site. </h3> </p>
                <br>
                <br>
            <div class = "wrapper fadeInDown">
            <div id = "formContent">
                <a href="logout"><input class = "fadeIn fourth" type="button" value="Se déconnecter"> </a>
                <br>
                <br>
                <a href="candidature"><input class = "fadeIn fourth" type="button" value="Candidater"> </a>
            </div>
            </div>

                <?php } else { ?>
                <p>  Vous êtes déjà inscrits ? <a href="login"> Connectez vous </a> </p> 
                    <br> <br> 
                    <p> OU <p> 
                    <br> <br>
                <p> <a href = "register"> Inscrivez vous </a> <br> Vous verrez, c'est cool !  </p>
                <?php }?>
        </div>
    </body>
</html> <?php }
}
