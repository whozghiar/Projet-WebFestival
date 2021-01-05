<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 17:57:56
  from 'C:\projetWEB\codes\templates\success.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff4a8a4102576_61650009',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ed0134ef0485f36deaec103a5d42aaec779b86e' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\success.tpl',
      1 => 1609869474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff4a8a4102576_61650009 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <link href="css/index.css" type="text/css" rel="stylesheet" >
        <link href="css/success.css" type="text/css" rel="stylesheet" >
        <link rel="icon" type="image/x-icon" href="https://www.flaticon.com/svg/static/icons/svg/3022/3022607.svg">
        <meta name= "viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
    </head>
    <header>
        <a class="header" href="/codes">
        <img class="header" src="/images/home.png">
        </a>
    </header>
    <body>
    <!-- Cette page s'affiche après l'inscription, elle contient un message de succès et un bouton pour retourner à l'accueil -->
        <div class="fadeIn H">
            <div class="page-title-holder">
            <h1> Bravo ! Vous voilà maintenant enregistrés. </h1>
            </div>
        </div>
         <div class = "wrapper fadeInDown">
            <div id = "formContent">
                <a class="btns" href="/codes"> Retour à l'accueil </a>
            </div>
        </div>

    </body>
</html>
<?php }
}
