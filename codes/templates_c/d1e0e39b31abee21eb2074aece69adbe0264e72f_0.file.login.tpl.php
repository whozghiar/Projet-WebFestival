<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-22 17:17:30
  from 'C:\projetWEB\codes\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe22a2a920015_59213456',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1e0e39b31abee21eb2074aece69adbe0264e72f' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\login.tpl',
      1 => 1608567330,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe22a2a920015_59213456 (Smarty_Internal_Template $_smarty_tpl) {
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
