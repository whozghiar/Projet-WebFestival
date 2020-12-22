
{if isset ($user)}

<!doctype html>
<html>
    <head>
            <link href="css/candidature.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>{$titre}</title>
    </head>
    <body>
        <div class="fadeIn H">
            <h1> Candidature au festival : </h1>
        </div>

    <div class = "wrapper fadeInDown">
        <div id = "formContent">
            <form action="candidature" method="POST" enctype="multipart/form-data">
            
                <label class = "fadeIn second"> Nom du groupe :  * </label>
                <input class = "fadeIn second" 
                    type = "text"
                    name = "nomGrp"
                    placeholder= "Ex : !Ayya!"
                    value = "{$nomGrp|default:''}"
                    > {$messages.nomGrp|default:''}
                
                    <label class = "fadeIn second"> Département : * <label> 
                        <select class = "fadeIn second"
                                required
                                type = "text"
                                name = "dep" required> 

                            <option selected> Autre
                                {foreach $reqDep item=ligne}
                                    <option> {$ligne[0]}
                                {/foreach}
                        </select>
           
                <br>

                <label class = "fadeIn second"> Ville * </label>
                <input  class = "fadeIn second"
                        type = "text"
                        name="ville" 
                        placeholder= "Ex : Creil"
                        value="{$villeRep|default:''}"
                        required> {$messages.villeRep|default:''} 

                <br>
           
                <label class = "fadeIn second"> Code Postal * </label>
                <input class = "fadeIn second" 
                    type = "number"
                    style="-moz-appearance: textfield"
                    name = "codePostal"
                    placeholder = "Ex : 60140"
                    value = "{$cp|default:''}"
                    required> {$messages.cp|default:''} 
           
                <br>

                <label class = "fadeIn second"> Téléphone : * </label>
                <input class = "fadeIn second" 
                    type = "tel"
                    name="tel"
                    placeholder="Ex : 06 57 25 14 38"
                    pattern = "+33 [0-9]{10}"
                    value = "{$tel|default:''}"
                    required> {$messages.tel|default:''}
           
                <br>

                <label class = "fadeIn second"> Année de création du groupe : * </label>
                <input  class = "fadeIn second" 
                        type = "number"
                        name = "annee"
                        placeholder="Ex : 1998"
                        min = "1930"
                        max = "2021"
                        value = "{$anneeCrea|default:''}"
                        required> {$messages.anneeCrea|default:''}
          
                <br>

                <label class = "fadeIn second"> Scène : * </label>
                <select class = "fadeIn second"
                        required
                        type = "text"
                        name = "scene">
                    {foreach $reqScenes item = scene}
                        <option> {$scene[0]}
                    {/foreach}
                </select>
           
                <br>

                <label class = "fadeIn second"> Votre Style musical : * </label>
                <input  class = "fadeIn second"
                        type = "text"
                        name = "styleMus"
                        placeholder="Ex : Trance-rock"
                        value = "{$styleMus|default:''}"
                        required> {$messages.styleMus|default:''}
            
                <br>

                <label class = "fadeIn second"> Présentez vous : * </label>
                <input  class = "fadeIn second"
                        type = "text"
                        name = "presTexte"
                        placeholder="Ex : Notre groupe est né lors d'une rencontre entre ..."
                        value = "{$presTexte|default:''}"
                        required> {$messages.presTexte|default:''}
            
                <br>

                <label class = "fadeIn third"> Votre expérience scénique : * </label>
                <input  class = "fadeIn third"
                        type = "text"
                        name = "expScenique"
                        placeholder="Ex : Le groupe participera a son 100ème concert..."
                        value = "{$expScenique|default:''}"
                        required> {$messages.expScenique|default:''}
           
                <br>

                <label class = "fadeIn third"> Lien vers votre site ou page Facebook/Twitter. * </label>
                <input  class = "fadeIn third"
                        type = "url"
                        name ="facebook"
                        placeholder="Ex : https://www.facebook.com/!Ayya!"
                        value = "{$urlFB|default:''}"
                        required>{$messages.urlFB|default:''}
            
                <br>

                <label class = "fadeIn third"> Lien vers votre Soundcloud.</label>
                <input  class = "fadeIn third"
                        type = "url"
                        name ="soundcloud"
                        placeholder="Ex : https://soundcloud.com/ytprodmusic/!Ayya!"
                        value = "{$urlSC|default:''}">{$messages.urlSC|default:''}
            
                <br>

                <label class = "fadeIn third"> Lien vers votre chaîne YouTube. </label>
                <input  class = "fadeIn third"
                        type = "url"
                        name ="youTube"
                        placeholder="Ex : https://www.youtube.com/c/!Ayya!"
                        value = "{$urlYT|default:''}">{$messages.urlYT|default:''}
            
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
           
                <label class = "fadeIn fourth"> Dossier de presse (PDF) : </label>
                <input  class = "fadeIn fourth"
                        name = "dossierPresse"
                        type="file"> 
                {$messages.dp|default:''}

                <input  type = "hidden"
                        name ="MAX_FILE_SIZE"
                        value ="25000000">
                {$messages.dp|default:''}

                <br>
           
                <label class = "fadeIn fourth"> Fiche Technique (PDF) : * </label>
                <input  class = "fadeIn fourth"
                        name = "ficheTechnique"
                        type="file">
                {$messages.ft|default:''}

                <input  type = "hidden"
                        name ="MAX_FILE_SIZE"
                        value ="25000000">
                {$messages.ft|default:''}

                <br>    
            
                <label class = "fadeIn fourth"> Document SACEM (PDF) : * </label>
                <input  class = "fadeIn fourth"
                        name = "sacem"
                        type="file">
                {$messages.sacem|default:''}
                <input  type = "hidden"
                        name ="MAX_FILE_SIZE"
                        value ="25000000">
                        
                {$messages.sacem|default:''}

                <br>

                <label class = "fadeIn fourth"> Insérez deux Photos du groupe (Résolution > 300 DPI) * </label>
                <br>
                <input  class = "fadeIn fourth"
                        required
                        name = "photoGrp1"
                        type = "file">                {$messages.grp1|default:''}

                <br>
                <input  class = "fadeIn fourth"
                        required
                        name = "photoGrp2"
                        type = "file">                {$messages.grp2|default:''}

                <br>

                <label class = "fadeIn fourth"> Ajoutez 3 extraits de vos musiques en .MP3 * </label>
                <br>
                <input  class = "fadeIn fourth"
                        required
                        name = "mus1"
                        type = "file">                {$messages.mus1|default:''}
                <br>
                <input  class = "fadeIn fourth"
                        required
                        name = "mus2"
                        type = "file">                {$messages.mus2|default:''}
                <br>
                <input  class = "fadeIn fourth"
                        required
                        name = "mus3"
                        type = "file">
                {$messages.mus3|default:''}
           
                <input type ="submit">
            
        </div>
    </div>
        

</form>

    </body>
</html>





{else}

<!doctype html>
<html>
    <head>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>{$titre}</title>
    </head>
    <body>

        <h1> Vous devez être inscrits et connectés sur le site pour accéder à cette page. </h1>
    </body>
</html>
{/if}