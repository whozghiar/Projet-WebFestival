<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-22 22:09:49
  from 'C:\public_html\codes\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe26ead7a3b92_59938318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee80444d39c5bc0947fe6e7fcb9e90d9f031b232' => 
    array (
      0 => 'C:\\public_html\\codes\\templates\\index.tpl',
      1 => 1608674987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe26ead7a3b92_59938318 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
	    <link href="css/index.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>index</title>
    </head>
    <body>
        <div class="fadeIn H">
            <div class="page-title-holder">
                <h1> Accueil </h1>
            </div>
        
                <?php if ((isset($_smarty_tpl->tpl_vars['user']->value))) {?>
                <p> <h2> Bonjour <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 ! </h2> </p>
                <br>
                <p> <h3> Vous pouvez désormais naviguer sur le site. </h3> </p>

            <div class = "wrapper fadeInDown">
            <div id = "formContent">
                <a href="candidature" class="btns">Candidater </a>
                <br>
                <br>
                <a href="logout" class="logout">Se déconnecter </a>
            </div>
            </div>

                <?php } else { ?>
                <p>  Vous êtes déjà inscrits ? 
                    <br><br> <br>
                    <a href="login" class="btns"> Connectez vous </a> </p> 
                    <br> 
                    <p> OU <p> 
                    <br> 
                <p> <a href = "register" class="btns"> Inscrivez vous </a> <br> Vous verrez, c'est cool !  </p>
                <?php }?>
        </div>
    </body>
</html> <?php }
}
