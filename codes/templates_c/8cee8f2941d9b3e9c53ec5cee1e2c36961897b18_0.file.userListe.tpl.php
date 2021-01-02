<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-02 18:11:40
  from 'C:\projetWEB\codes\templates\userListe.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff0b75cd165a7_62396307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8cee8f2941d9b3e9c53ec5cee1e2c36961897b18' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\userListe.tpl',
      1 => 1609610893,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff0b75cd165a7_62396307 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
        <link href="css/index.css" type="text/css" rel="stylesheet" >
	    <link href="css/liste_candid.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Liste des utilisateurs</title>
    </head>
    <header>
        <a class="header" href="/codes">
        <img class="header" src="/images/home.png">
        </a>
    </header>
    <body>
        <div class="fadeIn H">
            <div class="page-title-holder">
                <h1> Liste des utilisateurs </h1>
            </div>
            <form action="userListe" method="POST" enctype="multipart/form-data" >
            <table class="Table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Mail</th>
                        <th>Candidature</th>
                        <th>Type</th>
                    </tr>
                <thead>

                
                <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'infoUser');
$_smarty_tpl->tpl_vars['infoUser']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['infoUser']->value) {
$_smarty_tpl->tpl_vars['infoUser']->do_else = false;
?>
                    <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['infoUser']->value[5];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['infoUser']->value[0];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['infoUser']->value[1];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['infoUser']->value[2];?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['infoUser']->value[4] == 0) {?> <a class="userButton" href="detail_candidature/<?php echo $_smarty_tpl->tpl_vars['infoUser']->value[5];?>
">Voir</a><?php } else { ?> Non <?php }?> </td>
                    <td><?php if ($_smarty_tpl->tpl_vars['infoUser']->value[3] == "Administrateur") {?>
                        <?php echo $_smarty_tpl->tpl_vars['infoUser']->value[3];?>

                        <?php } else { ?>
                        <select
                                    required
                                    type = "text"
                                    name = "type[<?php echo $_smarty_tpl->tpl_vars['infoUser']->value[5];?>
]" required> 
                                    <?php if ($_smarty_tpl->tpl_vars['infoUser']->value[3] == "Responsable") {?>
                                    <option> Administrateur
                                    <option selected> Responsable
                                    <option> Candidat
                                    <?php } else { ?>
                                    <option> Administrateur
                                    <option> Responsable
                                    <option selected> Candidat
                                    <?php }?>
                                    
                        </select>
                        <?php }?>
                    </td>
                    </tr>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
            <br>
            <input type ="submit">
            </form>
        </div>

<?php }
}
