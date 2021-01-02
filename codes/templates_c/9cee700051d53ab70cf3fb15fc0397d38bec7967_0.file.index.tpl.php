<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-02 18:09:55
  from 'C:\projetWEB\codes\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff0b6f36fee99_75199534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cee700051d53ab70cf3fb15fc0397d38bec7967' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\index.tpl',
      1 => 1609610994,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff0b6f36fee99_75199534 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
	    <link href="css/index.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>index</title>
    </head>
    <header>
        <a class="header" href="/codes">
        <img class="header" src="/images/home.png">
        </a>
    </header>
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
                        <?php if (($_smarty_tpl->tpl_vars['candidat']->value == 1)) {?>
                        <a href="candidature" class="btns">Candidater </a>
                        <?php } else { ?>
                        <a href="detail_candidature" class="btns">Voir ma candidature </a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['userType']->value == "Administrateur" || $_smarty_tpl->tpl_vars['userType']->value == "Responsable") {?>
                        <br>
                        <a href="liste" class="btns">Liste des candidatures </a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['userType']->value == "Administrateur") {?>
                        <br>
                        <a href="userListe" class="btns">Liste des utilisateurs </a>
                        <?php }?>
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
