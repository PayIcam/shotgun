<div class="jumbotron">
<h1><?= $shotgun->titre; ?></h1>
<p class="lead">Gestion du shotgun.</p>
</div>

<div class="row marketing">
<div class="col-lg-12">
    <a class="btn btn-primary pull-right" href="shotgunform?fun_id=<?= $shotgun->payutc_fun_id; ?>&desc_id=<?= $shotgun->id; ?>" >Modifier</a>
    <h2>Paramètres globaux</h2>
    <strong>Titre du shotgun : </strong><?= $shotgun->titre; ?><br />
    <strong>Description du shotgun : </strong><br /><?= $shotgun->desc; ?><br />
    <strong>Shotgun public : </strong><?= $shotgun->is_public ? "oui" : "non"; ?><br />
    <strong>Quota : </strong><?= $shotgun->quota; ?><br />
    <strong>Ouverture des ventes : </strong><?= $shotgun->debut; ?><br />
    <strong>Fermeture des ventes : </strong><?= $shotgun->fin; ?><br />
    <strong>Public cible : </strong><?= implode(', ', $shotgun->public_cible); ?><br />

    <a class="btn btn-primary pull-right" href="choiceform?id=<?= $shotgun->id; ?>" >Ajouter</a>
    <h2>Choix</h2>
    <table class="table">
        <thead>
            <th>Nom du choix</th>
            <th>Prix <!-- cotisant --></th>
            <!-- <th>Prix non-cotisant</th> -->
            <th>Place Shotgunnée</th>
            <th>Place en cours de shotgun</th>
            <th>Place Dispo</th>
            <th>Place Total</th>
            <th></th>
        </thead>
        <?php foreach($shotgun->getChoices() as $choice) { ?>
            <tr>
                <td><?= $choice->name; ?></td>
                <td><?= $choice->priceC/100; ?> €</td>
                <!-- <td><?php // echo $choice->priceNC/100; ?> €</td> -->
                <td><?= $choice->getNbPlace('V'); ?></td>
                <td><?= $choice->getNbPlace('W'); ?></td>
                <td><?= $choice->getNbPlace('A'); ?></td>
                <td><?= $choice->getNbPlace('T'); ?></td>
                <td><a href="choiceform?id=<?= $shotgun->id; ?>&choice_id=<?= $choice->id; ?>" class="btn btn-primary">Modifier</a></td>
            </tr>
        <?php } ?>
    </table>
    <h2>Outils</h2>
    <ul>
        <li><a href="export?id=<?= $shotgun->id; ?>" >Télécharger l'export</a></li>
    </ul>
</div>
</div>