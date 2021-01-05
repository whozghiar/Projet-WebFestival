<!doctype html>
<html>
    <head>
    
    <link rel="icon" type="image/x-icon" href="https://www.flaticon.com/svg/static/icons/svg/3022/3022607.svg">
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
                <h1> Candidature de : <div class="reset ">{$nomGrp}</div> </h1>
            </div>
            <div class = "wrapper fadeInDown">
                <div id = "formContent">
                    {foreach $reqPhotos item = photo}
                            
                        {if $lien==1}
                            <img class="photo"
                                src = "../data/upload/{$nomGrp} {$photo[0]}" alt = "Photo 1 de {$nomGrp}">
                        {else}
                            <img class="photo"
                                src = "../../data/upload/{$nomGrp} {$photo[0]}" alt = "Photo 2 de {$nomGrp}">
                        {/if}

                    {/foreach}
                    <br>
                    {foreach $reqMus item = Mus}
                        <audio
                        controls
                        {if $lien==1}
                                src = "../data/upload/{$nomGrp} {$Mus[0]}">
                        {else}
                                src = "../../data/upload/{$nomGrp} {$Mus[0]}">
                        {/if}
                        </audio>
                        {if $lien==1}
                            <a class = "musique" href = "../data/upload/{$nomGrp} {$Mus[0]} " download = "Extrait {$Mus[0]} par {$nomGrp}.mp3">
                            {$Mus[0]}
                            </a>
                        {else}
                            <a class = "musique" href = "../../data/upload/{$nomGrp} {$Mus[0]} " download = "Extrait {$Mus[0]} par {$nomGrp}.mp3">
                            {$Mus[0]}
                            </a>
                        {/if}
                        <br>
                    {/foreach}


                    <h3> Membres : </h3>
                    <div class = "reset">
                    {foreach $Membres item = membre}
                        {$membre[0]} {$membre[1]} : {$membre[2]}
                        <br>
                    {/foreach}
                    </div>
                    
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
                    {if $soundcloud != NULL}
                        <a class = "lien" href ={$soundcloud}> {$soundcloud} </a>
                        <br>
                    {else}
                        Le groupe ne possède pas de SoundCloud.
                        <br>
                    {/if} 
                    <h3> YouTube :</h3> 
                    {if $youtube != NULL}
                        <a class = "lien" href = {$youtube}> {$youtube} </a>
                        <br>
                    {else}
                        Le groupe ne possède pas de chaîne YouTube.
                        <br>
                    {/if}

                    <h3> Expérience(s) Scénique(s) : </h3> <div class="reset"> {$expScenique} </div>
                    <br>
                    <h3> Présentation : </h3> <div class="reset"> {$presentationTexte} </div>
                    <br>
                    <h3> Producteur : </h3>
                    <div class="reset">
                    {if $producteur == 1 }
                        {$nomGrp} ne possède pas de producteur.
                    {else}
                        {$nomGrp} possède un producteur.
                    {/if}
                    </div>
                    <h3> Associatif : </h3>
                    <div class="reset">
                    {if $associatif == 1 }
                        {$nomGrp} ne possède pas un statut associatif.
                    {else}
                        {$nomGrp} possède un statut associatif.
                    {/if}
                    </div>
                    <h3> SACEM : </h3>
                    <div class="reset">
                    {if $sacem == 1 }
                        {$nomGrp} n'est pas inscrit à la SACEM.
                    {else}
                        {$nomGrp} est inscrit à la SACEM.
                    {/if}
                    </div>
                    <h3> Dossier : </h3>
                    {if $lien==1}
                        {if $dossierPresse!=NULL}
                            <a class = "file" href = "../data/upload/{$nomGrp} {$dossierPresse} " download = "Dossier de Presse {$nomGrp}.pdf"> {$dossierPresse} </a>
                        {else}
                            <div class="reset">
                            Ce groupe ne possède pas de dossier de presse.
                            </div>
                        {/if}
                    <br>
                    <h3> Setlist / SACEM : </h3> <a class = "file" href = "../data/upload/{$nomGrp} {$docSacem} " download = "Sacem {$nomGrp}.pdf"> {$docSacem} </a>
                    <br>
                    <h3> Fiche Technique : </h3> <a class = "file" href = "../data/upload/{$nomGrp} {$ficheTechnique} " download = "Fiche Technique {$nomGrp}.pdf"> {$ficheTechnique} </a>
                    {else}
                        {if $dossierPresse!=NULL}
                           <a class = "file" href = "../../data/upload/{$nomGrp} {$dossierPresse} " download = "Dossier de Presse {$nomGrp}.pdf"> {$dossierPresse} </a>
                        {else}
                            Ce groupe ne possède pas de dossier de presse.
                        {/if}
                    <br>
                    <h3> Setlist / SACEM : </h3> <a class = "file" href = "../../data/upload/{$nomGrp} {$docSacem} " download = "Sacem {$nomGrp}.pdf"> {$docSacem} </a>
                    <br>
                    <h3> Fiche Technique : </h3> <a class = "file" href = "../../data/upload/{$nomGrp} {$ficheTechnique} " download = "Fiche Technique {$nomGrp}.pdf"> {$ficheTechnique} </a>
                    {/if}
                </div>
            </div>

            <br>
            <a class="supprimer" href="{if $lien==0}../{/if}delete/{$iduser}">Supprimer la candidature </a>
            {*
                <br>
                <a class = "modif"> Modifier la candidature </a>
             *}

        </div>


    </body>