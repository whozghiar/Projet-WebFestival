<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-22 00:49:47
  from 'C:\public_html\codes\templates\formulaire_candidature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe142abc40868_69166663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8460bf99625cd397da43ab7776e3ced11c47e619' => 
    array (
      0 => 'C:\\public_html\\codes\\templates\\formulaire_candidature.tpl',
      1 => 1608598180,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe142abc40868_69166663 (Smarty_Internal_Template $_smarty_tpl) {
if ((isset($_smarty_tpl->tpl_vars['user']->value))) {?>

<!doctype html>
<html>
    <head>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
    </head>
    <body>

        <h1> Candidature au festival : </h1>


<form action="candidature" method="POST" enctype="multipart/form-data">

    <div> 
        <label> Nom du groupe :  * </label>
        <input type = "text"
               name = "nomGrp"
               placeholder= "Ex : !Ayya!"
               value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nomGrp']->value)===null||$tmp==='' ? '' : $tmp);?>
"
               > <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['nomGrp'])===null||$tmp==='' ? '' : $tmp);?>

    </div>
    
    <div>       
            <label> Département : * <label> 
                <select required
                        type = "text"
                        name = "dep" required> 

                    <option selected> Autre
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reqDep']->value, 'ligne');
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

    <div>
        <label> Ville * </label>
        <input  type = "text"
                name="ville" 
                placeholder= "Ex : Creil"
                value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['villeRep']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['villeRep'])===null||$tmp==='' ? '' : $tmp);?>
 

    </div>
   
    <div>
        <label> Code Postal * </label>
        <input  type = "number"
        style="-moz-appearance: textfield"
        name = "codePostal"
        placeholder = "Ex : 60140"
        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['cp']->value)===null||$tmp==='' ? '' : $tmp);?>
"
        required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['cp'])===null||$tmp==='' ? '' : $tmp);?>
 
    </div>

    <div>
        <label> Téléphone : * </label>
        <input  type = "tel"
        name="tel"
        placeholder="Ex : 06 57 25 14 38"
        pattern = "+33 [0-9]<?php echo 10;?>
"
        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['tel']->value)===null||$tmp==='' ? '' : $tmp);?>
"
        required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['tel'])===null||$tmp==='' ? '' : $tmp);?>

    </div>

    <div>
        <label> Année de création du groupe : * </label>
        <input   type = "number"
                 name = "annee"
                 placeholder="Ex : 1998"
                 min = "1930"
                 max = "2021"
                 value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['anneeCrea']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                 required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['anneeCrea'])===null||$tmp==='' ? '' : $tmp);?>

    </div> 

    <div>
        <label> Scène : * </label>
        <select required
                type = "text"
                name = "scene">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reqScenes']->value, 'scene');
$_smarty_tpl->tpl_vars['scene']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['scene']->value) {
$_smarty_tpl->tpl_vars['scene']->do_else = false;
?>
                <option> <?php echo $_smarty_tpl->tpl_vars['scene']->value[0];?>

            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </select>
    <div>
        <label> Votre Style musical : * </label>
        <input  type = "text"
                name = "styleMus"
                placeholder="Ex : Trance-rock"
                value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['styleMus']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['styleMus'])===null||$tmp==='' ? '' : $tmp);?>

    </div>

    <div>
        <label> Présentez vous : * </label>
        <input  type = "text"
                name = "presTexte"
                placeholder="Ex : Notre groupe est né lors d'une rencontre entre ..."
                value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['presTexte']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['presTexte'])===null||$tmp==='' ? '' : $tmp);?>

    </div>  

    <div>
        <label> Votre expérience scénique : * </label>
        <input  type = "text"
                name = "expScenique"
                placeholder="Ex : Le groupe participera a son 100ème concert..."
                value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['expScenique']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                required> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['expScenique'])===null||$tmp==='' ? '' : $tmp);?>

    </div>

    <div>
        <label> Lien vers votre site ou page Facebook/Twitter. * </label>
        <input  type = "url"
                name ="facebook"
                placeholder="Ex : https://www.facebook.com/!Ayya!"
                value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['urlFB']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                required><?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['urlFB'])===null||$tmp==='' ? '' : $tmp);?>

    </div>

    <div>
        <label> Lien vers votre Soundcloud.</label>
        <input  type = "url"
                name ="soundcloud"
                placeholder="Ex : https://soundcloud.com/ytprodmusic/!Ayya!"
                value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['urlSC']->value)===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['urlSC'])===null||$tmp==='' ? '' : $tmp);?>

    </div>

    <div>
        <label> Lien vers votre chaîne YouTube. </label>
        <input  type = "url"
                name ="youTube"
                placeholder="Ex : https://www.youtube.com/c/!Ayya!"
                value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['urlYT']->value)===null||$tmp==='' ? '' : $tmp);?>
"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['urlYT'])===null||$tmp==='' ? '' : $tmp);?>

    </div>

    <div>
        <label> Avez-vous un statut associatif ? * </label>
        <input required
                type = "radio"
                name ="statut"
                value = "Oui"
                >
                Oui
        </input>
        <input  required
                type = "radio"
                name = "statut"
                value = "Non" 
                checked>
                Non
        </input>
    </div>

    <div>
        <label> Êtes-vous inscrits à la SACEM ? * </label>
        <input required
                type = "radio"
                name ="sacem"
                value = "Oui">
                Oui
        </input>
        <input  required
                type = "radio"
                name = "sacem"
                value = "Non" 
                checked>
                Non
        </input>
    </div>

    <div>
        <label> Votre groupe est-il sous contrat d'un producteur ? * </label>
        <input required
                type = "radio"
                name ="producteur"
                value = "Oui">
                Oui
        </input>
        <input  required
                type = "radio"
                name = "producteur"
                value = "Non" 
                checked>
                Non
        </input>
    </div>

    <div>
        <label> Dossier de presse (PDF) : </label>
        <input  name = "dossierPresse"
                id = "dossierPresse"
                type="file"> 
        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['dp'])===null||$tmp==='' ? '' : $tmp);?>


        <input  type = "hidden"
                name ="MAX_FILE_SIZE"
                value ="25000000">
        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['dp'])===null||$tmp==='' ? '' : $tmp);?>

    </div>

    <div>
        <label> Fiche Technique (PDF) : * </label>
        <input  name = "ficheTechnique"
                id = "ficheTechnique"
                type="file">
        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['ft'])===null||$tmp==='' ? '' : $tmp);?>


        <input  type = "hidden"
                name ="MAX_FILE_SIZE"
                value ="25000000">
        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['ft'])===null||$tmp==='' ? '' : $tmp);?>

              
    </div>

    <div>
        <label> Document SACEM (PDF) : * </label>
        <input  name = "sacem"
                id = "sacem"
                type="file">

        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['sacem'])===null||$tmp==='' ? '' : $tmp);?>

        <input  type = "hidden"
                name ="MAX_FILE_SIZE"
                value ="25000000">
                
        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['sacem'])===null||$tmp==='' ? '' : $tmp);?>


    </div>

    <div>
        <label> Insérez deux Photos du groupe (Résolution > 300 DPI) * </label>
        <br>
        <input  required
                name = "photoGrp1"
                id = "photoGrp1"
                type = "file">
        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['grp1'])===null||$tmp==='' ? '' : $tmp);?>


        <br>
        <input  required
                name = "photoGrp2"
                id = "photoGrp2"
                type = "file">
        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['grp2'])===null||$tmp==='' ? '' : $tmp);?>


    </div>


    <div>
        <label> Ajoutez 3 extraits de vos musiques en .MP3 * </label>
        <br>
        <input  required
                name = "mus1"
                id = "mus1"
                type = "file">
        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['mus1'])===null||$tmp==='' ? '' : $tmp);?>

        <br>
        <input  required
                name = "mus2"
                id = "mus2"
                type = "file">
        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['mus2'])===null||$tmp==='' ? '' : $tmp);?>

        <br>
        <input  required
                name = "mus3"
                id = "mus3"
                type = "file">
        </input>
        <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['mus3'])===null||$tmp==='' ? '' : $tmp);?>

    </div>


    <div> 
        <input type ="submit">
    </div>

</form>

    </body>
</html>





<?php } else { ?>

<!doctype html>
<html>
    <head>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
    </head>
    <body>

        <h1> Vous devez être inscrits et connectés sur le site pour accéder à cette page. </h1>
    </body>
</html>
<?php }
}
}
