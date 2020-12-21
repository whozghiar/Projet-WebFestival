

<!doctype html>
<html>
    <head>
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>{$titre}</title>
    </head>
    <body>

        <h1> Candidature au festival : </h1>


<form action="candidature" method="POST">

    <div> <label> Nom du groupe : </label> <input type = "text" name = "Nom du groupe" value = "{$nomGrp|default:''}" required>{$messages.nomGrp|default:''} </div>
    
    <div> <label> Département : </label>
              <select type = "text"  name = "Departement" required> 
                <option selected> Autre
                {foreach $reqAlb item=ligne}
                <option> {$ligne[0]}
                {/foreach}
                </select>
    </div>

    <div>  <label> Ville représentant : </label> <input type = "text" name="Ville représentant" value="{$villeRep|default:''}"> {$messages.villeRep|default:''}  </div>
   
    <div> <label> Code Postal Représentant : </label> <input type = "number" min =  name = "Code Postal" value = "{$cp|default:''}"> {$messages.cp|default:''} </div>

    <div> <label>  Téléphone : </label>
        <input type = "tel" name="tel" pattern = "[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" value = "{$tel|default:''}" required> {$messages.tel|default:''}
        
    
    </div>



    <div> <input type ="submit"> </div>
</form>

    </body>
</html>