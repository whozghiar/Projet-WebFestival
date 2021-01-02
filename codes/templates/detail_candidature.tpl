<!doctype html>
<html>
    <head>
    {if $lien==1}
	    
	    <link href="css/detail_candidature.css" type="text/css" rel="stylesheet" >
    {else}
	    
        <link href="../css/detail_candidature.css" type="text/css" rel="stylesheet" >
    {/if}
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Candidature {$nomGrp}</title>
    </head>
    <header>
        <a class="header" href="/codes">
        <img class="header" src="/images/home.png">
        </a>
    </header>
    <body>
        <div class="fadeIn H">
            <div class="page-title-holder">
                <h1> Candidature de : {$nomGrp}</h1>
            </div>
            <div class = "wrapper fadeInDown">
                <div id = "formContent">
                    {foreach $reqPhotos item = photo}
                            
                        {if $lien==1}
                            <img class="photo"
                                src = "../data/upload/upload {$photo[0]}">
                        {else}
                            <img class="photo"
                                src = "../../data/upload/upload {$photo[0]}">
                        {/if}

                    {/foreach}
                    <br>
                    {foreach $reqMus item = Mus}
                        <audio
                        controls
                        {if $lien==1}
                                src = "../data/upload/upload {$Mus[0]}">
                        {else}
                                src = "../../data/upload/upload {$Mus[0]}">
                        {/if}
                        </audio>
                        {if $lien==1}
                            <a class = "musique" href = "../data/upload/upload {$Mus[0]} " download = "Extrait {$Mus[0]} par {$nomGrp}.mp3">
                            {$Mus[0]}
                            </a>
                        {else}
                            <a class = "musique" href = "../../data/upload/upload {$Mus[0]} " download = "Extrait {$Mus[0]} par {$nomGrp}.mp3">
                            {$Mus[0]}
                            </a>
                        {/if}
                        <br>
                    {/foreach}


                    <h3> Membres : </h3>
                    {foreach $Membres item = membre}
                        {$membre[0]}
                        <br>
                    {/foreach}
                    
                    <h3>Dept : </h3> {$nomDep}
                    <br>
                    <h3> Ville : </h3> {$villeRepresentant}
                    <br>
                    <h3> Code Postal : </h3> {$codePostalRepresentant}
                    <br>
                    <h3> Style : </h3> {$styleMusique}
                    <br>
                    <h3> Web :</h3> <a class = "lien" href ={$webFacebook}> {$webFacebook} </a>
                    <br>
                    <h3> SoundCloud :</h3> 
                    {if $soundcloud == 1}
                        <h3> SoundCloud :</h3> <a class = "lien" href ={$soundcloud}> {$soundcloud} </a>
                        <br>
                    {else}
                        Le groupe ne possède pas de SoundCloud.
                        <br>
                    {/if} 
                    <h3> YouTube :</h3> 
                    {if $youtube == 1}
                        <h3> Youtube : </h3> <a class = "lien" href = {$youtube}> {$youtube} </a>
                        <br>
                    {else}
                        Le groupe ne possède pas de chaîne YouTube.
                        <br>
                    {/if}

                    <h3> Expérience(s) Scénique(s) : </h3> {$expScenique}
                    <br>
                    <h3> Présentation : </h3> {$presentationTexte}
                    <br>
                    <h3> Producteur : </h3>
                    {if $producteur == 1 }
                        {$nomGrp} ne possède pas de producteur.
                    {else}
                        {$nomGrp} possède un producteur.
                    {/if}
                    <h3> Associatif : </h3>
                    {if $associatif == 1 }
                        {$nomGrp} ne possède pas un statut associatif.
                    {else}
                        {$nomGrp} possède un statut associatif.
                    {/if}
                    <h3> SACEM : </h3>
                    {if $sacem == 1 }
                        {$nomGrp} est inscrit à la SACEM.
                    {else}
                        {$nomGrp} n'est pas inscrit à la SACEM.
                    {/if}
                    {if $lien==1}
                    <h3> Dossier : </h3> <a class = file href = "../data/upload/upload {$dossierPresse} " download = "Dossier de Presse {$nomGrp}.pdf"> {$dossierPresse} </a>
                    <br>
                    <h3> Setlist / SACEM : </h3> <a class = "file" href = "../data/upload/upload {$docSacem} " download = "Sacem {$nomGrp}.pdf"> {$docSacem} </a>
                    <br>
                    <h3> Fiche Technique : </h3> <a class = "file" href = "../data/upload/upload {$ficheTechnique} " download = "Fiche Technique {$nomGrp}.pdf"> {$ficheTechnique} </a>
                    {else}
                    <h3> Dossier : </h3> <a href = "../../data/upload/upload {$dossierPresse} " download = "Dossier de Presse {$nomGrp}.pdf"> {$dossierPresse} </a>
                    <br>
                    <h3> Setlist / SACEM : </h3> <a class = "file" href = "../../data/upload/upload {$docSacem} " download = "Sacem {$nomGrp}.pdf"> {$docSacem} </a>
                    <br>
                    <h3> Fiche Technique : </h3> <a class = "file" href = "../../data/upload/upload {$ficheTechnique} " download = "Fiche Technique {$nomGrp}.pdf"> {$ficheTechnique} </a>
                    {/if}
                </div>
            </div>

            <br>
            <a class="supprimer" href="delete/{$iduser}">Supprimer la candidature </a>
            {*
                <br>
                <a class = "modif"> Modifier la candidature </a>
             *}

        </div>


    </body>