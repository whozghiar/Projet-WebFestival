<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-21 15:39:11
  from 'C:\public_html\codes\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe0c19fa194c9_64315217',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55e905338665b244e7eb45c3ca0eadbfbbf25ad7' => 
    array (
      0 => 'C:\\public_html\\codes\\templates\\login.tpl',
      1 => 1608565012,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe0c19fa194c9_64315217 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        
        <link href="css/login.css" type="text/css" rel="stylesheet" >
        <meta name= "viewport" content="width=device-width, initial-scale=1">
        
        <title>Login</title>
    </head>
    <body>
        <div class="fadeIn H1">
            <h1> Connexion : </h1>
        </div>

        <br> 
    <div class = "wrapper fadeInDown">
        <div id = "formContent">
            <form action="login" method="POST">

                <input class = "fadeIn second" type="email" name="email" placeholder="Email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['email']->value)===null||$tmp==='' ? '' : $tmp);?>
"  required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['Email'])===null||$tmp==='' ? '' : $tmp);?>

                
                <br>
                
                <input class ="fadeIn third" type="password"  name="passe" placeholder="Mot de passe" required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['passe'])===null||$tmp==='' ? '' : $tmp);?>


                <p> <input class = "fadeIn fourth" type ="submit" value = "Se connecter"> </p>
        </div>
    </div>

    </body>
</html><?php }
}
