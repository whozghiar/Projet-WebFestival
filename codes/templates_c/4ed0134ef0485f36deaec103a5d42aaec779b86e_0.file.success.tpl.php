<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-02 16:45:34
  from 'C:\projetWEB\codes\templates\success.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff0a32ed44ef7_15315923',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ed0134ef0485f36deaec103a5d42aaec779b86e' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\success.tpl',
      1 => 1608653166,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff0a32ed44ef7_15315923 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <link href="css/success.css" type="text/css" rel="stylesheet" >
        <meta name= "viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
    </head>

    <body>
        <div class="fadeIn H">
            <h1> Bravo ! Vous voilà maintenant enregistré. </h1>
        </div>
         <div class = "wrapper fadeInDown">
            <div id = "formContent">
                <a href="/codes"><input class = "fadeIn fourth" type="submit" value="Retour à l'acceuil"> </a>
            </div>
        </div>

    </body>
</html>
<?php }
}
