<!doctype html>
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
                {foreach $candidatures key = id item = candidature}                <!-- Pour chaque candidature -->
                    <tr>                                                                    <!-- Début de ligne -->
                    <td>{$id}</td>                                                                          <!-- Affiche l'ID -->
                    <td> <a class="detail" href="detail_candidature/{$candidature[5]}">Details </a> </td>   <!-- Affiche un bouton qui permet d'accéder à la candidature complète -->
                    <td>{$candidature[0]}</td>                                                              <!-- Affiche le nom du groupe -->
                    <td>{$dep[$id]}</td>                                                                    <!-- Affiche le nom du département -->
                    <td>{$candidature[1]}</td>                                                              <!-- Affiche la ville -->
                    <td>{$scene[$id]}</td>                                                                  <!-- Affiche la scène -->
                    <td>{$candidature[3]}</td>                                                              <!-- Affiche le style musical -->
                    <td>{$candidature[4]}</td>                                                              <!-- Affiche l'année de création -->
                    <td>{$nom[$id]}</td>                                                                    <!-- Affiche le nom du résponsable -->
                    </tr>                                                                   <!-- Fin de ligne -->
                {/foreach}                                                            
                </tbody>
            </table>
        </div>

{*
candidature[0] nomGroupe
candidature[1] villeRepresentant
candidature[2] CP Representant
candidature[3] styleMusique
candidature[4] anneeCreation
candidature[5] idUser

dep[$id] nomDep
nom[$id] nomuser
scene[$id] scene 


*}








        </div>
    </body>