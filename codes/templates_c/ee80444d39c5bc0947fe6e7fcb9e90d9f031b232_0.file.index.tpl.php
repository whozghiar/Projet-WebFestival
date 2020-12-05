<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-05 15:13:12
  from 'C:\public_html\codes\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fcba3880f89a5_41094030',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee80444d39c5bc0947fe6e7fcb9e90d9f031b232' => 
    array (
      0 => 'C:\\public_html\\codes\\templates\\index.tpl',
      1 => 1607181128,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcba3880f89a5_41094030 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>index</title>
    </head>
    <body>
        <h1> Accueil </h1>
            <?php if ((isset($_smarty_tpl->tpl_vars['user']->value))) {?>
            <p> <h2> Salut <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 ! </h2> </p>
            
            <br>
            <br>

            <a href="logout"><input type="button" value="Se déconnecter"> </a>
            <br>
            <br>
            <a href="profil"><input type="button" value="Voir le profil"> </a>


            <?php } else { ?>
            <p>  Vous êtes déjà inscrits ? <a href="login"> Connectez vous </a> </p> 
                <br> <br> 
                OU 
                <br> <br>
            <p> <a href = "register"> Inscrivez vous </a> <br> Vous verrez, c'est cool !  </p>
            <?php }?>
    </body>
</html> <?php }
}
