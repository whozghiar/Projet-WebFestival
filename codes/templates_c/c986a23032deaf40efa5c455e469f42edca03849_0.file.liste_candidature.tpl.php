<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-05 17:47:12
  from 'C:\projetWEB\codes\templates\liste_candidature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff4a6209f5aa1_69049441',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c986a23032deaf40efa5c455e469f42edca03849' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\liste_candidature.tpl',
      1 => 1609868378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff4a6209f5aa1_69049441 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
        <link href="css/index.css" type="text/css" rel="stylesheet" >
        <link rel="icon" type="image/x-icon" href="https://www.flaticon.com/svg/static/icons/svg/3022/3022607.svg">
	    <link href="css/liste_candid.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Liste des candidatures</title>
            <!--
            Affiche un tableau contenant la liste des candidatures, chaque ligne contient un résumé rapide d'une candidature
            -->
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
?>                <!-- Pour chaque candidature -->
                    <tr>                                                                    <!-- Début de ligne -->
                    <td><?php echo $_smarty_tpl->tpl_vars['id']->value;?>
</td>                                                                          <!-- Affiche l'ID -->
                    <td> <a class="detail" href="detail_candidature/<?php echo $_smarty_tpl->tpl_vars['candidature']->value[5];?>
">Details </a> </td>   <!-- Affiche un bouton qui permet d'accéder à la candidature complète -->
                    <td><?php echo $_smarty_tpl->tpl_vars['candidature']->value[0];?>
</td>                                                              <!-- Affiche le nom du groupe -->
                    <td><?php echo $_smarty_tpl->tpl_vars['dep']->value[$_smarty_tpl->tpl_vars['id']->value];?>
</td>                                                                    <!-- Affiche le nom du département -->
                    <td><?php echo $_smarty_tpl->tpl_vars['candidature']->value[1];?>
</td>                                                              <!-- Affiche la ville -->
                    <td><?php echo $_smarty_tpl->tpl_vars['scene']->value[$_smarty_tpl->tpl_vars['id']->value];?>
</td>                                                                  <!-- Affiche la scène -->
                    <td><?php echo $_smarty_tpl->tpl_vars['candidature']->value[3];?>
</td>                                                              <!-- Affiche le style musical -->
                    <td><?php echo $_smarty_tpl->tpl_vars['candidature']->value[4];?>
</td>                                                              <!-- Affiche l'année de création -->
                    <td><?php echo $_smarty_tpl->tpl_vars['nom']->value[$_smarty_tpl->tpl_vars['id']->value];?>
</td>                                                                    <!-- Affiche le nom du résponsable -->
                    </tr>                                                                   <!-- Fin de ligne -->
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>                                                            
                </tbody>
            </table>
        </div>









        </div>
    </body><?php }
}
