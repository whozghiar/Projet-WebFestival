<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-20 15:31:30
  from 'C:\public_html\codes\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fdf6e525f99b6_48215659',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '55e905338665b244e7eb45c3ca0eadbfbbf25ad7' => 
    array (
      0 => 'C:\\public_html\\codes\\templates\\login.tpl',
      1 => 1608478289,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fdf6e525f99b6_48215659 (Smarty_Internal_Template $_smarty_tpl) {
?><html>
    <head>
        <meta name= "viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
    </head>
    <body>
        <h1> Connexion : </h1>

        <br> 

    <form action="login" method="POST">

        <label><b>Email</b></label>
        <input type="email" name="email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['email']->value)===null||$tmp==='' ? '' : $tmp);?>
"  required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['Email'])===null||$tmp==='' ? '' : $tmp);?>

        
        <br>
        
        <label><b>Mot de passe</b></label>
        <input type="password"  name="passe" required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['passe'])===null||$tmp==='' ? '' : $tmp);?>


        <p> <input type ="submit"> </p>


    </body>
</html><?php }
}
