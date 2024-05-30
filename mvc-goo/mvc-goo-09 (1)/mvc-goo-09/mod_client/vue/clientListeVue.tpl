<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{$titreOnglet}</title>
    <meta name="description" content="{$titreOnglet}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="public/favicon.ico">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="public/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="template/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="public/assets/scss/style.css">
    <link href="public/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


<!-- Left Panel -->


{include file='public/left.tpl'}

<!-- FIN : Left Panel -->


<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    {include file='public/header.tpl'}

    <!-- FIN : header -->


    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Vive les Gourmandises ...</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <!-- PLACER LE FIL D'ARIANE -->
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?gestion=client">Clients</a></li>
                        <li class="active">{$titrePage}<!-- PLACER LE TITRE--></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div {if $message neq '' } class="alert alert-success" role="alert"{/if}>
        {$message}
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">{$titrePage}

                                <!-- PLACER LE FORMULAIRE D'AJOUT-->
                                <form method="post" action="index.php" class="text-right">
                                    <input type="hidden" name="gestion" value="client">
                                    <input type="hidden" name="action" value="form_ajouter">
                                    Ajouter un client : <input type="submit" name="btn_ajouter" value="Créer">
                                </form>

                            </strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <!-- PLACER LA LISTE DES CLIENTS -->
                                <thead>
                                <tr>
                                    <th class="text-center">Code Client</th>
                                    <th class="text-center">Prénom Nom</th>
                                    <th class="text-center">Ville</th>
                                    <th class="text-center">Téléphone</th>
                                    <th class="text-center">Consulter</th>
                                    <th class="text-center">Modifier</th>
                                    <th class="text-center">Supprimer</th>
                                </tr>

                                </thead>
                                <tbody>

                                {foreach from=$listeClients item=client}
                                    <tr>
                                        <td>{$client.codec}</td>
                                        <td>{$client.nom}</td>
                                        <td>{$client.ville}</td>
                                        <td>{$client.telephone}</td>
                                        <td>
                                            <form action="index.php" method="post" class="text-center">
                                                <input type="hidden" name="gestion" value="client">
                                                <input type="hidden" name="action" value="form_consulter">
                                                <input type="hidden" name="codec" value="{$client.codec}">

                                                <!-- REMARQUER type='image' se comporte comme un submit sans value. L'avantage est d'accepter une
                                                image plutôt que du texte
                                                 Il existe également le type='button' qui ne soumet pas de formulaire et qui travaille
                                                 avec un gestionnaire d'évènement - JS (la plupart du temps pour l'évènement click)-->
                                                <input id="pImage" type="image" name="btn_consulter"
                                                       src='public/images/icones/p16.png'>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="index.php" method="post" class="text-center">
                                                <input type="hidden" name="gestion" value="client">
                                                <input type="hidden" name="action" value="form_modifier">
                                                <input type="hidden" name="codec" value="{$client.codec}">
                                                <!-- autre manière d'écrire avec champ Button de type submit avec une image
                                                Le graphisme est toutefois impactée par la forme du  "button"-->
                                                <button id="mImage" type="image" name="btn_modifier">
                                                    <img src='public/images/icones/m16.png'>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="index.php" method="post" class="text-center">
                                                <input type="hidden" name="gestion" value="client">
                                                <input type="hidden" name="action" value="form_supprimer">
                                                <input type="hidden" name="codec" value="{$client.codec}">
{*                                                <input type="submit" name="btn_supprimer" value="Supprimer">*}
                                                <button type="submit" name="btn_supprimer"> Supprimer</button>
                                            </form>
                                        </td>

                                    </tr>
                                    {foreachelse}
                                    <tr>
                                        <td colspan="7"> Aucun enregistrement trouvé</td>
                                    </tr>
                                {/foreach}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="public/assets/js/plugins.js"></script>
    <script src="public/assets/js/main.js"></script>


    <script src="public/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="public/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="public/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="public/assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

</body>
</html>
