<?php
    require_once(__DIR__.('/partials/header.php'));

    $annonces = getAnnonces();
?>

<div class="container">

    <h1 class="display-4 text-center text-warning text-capitalize my-5">Liste des annonces</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Type</th>
                <th scope="col">Titre</th>
                <th scope="col">Adresse</th>
                <th scope="col">Ville</th>
                <th scope="col">Code Postal</th>
                <th scope="col">Surface</th>
                <th scope="col">Prix</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
            </tr>
        </thead><!-- thead -->

        <tbody>
            <?php foreach ($annonces as $annonce) { ?>
            <tr>
                <th scope="row"><?= $annonce['id_logement'] ?></th>
                <td><?= $annonce['type'] ?></td>
                <td><?= $annonce['titre'] ?></td>
                <td><?= $annonce['rue'] ?></td>
                <td><?= $annonce['ville'] ?></td>
                <td><?= $annonce['cp'] ?></td>
                <td><?= $annonce['surface'] ?></td>
                <td><?= $annonce['prix'] ?></td>
                <td><?= summarize($annonce['description']) ?></td>
                <td><img src="assets/img/annonces/<?= $annonce['image'] ?>"></td>
            </tr>
            <?php } ?>
        </tbody><!-- tbody -->
    </table><!-- table -->

</div><!-- container -->

<?php
    require_once(__DIR__.('/partials/footer.php'));
?>