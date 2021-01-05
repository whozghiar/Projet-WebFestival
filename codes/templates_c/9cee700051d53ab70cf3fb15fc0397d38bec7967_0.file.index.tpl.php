<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 17:39:43
  from 'C:\projetWEB\codes\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff4a45fb12de6_39029581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9cee700051d53ab70cf3fb15fc0397d38bec7967' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\index.tpl',
      1 => 1609868372,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff4a45fb12de6_39029581 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
        <link href="css/index.css" type="text/css" rel="stylesheet" >
        <link rel="icon" type="image/x-icon" href="https://www.flaticon.com/svg/static/icons/svg/3022/3022607.svg">
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Accueil Festival</title>
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
        
                <?php if ((isset($_smarty_tpl->tpl_vars['user']->value))) {?> <!-- On regarde si la personne est déjà connectée, si c'est le cas, il y a trois cas : -->
                    <p> <h2> Bonjour <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
 ! </h2> </p>
                    <br>
                    <p> <h3> Vous pouvez désormais naviguer sur le site. </h3> </p>

                    <div class = "wrapper fadeInDown">
                    <div id = "formContent">
                        <?php if (($_smarty_tpl->tpl_vars['candidat']->value == 1)) {?> <!-- Dans le premier cas, la personne n'a pas fait de cancidature, il y a alors deux boutons : candidater et se déconnecter  -->
                        <a href="candidature" class="btns">Candidater </a>
                        <?php } else { ?> <!-- Dans le deuxième cas, la personne a fait une cancidature, il y a alors deux boutons : voir ma candidature et se déconnecter  -->
                        <a href="detail_candidature" class="btns">Voir ma candidature </a>
                        <?php }?>
                        <!-- Dans le dernier cas, la personne est un administrateur, il y a alors 4 boutons : voir ma candidature, liste des candidatures, liste des utilisateurs et se déconnecter  -->
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
                    
                <?php } else { ?> <!-- Sinon si la personne n'est pas connectée il y a deux boutons : connectez-vous et inscrivez-vous -->
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
