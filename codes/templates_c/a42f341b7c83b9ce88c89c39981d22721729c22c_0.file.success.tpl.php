<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-22 15:59:43
  from 'C:\public_html\codes\templates\success.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe217ef3f9e02_94307534',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a42f341b7c83b9ce88c89c39981d22721729c22c' => 
    array (
      0 => 'C:\\public_html\\codes\\templates\\success.tpl',
      1 => 1608652766,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe217ef3f9e02_94307534 (Smarty_Internal_Template $_smarty_tpl) {
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
