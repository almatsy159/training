<?php
require_once('assure.php');
require_once('assureManager.php');

$cnx = new PDO('mysql:host=localhost;dbname=assurance', 'root', '');
$m = new AssureManager($cnx);

// Traitement des 4 actions proposées par le scénario

if (isset($_POST['btn_creer'])) {

    $assure = new Assure([
        'nom' => $_POST['f_nom'],
        'age' => $_POST['f_age'],
        'domicile' => $_POST['f_domicile'],
        'bonusMalus' => 0,
        'pointsFidelite' => 5
    ]);

    if ($assure->getNom() != null && $assure->getAge() != null && $assure->getDomicile() != null) {
        $m->addAssure($assure);
    }
}

if (isset($_POST['btn_regler'])) {

    $assure = $m->getAssure($_POST['f_id']);
    $assure->reglerAssurance();
    $m->editAssure($assure);

}

if (isset($_POST['btn_accident'])) {

    $assure = $m->getAssure($_POST['f_id']);
    $assure->avoirAccident();
    $m->editAssure($assure);
}

if (isset($_POST['btn_supprimer'])) {

    $assure = $m->getAssure($_POST['f_id']);
    $m->deleteAssure($assure);

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Les dossiers Assurés</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>


<br>
<div class="container">

    <header class="row">

        <div class="col-md-12 hidden-sm hidden-xs"><img src="images/banner.webp"></div>

    </header>

    <div class="row pos">
        <nav class="col-md-3">

            <ul class="list-group">
                <li class="list-group-item"><a href="sAssure.php">Accueil</a>
            </ul>
        </nav>

        <main class="col-md-9">
            <h1>Les dossiers assurés</h1>
            <p> Nombre d'assurés : <strong> <?php echo $m->count(); ?></strong></p>
            <table class="table">
                <thead class="">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Bonus Malus</th>
                    <th scope="col">Fidélité</th>
                    <th scope="col">Régler</th>
                    <th scope="col">Notification</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                //echo "Récupération d'un tableau d'objets (Cf. getListAssure())";
                $assures = $m->getListAssure();
                //var_dump($assures);
                if (empty($assures)) {

                    echo 'Aucun assuré ...';

                } else {

                    foreach ($assures as $unAssure) {

                        echo '<tr>
                        <th scope="row"> ' . $unAssure->getIdAssure() . '</th>
                        <td> ' . $unAssure->getNom() . '</td>
                        <td> ' . $unAssure->getBonusMalus() . '</td>
                        <td> ' . $unAssure->getPointsFidelite() . '</td>
                      
                        <td>
                           <form method="post" action="sAssure.php">
                            <input type="hidden" name="f_id" value="' . $unAssure->getIdAssure() . '">
                            <button type="submit" class="btn btn-primary btn-sm" name="btn_regler">Régler</button>
                            </form>
                         </td>
                        <td>
                            <form method="post" action="sAssure.php">
                             <input type="hidden" name="f_id" value="' . $unAssure->getIdAssure() . '">
                            <button type="submit" class="btn btn-primary btn-sm" name="btn_accident">Accident</button>
                            </form>
                         </td>
                           <td>
                            <form method="post" action="sAssure.php">
                             <input type="hidden" name="f_id" value="' . $unAssure->getIdAssure() . '">
                            <button type="submit" class="btn btn-primary btn-sm" name="btn_supprimer">Supprimer</button>
                            </form>
                         </td>
                         </tr>';
                    }
                }
                ?>

                </tbody>
            </table>


            <div class="row">

                <div class="col-md-7">
                    <p>
                        <!-- Zone de massage ... -->
                        <?php
                        if (isset($assure)) {
                            echo "<em>" . $assure->getMessage() . "</em>";
                        }
                        ?>

                    </p>

                    <form method='POST' action='sAssure.php'>
                        <div class="form-group">
                            <label for="f_nom">Nom</label>
                            <input type="text" class="form-control" id="f_nom" name='f_nom' placeholder="Saisir le nom">
                        </div>
                        <div class="form-group">
                            <label for="f_age">Age</label>
                            <input type="text" class="form-control" id="f_age" name='f_age' placeholder="Saisir l'âge">
                        </div>
                        <div class="form-group">
                            <label for="f_domicile">Domicile</label>
                            <input type="text" class="form-control" id="f_domicile" name='f_domicile'
                                   placeholder="Saisir le domicile">
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm" name='btn_creer'>Créer</button>


                    </form>
                </div>
                <div class="col-md-5"></div>

            </div>
        </main>
    </div>

    <footer class="row pos">
        <div class="col-md-12 text-center">&copy; 2021 Campus-Centre - TP Manipulation 08</div>
    </footer>

</div>

</body>
</html>



