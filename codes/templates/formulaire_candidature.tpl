
{if isset ($user)}

<!doctype html>
<html>
    <head>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>{$titre}</title>
    </head>
    <body>

        <h1> Candidature au festival : </h1>


<form action="candidature" method="POST" enctype="multipart/form-data">

    <div> 
        <label> Nom du groupe :  * </label>
        <input type = "text"
               name = "Nom du groupe"
               placeholder= "Ex : !Ayya!"
               value = "{$nomGrp|default:''}"
               required> {$messages.nomGrp|default:''}
    </div>
    
    <div>       
            <label> Département : * <label> 
                <select required
                        type = "text"
                        name = "Departement" required> 

                    <option selected> Autre
                        {foreach $reqDep item=ligne}
                            <option> {$ligne[0]}
                        {/foreach}
                </select>
    </div>

    <div>
        <label> Ville * </label>
        <input  type = "text"
                name="Ville représentant" 
                placeholder= "Ex : Creil"
                value="{$villeRep|default:''}"
                required> {$messages.villeRep|default:''} 

    </div>
   
    <div>
        <label> Code Postal * </label>
        <input  type = "number"
        style="-moz-appearance: textfield"
        name = "Code Postal"
        placeholder = "Ex : 60140"
        value = "{$cp|default:''}"
        required> {$messages.cp|default:''} 
    </div>

    <div>
        <label> Téléphone : * </label>
        <input  type = "tel"
        name="tel"
        placeholder="Ex : 06 57 25 14 38"
        pattern = "[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}"
        value = "{$tel|default:''}"
        required> {$messages.tel|default:''}
    </div>

    <div>
        <label> Année de création du groupe : * </label>
        <input   type = "number"
                 name = "annee"
                 placeholder="Ex : 1998"
                 min = "1930"
                 max = "2021"
                 value = "{$anneeCrea|default:''}"
                 required> {$messages.anneeCrea|default:''}
    </div> 

    <div>
        <label> Votre Style musical : * </label>
        <input  type = "text"
                name = "styleMus"
                placeholder="Ex : Trance-rock"
                value = "{$styleMus|default:''}"
                required> {$messages.styleMus|default:''}
    </div>

    <div>
        <label> Présentez vous : * </label>
        <input  type = "text"
                name = "presTexte"
                placeholder="Ex : Notre groupe est né lors d'une rencontre entre ..."
                value = "{$presTexte|default:''}"
                required> {$messages.presTexte|default:''}
    </div>  

    <div>
        <label> Votre expérience scénique : * </label>
        <input  type = "text"
                name = "expScenique"
                placeholder="Ex : Le groupe participera a son 100ème concert..."
                value = "{$expScenique|default:''}"
                required> {$messages.expScenique|default:''}
    </div>

    <div>
        <label> Lien vers votre site ou page Facebook/Twitter. * </label>
        <input  type = "url"
                name ="Facebook"
                placeholder="Ex : https://www.facebook.com/!Ayya!"
                value = "{$urlFB|default:''}"
                required>{$messages.urlFB|default:''}
    </div>

    <div>
        <label> Lien vers votre Soundcloud.</label>
        <input  type = "url"
                name ="Soundcloud"
                placeholder="Ex : https://soundcloud.com/ytprodmusic/!Ayya!"
                value = "{$urlSC|default:''}">{$messages.urlSC|default:''}
    </div>

    <div>
        <label> Lien vers votre chaîne YouTube. </label>
        <input  type = "url"
                name ="YouTube"
                placeholder="Ex : https://www.youtube.com/c/!Ayya!"
                value = "{$urlYT|default:''}">{$messages.urlYT|default:''}
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

        <input  type = "hidden"
                name ="MAX_FILE_SIZE"
                value ="25000000">
    </div>

    <div>
        <label> Fiche Technique (PDF) : * </label>
        <input  name = "ficheTechnique"
                id = "ficheTechnique"
                type="file">

        <input  type = "hidden"
                name ="MAX_FILE_SIZE"
                value ="25000000">
    </div>

    <div>
        <label> Document SACEM (PDF) : * </label>
        <input  name = "sacem"
                id = "sacem"
                type="file">

        <input  type = "hidden"
                name ="MAX_FILE_SIZE"
                value ="25000000">
    </div>

    <div>
        <label> Insérez deux Photos du groupe (Résolution > 300 DPI) * </label>
        <br>
        <input  name = "photoGrp1"
                id = "photoGrp1"
                type = "file">
        </input>
        <br>
        <input  name = "photoGrp2"
                id = "photoGrp2"
                type = "file">
        </input>
    </div>


    <div> 
        <input type ="submit">
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