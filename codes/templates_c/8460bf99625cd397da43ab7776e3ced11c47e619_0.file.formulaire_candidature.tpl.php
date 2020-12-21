<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-21 15:55:31
  from 'C:\public_html\codes\templates\formulaire_candidature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe0c5735cd465_34553603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8460bf99625cd397da43ab7776e3ced11c47e619' => 
    array (
      0 => 'C:\\public_html\\codes\\templates\\formulaire_candidature.tpl',
      1 => 1608566123,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe0c5735cd465_34553603 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!doctype html>
<html>
    <head>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
    </head>
    <body>

        <h1> Candidature au festival : </h1>


<form action="candidature" method="POST">

    <div> <label> Nom du groupe : </label> <input type = "text" name = "Nom du groupe" value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nomGrp']->value)===null||$tmp==='' ? '' : $tmp);?>
" required><?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['nomGrp'])===null||$tmp==='' ? '' : $tmp);?>
 </div>
    
    <div> <label> Département : </label>
              <select type = "text"  name = "Departement" required> 
                <option selected> Autre
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reqAlb']->value, 'ligne');
$_smarty_tpl->tpl_vars['ligne']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['ligne']->value) {
$_smarty_tpl->tpl_vars['ligne']->do_else = false;
?>
                <option> <?php echo $_smarty_tpl->tpl_vars['ligne']->value[0];?>

                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
    </div>

    <div>  <label> Ville représentant : </label> <input type = "text" name="Ville représentant" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['villeRep']->value)===null||$tmp==='' ? '' : $tmp);?>
"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['villeRep'])===null||$tmp==='' ? '' : $tmp);?>
  </div>
   
    <div> <label> Code Postal Représentant : </label> <input type = "number" min =  name = "Code Postal" value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['cp']->value)===null||$tmp==='' ? '' : $tmp);?>
"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['cp'])===null||$tmp==='' ? '' : $tmp);?>
 </div>

    <div> <label>  Téléphone : </label>
        <input type = "tel" name="tel" pattern = "[0-9]<?php echo 2;?>
 [0-9]<?php echo 2;?>
 [0-9]<?php echo 2;?>
 [0-9]<?php echo 2;?>
 [0-9]<?php echo 2;?>
" value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['tel']->value)===null||$tmp==='' ? '' : $tmp);?>
" required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['tel'])===null||$tmp==='' ? '' : $tmp);?>

        
    
    </div>



    <div> <input type ="submit"> </div>
</form>

    </body>
</html><?php }
}
