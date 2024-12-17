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
                    <h1>La gourmandise, ça se partage !</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="index.php?gestion=client">Clients</a></li>
                        <li class="active">{$titrePage}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div {if $unClient->getMessageErreur() neq ''} class="alert alert-danger" role="alert" {/if}>

            {$unClient->getMessageErreur()}

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header"><strong>{$titrePage}</strong></div>
                        <form action="index.php" method="POST" novalidate>

                            <!-- PLACER LE FORMULAIRE EN CONSULTATION -->
                            <input type="hidden" name="gestion" value="client">
                            <input type="hidden" name="action" value="{$action}">

                            <div class="card-body card-block">

                                {if $action neq 'ajouter'}
                                    <div class="form-group">
                                        <label for="codec" class="form-control-label">
                                            Code Client :
                                        </label>
                                        <input type="text" name="codec" class="form-control"
                                                readonly value="{$unClient->getCodec()}">
                                    </div>
                                {/if}

                                <div class="form-group">
                                    <label for="nom" class="form-control-label">
                                        Prénom Nom :
                                    </label>
                                    <input required type="text" name="nom" class="form-control"
                                            {$readonly} value="{$unClient->getNom()}">
                                </div>

                                <div class="form-group">
                                    <label for="adresse" class="form-control-label">
                                        Adresse :
                                    </label>
                                    <input type="text" name="adresse" class="form-control"
                                            {$readonly} value="{$unClient->getAdresse()}">
                                </div>

                                <div class="form-group">
                                    <label for="cp" class="form-control-label">
                                        Code postal :
                                    </label>
                                    <input required type="text" name="cp" class="form-control"
                                            {$readonly} value="{$unClient->getCp()}">
                                </div>

                                <div class="form-group">
                                    <label for="ville" class="form-control-label">
                                        Ville :
                                    </label>
                                    <input required type="text" name="ville" class="form-control"
                                            {$readonly} value="{$unClient->getVille()}">
                                </div>

                                <div class="form-group">
                                    <label for="telephone" class="form-control-label">
                                        Téléphone :
                                    </label>
                                    <input type="text" name="telephone" class="form-control"
                                            {$readonly} value="{$unClient->getTelephone()}">
                                </div>
                            </div>

                            <div class="card-body card-block">
                                <div class="col-md-6">
                                    <input type="button" class="btn btn-submit" value="Retour"
                                           onclick='location.href="index.php?gestion=client"'>
                                </div>
                                <div class="col-md-6 text-right">
                                    {if $action != 'consulter'}

                                        <input class="btn btn-submit" type="submit" name="btn_submit"
                                               value="{$action|capitalize}">
                                    {/if}
                                </div>
                                <br>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header"><strong>Statistiques</strong>
                            <div class="card-body card-block">
                                <div class="form-group">  <strong>CA Réalisé : </strong>{$unClient->getStat01()} €</div>
                                <div class="form-group">  <strong>Pourcentage du CA Total : </strong>{$unClient->getStat02()} %</div>
                                <div class="form-group">  <strong>Ses meilleurs achats : <br></strong>
                                    <table class="table">
                                        <tr>
                                        <th class="text-left">Produits Acheté</th>
                                        <th class="text-center">Quantités</th>
                                        </tr>
                                        {foreach from=$unClient->getStat03() item=produit}
                                            <tr>
                                                <td class="text-left">{$produit.designation}</td>
                                                <td class="text-center">{$produit.st03}</td>
                                            </tr>
                                        {/foreach}
                                    </table>
                                </div>
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
