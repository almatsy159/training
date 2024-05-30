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
                        <li><a href="index.php?gestion=produit">Produits</a></li>
                        <li class="active">{$titrePage}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div {if $unProduit->getMessageErreur() neq ''} class="alert alert-danger" role="alert" {/if}>

        {$unProduit->getMessageErreur()}

    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header"><strong>{$titrePage}</strong></div>
                        <form action="index.php" method="POST" novalidate>

                            <!-- PLACER LE FORMULAIRE EN CONSULTATION -->
                            <input type="hidden" name="gestion" value="produit">
                            <input type="hidden" name="action" value="{$action}">

                            <div class="card-body card-block">

                                {if $action neq 'ajouter'}
                                    <div class="form-group">
                                        <label for="reference" class="form-control-label">
                                            Référence :
                                        </label>
                                        <input type="text" name="reference" class="form-control"
                                               readonly value="{$unProduit->getReference()}">
                                    </div>
                                {/if}

                                <div class="form-group">
                                    <label for="designation" class="form-control-label">
                                        Désignation :
                                    </label>
                                    <input required type="text" name="designation" class="form-control"
                                            {$readonly} value="{$unProduit->getDesignation()}">
                                </div>

                                <div class="form-group">
                                    <label for="quantite" class="form-control-label">
                                        Quantité : <br> <i>Poids du produit ou nombre de pèces</i>
                                    </label>
                                    <input type="text" name="quantite" class="form-control"
                                            {$readonly} value="{$unProduit->getQuantite()}">
                                </div>

                                <div class="form-group">
                                    <label for="descriptif" class="form-control-label">
                                        Descriptif : <br> <i>Unité de mesure : G pour Gramme et P pour Pièce</i>
                                    </label>
                                    <input required type="text" name="descriptif" class="form-control"
                                            {$readonly} value="{$unProduit->getDescriptif()}">
                                </div>

                                <div class="form-group">
                                    <label for="prix_unitaire_HT" class="form-control-label">
                                        Tarif HT :
                                    </label>
                                    <input required type="text" name="prix_unitaire_HT" class="form-control"
                                            {$readonly} value="{$unProduit->getPrix_unitaire_HT()}">
                                </div>

                                <div class="form-group">
                                    <label for="stock" class="form-control-label">
                                        Stock :
                                    </label>
                                    <input type="text" name="stock" class="form-control"
                                            {$readonly} value="{$unProduit->getStock()}">
                                </div>
                                <div class="form-group">
                                    <label for="poids_piece" class="form-control-label">
                                        Poids d'une pièce : <br> <i>En grammes pour les articles vendus par piece</i>
                                    </label>
                                    <input type="text" name="poids_piece" class="form-control"
                                            {$readonly} value="{$unProduit->getPoids_piece()}">
                                </div>
                            </div>

                            <div class="card-body card-block">
                                <div class="col-md-6">
                                    <input type="button" class="btn btn-submit" value="Retour"
                                           onclick='location.href="index.php?gestion=produit"'>
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
                                <div class="form-group">  <strong>Prix au kg : </strong>{$unProduit->getStat01()} €</div>
                                <div class="form-group">  <strong>Classement : </strong></div>
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
