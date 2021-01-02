<?php
/* Smarty version 3.1.34-dev-7, created on 2021-01-02 19:00:50
  from 'C:\projetWEB\codes\templates\detail_candidature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ff0c2e210abd2_11905605',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '835113d685f2849eb6dbfe5a2a9e6d6422c359e4' => 
    array (
      0 => 'C:\\projetWEB\\codes\\templates\\detail_candidature.tpl',
      1 => 1609614014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ff0c2e210abd2_11905605 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
    <head>
    <?php if ($_smarty_tpl->tpl_vars['lien']->value == 1) {?>
	    
	    <link href="css/detail_candidature.css" type="text/css" rel="stylesheet" >
    <?php } else { ?>
	    
        <link href="../css/detail_candidature.css" type="text/css" rel="stylesheet" >
    <?php }?>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Candidature <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
</title>
    </head>
    <header>
        <a class="header" href="/codes">
        <img class="header" src="/images/home.png">
        </a>
    </header>
    <body>
        <div class="fadeIn H">
            <div class="page-title-holder">
                <h1> Candidature de : <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
</h1>
            </div>
            <div class = "wrapper fadeInDown">
                <div id = "formContent">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reqPhotos']->value, 'photo');
$_smarty_tpl->tpl_vars['photo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['photo']->value) {
$_smarty_tpl->tpl_vars['photo']->do_else = false;
?>
                            
                        <?php if ($_smarty_tpl->tpl_vars['lien']->value == 1) {?>
                            <img class="photo"
                                src = "../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['photo']->value[0];?>
">
                        <?php } else { ?>
                            <img class="photo"
                                src = "../../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['photo']->value[0];?>
">
                        <?php }?>

                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <br>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reqMus']->value, 'Mus');
$_smarty_tpl->tpl_vars['Mus']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['Mus']->value) {
$_smarty_tpl->tpl_vars['Mus']->do_else = false;
?>
                        <audio
                        controls
                        <?php if ($_smarty_tpl->tpl_vars['lien']->value == 1) {?>
                                src = "../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['Mus']->value[0];?>
">
                        <?php } else { ?>
                                src = "../../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['Mus']->value[0];?>
">
                        <?php }?>
                        </audio>
                        <?php if ($_smarty_tpl->tpl_vars['lien']->value == 1) {?>
                            <a class = "musique" href = "../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['Mus']->value[0];?>
 " download = "Extrait <?php echo $_smarty_tpl->tpl_vars['Mus']->value[0];?>
 par <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
.mp3">
                            <?php echo $_smarty_tpl->tpl_vars['Mus']->value[0];?>

                            </a>
                        <?php } else { ?>
                            <a class = "musique" href = "../../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['Mus']->value[0];?>
 " download = "Extrait <?php echo $_smarty_tpl->tpl_vars['Mus']->value[0];?>
 par <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
.mp3">
                            <?php echo $_smarty_tpl->tpl_vars['Mus']->value[0];?>

                            </a>
                        <?php }?>
                        <br>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                    <h3> Membres : </h3>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Membres']->value, 'membre');
$_smarty_tpl->tpl_vars['membre']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['membre']->value) {
$_smarty_tpl->tpl_vars['membre']->do_else = false;
?>
                        <?php echo $_smarty_tpl->tpl_vars['membre']->value[0];?>

                        <br>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    
                    <h3>Dept : </h3> <?php echo $_smarty_tpl->tpl_vars['nomDep']->value;?>

                    <br>
                    <h3> Ville : </h3> <?php echo $_smarty_tpl->tpl_vars['villeRepresentant']->value;?>

                    <br>
                    <h3> Code Postal : </h3> <?php echo $_smarty_tpl->tpl_vars['codePostalRepresentant']->value;?>

                    <br>
                    <h3> Style : </h3> <?php echo $_smarty_tpl->tpl_vars['styleMusique']->value;?>

                    <br>
                    <h3> Web :</h3> <a class = "lien" href =<?php echo $_smarty_tpl->tpl_vars['webFacebook']->value;?>
> <?php echo $_smarty_tpl->tpl_vars['webFacebook']->value;?>
 </a>
                    <br>
                    <h3> SoundCloud :</h3> 
                    <?php if ($_smarty_tpl->tpl_vars['soundcloud']->value == 1) {?>
                        <h3> SoundCloud :</h3> <a class = "lien" href =<?php echo $_smarty_tpl->tpl_vars['soundcloud']->value;?>
> <?php echo $_smarty_tpl->tpl_vars['soundcloud']->value;?>
 </a>
                        <br>
                    <?php } else { ?>
                        Le groupe ne possède pas de SoundCloud.
                        <br>
                    <?php }?> 
                    <h3> YouTube :</h3> 
                    <?php if ($_smarty_tpl->tpl_vars['youtube']->value == 1) {?>
                        <h3> Youtube : </h3> <a class = "lien" href = <?php echo $_smarty_tpl->tpl_vars['youtube']->value;?>
> <?php echo $_smarty_tpl->tpl_vars['youtube']->value;?>
 </a>
                        <br>
                    <?php } else { ?>
                        Le groupe ne possède pas de chaîne YouTube.
                        <br>
                    <?php }?>

                    <h3> Expérience(s) Scénique(s) : </h3> <?php echo $_smarty_tpl->tpl_vars['expScenique']->value;?>

                    <br>
                    <h3> Présentation : </h3> <?php echo $_smarty_tpl->tpl_vars['presentationTexte']->value;?>

                    <br>
                    <h3> Producteur : </h3>
                    <?php if ($_smarty_tpl->tpl_vars['producteur']->value == 1) {?>
                        <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
 ne possède pas de producteur.
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
 possède un producteur.
                    <?php }?>
                    <h3> Associatif : </h3>
                    <?php if ($_smarty_tpl->tpl_vars['associatif']->value == 1) {?>
                        <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
 ne possède pas un statut associatif.
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
 possède un statut associatif.
                    <?php }?>
                    <h3> SACEM : </h3>
                    <?php if ($_smarty_tpl->tpl_vars['sacem']->value == 1) {?>
                        <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
 est inscrit à la SACEM.
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
 n'est pas inscrit à la SACEM.
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['lien']->value == 1) {?>
                    <h3> Dossier : </h3> <a class = file href = "../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['dossierPresse']->value;?>
 " download = "Dossier de Presse <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
.pdf"> <?php echo $_smarty_tpl->tpl_vars['dossierPresse']->value;?>
 </a>
                    <br>
                    <h3> Setlist / SACEM : </h3> <a class = "file" href = "../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['docSacem']->value;?>
 " download = "Sacem <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
.pdf"> <?php echo $_smarty_tpl->tpl_vars['docSacem']->value;?>
 </a>
                    <br>
                    <h3> Fiche Technique : </h3> <a class = "file" href = "../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['ficheTechnique']->value;?>
 " download = "Fiche Technique <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
.pdf"> <?php echo $_smarty_tpl->tpl_vars['ficheTechnique']->value;?>
 </a>
                    <?php } else { ?>
                    <h3> Dossier : </h3> <a href = "../../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['dossierPresse']->value;?>
 " download = "Dossier de Presse <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
.pdf"> <?php echo $_smarty_tpl->tpl_vars['dossierPresse']->value;?>
 </a>
                    <br>
                    <h3> Setlist / SACEM : </h3> <a class = "file" href = "../../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['docSacem']->value;?>
 " download = "Sacem <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
.pdf"> <?php echo $_smarty_tpl->tpl_vars['docSacem']->value;?>
 </a>
                    <br>
                    <h3> Fiche Technique : </h3> <a class = "file" href = "../../data/upload/upload <?php echo $_smarty_tpl->tpl_vars['ficheTechnique']->value;?>
 " download = "Fiche Technique <?php echo $_smarty_tpl->tpl_vars['nomGrp']->value;?>
.pdf"> <?php echo $_smarty_tpl->tpl_vars['ficheTechnique']->value;?>
 </a>
                    <?php }?>
                </div>
            </div>

            <br>
            <a class="supprimer" href="delete/<?php echo $_smarty_tpl->tpl_vars['iduser']->value;?>
">Supprimer la candidature </a>
            
        </div>


    </body><?php }
}
