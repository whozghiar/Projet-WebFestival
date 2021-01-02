<!doctype html>
<html>
    <head>
        <link href="css/index.css" type="text/css" rel="stylesheet" >
	    <link href="css/liste_candid.css" type="text/css" rel="stylesheet" >
            <meta name= "viewport" content="width=device-width, initial-scale=1">
            <title>Liste des candidatures</title>
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
                {foreach $candidatures key = id item = candidature}
                    <tr>
                    <td>{$id}</td>
                    <td> <a class="detail" href="detail_candidature/{$candidature[5]}">Details </a> </td>
                    <td>{$candidature[0]}</td>
                    <td>{$dep[$id]}</td>
                    <td>{$candidature[1]}</td>
                    <td>{$scene[$id]}</td>
                    <td>{$candidature[3]}</td>
                    <td>{$candidature[4]}</td>
                    <td>{$nom[$id]}</td>
                    </tr>
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