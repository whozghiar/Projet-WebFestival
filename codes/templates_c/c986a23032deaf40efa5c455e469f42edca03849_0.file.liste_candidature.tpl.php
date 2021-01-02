<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-02 17:14:41
  from 'C:\projetWEB\codes\templates\liste_candidature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff0aa0117fe20_30230926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c986a23032deaf40efa5c455e469f42edca03849' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\liste_candidature.tpl',
      1 => 1609607679,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff0aa0117fe20_30230926 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
        <link href="css/index.css" type="text/css" rel="stylesheet" >
	    <link href="css/liste_candid.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Liste des candidatures</title>
    </head>
    <header>
        <a class="header" href="/codes">
        <img class="header" src="/images/home.png">
        </a>
    </header>
    <body>
        <div class="fadeIn H">
            <div class="page-title-holder">
                <h1> Liste des candidatures </h1>
            </div>
            <table class="Table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Detail</th>
                        <th>Nom</th>
                        <th>Département</th>
                        <th>Ville</th>
                        <th>Scène</th>
                        <th>Style</th>
                        <th>Date</th>
                        <th>Représentant</th>
                    </tr>
                <thead>

                
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['candidatures']->value, 'candidature', false, 'id');
$_smarty_tpl->tpl_vars['candidature']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['candidature']->value) {
$_smarty_tpl->tpl_vars['candidature']->do_else = false;
?>
                    <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</td>
                    <td> <a class="detail" href="detail_candidature/<?php echo $_smarty_tpl->tpl_vars['candidature']->value[5];?>
">Details </a> </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['candidature']->value[0];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['dep']->value[$_smarty_tpl->tpl_vars['id']->value];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['candidature']->value[1];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['scene']->value[$_smarty_tpl->tpl_vars['id']->value];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['candidature']->value[3];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['candidature']->value[4];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['nom']->value[$_smarty_tpl->tpl_vars['id']->value];?>
</td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>









        </div>
    </body><?php }
}
