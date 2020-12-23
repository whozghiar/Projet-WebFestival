<?php
/* Smarty version 3.1.34-dev-7, created on 2020-12-23 20:47:47
  from 'C:\public_html\codes\templates\formulaire_candidature.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5fe3acf3c2da93_79417930',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8460bf99625cd397da43ab7776e3ced11c47e619' => 
    array (
      0 => 'C:\\public_html\\codes\\templates\\formulaire_candidature.tpl',
      1 => 1608747670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fe3acf3c2da93_79417930 (Smarty_Internal_Template $_smarty_tpl) {
?>


<!doctype html>
<html>
    <head>
            <link href="css/candidature.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Candidature</title>
        
            <?php echo '<script'; ?>
 type="text/JavaScript">
                <!--
                function ajouter() // Ajoute une ligne de champs
                {
		if ( typeof this.i == 'undefined' ) this.i = 2;
      
 
                var doc = document.getElementById('membres'); //élément parent
     
     
                const   label1 = document.createElement('label');
                        label1.innerText = "Membre n°"+i.toString()+" *";


                const   input1 = document.createElement('input');
                        input1.type = "text";
                        input1.name = "nomMembre[" + i.toString()+"]";
                        input1.placeholder = "Nom";
                        input1.required=true;

                const   input2 = document.createElement('input');
                        input2.type = "text";
                        input2.name = "prenomMembre[" + i.toString()+"]";
                        input2.placeholder = "Prenom";
                        input2.required=true;

                const   input3 = document.createElement('input');
                        input3.type = "text";
                        input3.name = "instrumentMembre[" + i.toString()+"]";
                        input3.placeholder = "Instrument";
                        input3.required=true;
           
                const   surplus = document.createElement('P');
                        surplus.innerText = "Nombre max de membre atteint";   
             
           
                //Ajouter les éléments
                i += 1;
     
                if(i==10){
                        doc.appendChild(surplus);
                } else if (i<10){
                        doc.appendChild(label1);
                        doc.appendChild(input1);
                        doc.appendChild(input2);
                        doc.appendChild(input3);
                }                
                }

                
                function supprimer(){
                        var doc = document.getElementById('membres');
                        if(doc.childElementCount!=4){
                                if(doc.childElementCount==33){
                                        for(var j=0;j<5;j++){
                                                doc.removeChild(doc.lastChild);
                                        }
                                        i=8;
                                }else{
                                        for(var j=0;j<4;j++){
                                                doc.removeChild(doc.lastChild);
                                        }
                                        i--;
                                }
                        } 
                }

                <?php echo '</script'; ?>
>

        
    </head>
    <body>
    <?php if ((isset($_smarty_tpl->tpl_vars['user']->value))) {?>
        <?php if (($_smarty_tpl->tpl_vars['candidat']->value == 1)) {?>
        <div class="fadeIn H">
            <h1> Candidature au festival : </h1>
        </div>

    <div class = "wrapper fadeInDown">
        <div id = "formContent">
            <form action="candidature" method="POST" enctype="multipart/form-data" novalidate>
            
                <label class = "fadeIn second"> Nom du groupe :  * </label>
                <input class = "fadeIn second" 
                    type = "text"
                    name = "nomGrp"
                    placeholder= "Ex : !Ayya!"
                    value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nomGrp']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                    > <br> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['nomGrp'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br> <br>
                
                    <label class = "fadeIn second"> Département : * <label> 
                        <select class = "fadeIn second"
                                required
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
           
                <br>

                <label class = "fadeIn second"> Ville * </label>
                <input  class = "fadeIn second"
                        type = "text"
                        name="ville" 
                        placeholder= "Ex : Creil"
                        value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['ville']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                        required> <br> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['villeRep'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>

                <br>
           
                <label class = "fadeIn second"> Code Postal * </label>
                <input class = "fadeIn second" 
                    type = "number"
                    style="-moz-appearance: textfield"
                    name = "codePostal"
                    placeholder = "Ex : 60140"
                    value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['codePostal']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                    required> <br> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['cp'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>
           
                <br>

                <label class = "fadeIn second"> Téléphone : * </label>
                <input class = "fadeIn second" 
                    type = "tel"
                    name="tel"
                    placeholder="Ex : 06 57 25 14 38"
                    pattern = "+33 [0-9]<?php echo 10;?>
"
                    value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['tel']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                    required> <br> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['tel'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>
           
                <br>

                <label class = "fadeIn second"> Année de création du groupe : * </label>
                <input  class = "fadeIn second" 
                        type = "number"
                        name = "annee"
                        placeholder="Ex : 1998"
                        min = "1930"
                        max = "2021"
                        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['annee']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                        required> <br> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['anneeCrea'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>
          
                <br>

                <label class = "fadeIn second"> Scène : * </label>
                <select class = "fadeIn second"
                        required
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
           
                <br>

                <label class = "fadeIn second"> Votre Style musical : * </label>
                <input  class = "fadeIn second"
                        type = "text"
                        name = "styleMus"
                        placeholder="Ex : Trance-rock"
                        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['styleMus']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                        required> <br> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['styleMus'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>
            
                <br>

                <label class = "fadeIn second"> Présentez vous (<500 caractères) : * </label>
                <textarea  class = "fadeIn second"
                        type="text"
                        maxlength = 500
                        name = "presTexte"
                        placeholder="Ex : Notre groupe est né lors d'une rencontre entre ..."
                        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['presTexte']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                        required></textarea> <br> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['presTexte'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>

                <br>

                <label class = "fadeIn third"> Votre expérience scénique (<500 caractères) : * </label>
                <textarea  class = "fadeIn third"
                        type = "text"
                        maxlength = 500
                        name = "expScenique"
                        placeholder="Ex : Le groupe participera a son 100ème concert..."
                        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['expScenique']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                        required></textarea> <br> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['expScenique'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>
           
                <br>

                <label class = "fadeIn third"> Lien vers votre site ou page Facebook|Twitter. * </label>
                <input  class = "fadeIn third"
                        type = "url"
                        name ="facebook"
                        placeholder="Ex : https://www.facebook.com/!Ayya!"
                        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['facebook']->value)===null||$tmp==='' ? '' : $tmp);?>
"
                        required> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['urlFB'])===null||$tmp==='' ? '' : $tmp);?>
 </span>
                <br>
                <br>

                <label class = "fadeIn third"> Lien vers votre Soundcloud.</label>
                <input  class = "fadeIn third"
                        type = "url"
                        name ="soundcloud"
                        placeholder="Ex : https://soundcloud.com/ytprodmusic/!Ayya!"
                        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['soundcloud']->value)===null||$tmp==='' ? '' : $tmp);?>
"> <span class="erreur"> <br> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['urlSC'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>
            
                <br>
                

                <label class = "fadeIn third"> Lien vers votre chaîne YouTube. </label>
                <input  class = "fadeIn third"
                        type = "url"
                        name ="youTube"
                        placeholder="Ex : https://www.youtube.com/c/!Ayya!"
                        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['youTube']->value)===null||$tmp==='' ? '' : $tmp);?>
"> <br> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['urlYT'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>
            
                <br>
                
                <label class = "fadeIn third"> Membres </label>
                <div id="membres">
                        <label> Membre n°1 * </label>
                        <input
                        type = "text"
                        name ="nomMembre[1]"
                        placeholder="Nom"
                        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['nomMembre']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"
                        required>
                        <input
                        type = "text"
                        name ="prenomMembre[1]"
                        placeholder="Prenom"
                        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['prenomMembre']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"
                        required>
                        <input
                        type = "text"
                        name ="instrumentMembre[1]"
                        placeholder="Instrument"
                        value = "<?php echo (($tmp = @$_smarty_tpl->tpl_vars['instrumentMembre']->value[1])===null||$tmp==='' ? '' : $tmp);?>
"
                        required>
		</div>
                <input type="button" value="Ajouter un membre" onClick="javascript:ajouter()">
                <input type="button" value="Supprimer un membre" onClick="javascript:supprimer()">
                <br>
                <br>
                
                <label class = "fadeIn third"> Avez-vous un statut associatif ? * </label>
                <input  class = "fadeIn third"
                        required
                        type = "radio"
                        name ="statut"
                        value = "Oui"
                        >
                        Oui
                <input  class = "fadeIn third"
                        required
                        type = "radio"
                        name = "statut"
                        value = "Non" 
                        checked>
                        Non
            
                <br>
                <br>
                <br>

                <label class = "fadeIn third"> Êtes-vous inscrits à la SACEM ? * </label>
                <input  class = "fadeIn third"
                        required
                        type = "radio"
                        name ="sacem"
                        value = "Oui">
                        Oui
                <input  class = "fadeIn third"
                        required
                        type = "radio"
                        name = "sacem"
                        value = "Non" 
                        checked>
                        Non

                <br>
                <br>
                <br>
           
                <label class = "fadeIn third"> Votre groupe est-il sous contrat d'un producteur ? * </label>
                <input  class = "fadeIn third"
                        required
                        type = "radio"
                        name ="producteur"
                        value = "Oui">
                        Oui
                <input  class = "fadeIn third"
                        required
                        type = "radio"
                        name = "producteur"
                        value = "Non" 
                        checked>
                        Non

                <br>
                <br>
           
                <label class = "fadeIn fourth"> Dossier de presse (PDF) : </label>
                <input  class = "fadeIn fourth"
                        name = "dossierPresse"
                        type="file"> 
                <br>
                <span class="erreur">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['dp'])===null||$tmp==='' ? '' : $tmp);?>
 </span>

                <input  type = "hidden"
                        name ="MAX_FILE_SIZE"
                        value ="25000000">
                

                <br>
                <br>
           
                <label class = "fadeIn fourth"> Fiche Technique (PDF) : * </label>
                <input  class = "fadeIn fourth"
                        required
                        name = "ficheTechnique"
                        type="file">
                <br>
                <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['ft'])===null||$tmp==='' ? '' : $tmp);?>
 </span>

                <input  type = "hidden"
                        name ="MAX_FILE_SIZE"
                        value ="25000000">
                

                <br>    
                <br>
            
                <label class = "fadeIn fourth"> Document SACEM (PDF) : * </label>
                <input  class = "fadeIn fourth"
                        required
                        name = "sacem"
                        type="file">
                <br>
                <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['sacem'])===null||$tmp==='' ? '' : $tmp);?>
 </span>
                <input  type = "hidden"
                        name ="MAX_FILE_SIZE"
                        value ="25000000">
                        
               

                <br>
                <br>

                <label class = "fadeIn fourth"> Insérez deux Photos du groupe (Résolution > 300 DPI) * </label>
                <br>
                <input  class = "fadeIn fourth"
                        required
                        name = "photoGrp1"
                        type = "file">   
                <br>  <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['photoGrp1'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>

                <br>
                <input  class = "fadeIn fourth"
                        required
                        name = "photoGrp2"
                        type = "file"> <br>  <span class="erreur">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['photoGrp2'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>

                <br>

                <label class = "fadeIn fourth"> Ajoutez 3 extraits de vos musiques en .MP3 * </label>
                <br>
                <input  class = "fadeIn fourth"
                        required
                        name = "mus1"
                        type = "file"> <br>  <span class="erreur">  <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['mus1'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>
                <br>
                <input  class = "fadeIn fourth"
                        required
                        name = "mus2"
                        type = "file"> <br>  <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['mus2'])===null||$tmp==='' ? '' : $tmp);?>
 </span> <br>
                <br>
                <input  class = "fadeIn fourth"
                        required
                        name = "mus3"
                        type = "file">
                <br> <span class="erreur"> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['messages']->value['mus3'])===null||$tmp==='' ? '' : $tmp);?>
 </span>
           
                <input type ="submit">
            
        </div>
    </div>
        

</form>


        <?php } else { ?> 
        <div class="fadeIn H">
                <h1> Vous avez déjà fait une candidature.</h1>
        
       
        <br>
        
                 <a href = "profil">Voir ma candidature</a>
        </div>
         <?php }?>


<?php } else { ?>


        
        <div class="fadeIn H">
                <h1> Vous devez être connecté pour pouvoir candidater.</h1>
        
       
        <br>
        
                 <a href = "login"> Se connecter</a>
        </div>
         <br>
        <div class="img">
                <img src="../images/neo_et_sa_mere.gif">
        </div>
            
        

        
<?php }?>
    </body>
</html>

        
<?php }
}
