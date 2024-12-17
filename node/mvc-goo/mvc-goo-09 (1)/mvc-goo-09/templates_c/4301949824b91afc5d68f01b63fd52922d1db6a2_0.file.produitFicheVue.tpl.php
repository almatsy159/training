<?php
/* Smarty version 3.1.34-dev-7, created on 2021-05-24 12:18:35
  from 'C:\wamp64\www\gourmandise\mvc-goo-09\mod_produit\vue\produitFicheVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60ab999b3ccb18_40460646',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4301949824b91afc5d68f01b63fd52922d1db6a2' => 
    array (
      0 => 'C:\\wamp64\\www\\gourmandise\\mvc-goo-09\\mod_produit\\vue\\produitFicheVue.tpl',
      1 => 1621858699,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/left.tpl' => 1,
    'file:public/header.tpl' => 1,
  ),
),false)) {
function content_60ab999b3ccb18_40460646 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\gourmandise\\mvc-goo-09\\include\\libs\\plugins\\modifier.capitalize.php','function'=>'smarty_modifier_capitalize',),));
?>
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
    <title><?php echo $_smarty_tpl->tpl_vars['titreOnglet']->value;?>
</title>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['titreOnglet']->value;?>
">
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

    <!-- <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"><?php echo '</script'; ?>
> -->

</head>
<body>


<!-- Left Panel -->


<?php $_smarty_tpl->_subTemplateRender('file:public/left.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- FIN : Left Panel -->


<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!--Header -->

    <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
                        <li class="active"><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div <?php if ($_smarty_tpl->tpl_vars['unProduit']->value->getMessageErreur() != '') {?> class="alert alert-danger" role="alert" <?php }?>>

        <?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getMessageErreur();?>


    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="row">

                <div class="col-md-6">

                    <div class="card">
                        <div class="card-header"><strong><?php echo $_smarty_tpl->tpl_vars['titrePage']->value;?>
</strong></div>
                        <form action="index.php" method="POST" novalidate>

                            <!-- PLACER LE FORMULAIRE EN CONSULTATION -->
                            <input type="hidden" name="gestion" value="produit">
                            <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">

                            <div class="card-body card-block">

                                <?php if ($_smarty_tpl->tpl_vars['action']->value != 'ajouter') {?>
                                    <div class="form-group">
                                        <label for="reference" class="form-control-label">
                                            Référence :
                                        </label>
                                        <input type="text" name="reference" class="form-control"
                                               readonly value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getReference();?>
">
                                    </div>
                                <?php }?>

                                <div class="form-group">
                                    <label for="designation" class="form-control-label">
                                        Désignation :
                                    </label>
                                    <input required type="text" name="designation" class="form-control"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getDesignation();?>
">
                                </div>

                                <div class="form-group">
                                    <label for="quantite" class="form-control-label">
                                        Quantité : <br> <i>Poids du produit ou nombre de pèces</i>
                                    </label>
                                    <input type="text" name="quantite" class="form-control"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getQuantite();?>
">
                                </div>

                                <div class="form-group">
                                    <label for="descriptif" class="form-control-label">
                                        Descriptif : <br> <i>Unité de mesure : G pour Gramme et P pour Pièce</i>
                                    </label>
                                    <input required type="text" name="descriptif" class="form-control"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getDescriptif();?>
">
                                </div>

                                <div class="form-group">
                                    <label for="prix_unitaire_HT" class="form-control-label">
                                        Tarif HT :
                                    </label>
                                    <input required type="text" name="prix_unitaire_HT" class="form-control"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getPrix_unitaire_HT();?>
">
                                </div>

                                <div class="form-group">
                                    <label for="stock" class="form-control-label">
                                        Stock :
                                    </label>
                                    <input type="text" name="stock" class="form-control"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getStock();?>
">
                                </div>
                                <div class="form-group">
                                    <label for="poids_piece" class="form-control-label">
                                        Poids d'une pièce : <br> <i>En grammes pour les articles vendus par piece</i>
                                    </label>
                                    <input type="text" name="poids_piece" class="form-control"
                                            <?php echo $_smarty_tpl->tpl_vars['readonly']->value;?>
 value="<?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getPoids_piece();?>
">
                                </div>
                            </div>

                            <div class="card-body card-block">
                                <div class="col-md-6">
                                    <input type="button" class="btn btn-submit" value="Retour"
                                           onclick='location.href="index.php?gestion=produit"'>
                                </div>
                                <div class="col-md-6 text-right">
                                    <?php if ($_smarty_tpl->tpl_vars['action']->value != 'consulter') {?>

                                        <input class="btn btn-submit" type="submit" name="btn_submit"
                                               value="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['action']->value);?>
">
                                    <?php }?>
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
                                <div class="form-group">  <strong>Prix au kg : </strong><?php echo $_smarty_tpl->tpl_vars['unProduit']->value->getStat01();?>
 €</div>
                                <div class="form-group">  <strong>Classement : </strong></div>
                            </div>
                        </div>
                    </div>
                </div><!-- .animated -->
            </div><!-- .content -->


        </div><!-- /#right-panel -->

        <!-- Right Panel -->
        <?php echo '<script'; ?>
 src="public/assets/js/vendor/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/plugins.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/main.js"><?php echo '</script'; ?>
>


        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/datatables.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/jszip.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/pdfmake.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/vfs_fonts.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.html5.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.print.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.colVis.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/datatables-init.js"><?php echo '</script'; ?>
>


        <?php echo '<script'; ?>
 type="text/javascript">
            $(document).ready(function () {
                $('#bootstrap-data-table-export').DataTable();
            });
        <?php echo '</script'; ?>
>

</body>
</html>
<?php }
}
