
{if isset ($user)}

<!doctype html>
<html>
    <head>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>{$titre}</title>
    </head>
    <body>

        <h1> Candidature au festival : </h1>


<form action="candidature" method="POST">

    <div> 
        <input type = "text"
               name = "Nom du groupe"
               placeholder= "Nom du groupe"
               value = "{$nomGrp|default:''}"
               required> {$messages.nomGrp|default:''}
    </div>
    
    <div>       
            <label> Département : <label> 
                <select type = "text"  name = "Departement"required> 
                    <option selected> Autre
                        {foreach $reqAlb item=ligne}
                            <option> {$ligne[0]}
                        {/foreach}
                </select>
    </div>

    <div>
        <input  type = "text"
                name="Ville représentant" 
                placeholder= "Ville représentant"
                value="{$villeRep|default:''}"
                required> {$messages.villeRep|default:''} 

    </div>
   
    <div>
        <input  type = "number"
        style="-moz-appearance: textfield"
        name = "Code Postal"
        placeholder = "Code Postal"
        value = "{$cp|default:''}"
        required> {$messages.cp|default:''} 
    </div>

    <div>
        <input  type = "tel"
        name="tel"
        placeholder="Téléphone"
        pattern = "[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}"
        value = "{$tel|default:''}"
        required> {$messages.tel|default:''}
    </div>

    <div>
        <input   type = "number"
                 name = "annee"
                 placeholder="Année Création"
                 min = "1930"
                 max = "2021"
                 value = "{$anneeCrea|default:''}"
                 required> {$messages.anneeCrea|default:''}
    </div> 

    <div>
        <input  type = "text"
                name = "styleMus"
                placeholder="Style Musical"
                value = "{$styleMus|default:''}"
                required> {$messages.styleMus|default:''}
    </div>

    <div>
        <input  type = "text"
                name = "presTexte"
                placeholder="Présentez votre groupe..."
                value = "{$presTexte|default:''}"
                required> {$messages.presTexte|default:''}
    </div>  

    <div>
        <input  type = "text"
                name = "expScenique"
                placeholder="Parlez-nous de votre expérience scénique..."
                value = "{$expScenique|default:''}"
                required> {$messages.expScenique|default:''}
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
{/if}