<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-05 15:16:12
  from 'C:\public_html\codes\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fcba43c107975_07601569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '233e6a21c6290170d11c85e0db4d848eabb2e636' => 
    array (
      0 => 'C:\\public_html\\codes\\templates\\register.tpl',
      1 => 1607181356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcba43c107975_07601569 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!doctype html>
<html>
    <head>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Register</title>
    </head>

<form action="register" method="POST">
    <p>  <label> Nom : </label> <input type = "text" name="nom" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nom']->value)===null||$tmp==='' ? '' : $tmp);?>
"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['nom'])===null||$tmp==='' ? '' : $tmp);?>
 </p>
    <p> <label> Email : </label> <input type = "email" name="email" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['email']->value)===null||$tmp==='' ? '' : $tmp);?>
"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['email'])===null||$tmp==='' ? '' : $tmp);?>
</p>
    <p> <label>  Mot De Passe : </label> <input type = "password" name="passe"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['passe'])===null||$tmp==='' ? '' : $tmp);?>
</p>
    <p> <input type ="submit"> </p>
</form>
<?php }
}
