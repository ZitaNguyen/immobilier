<?php 

require_once(__DIR__.('/partials/header.php'));

$titre = $rue = $ville = $cp = $surface = $prix = $type = $description = $image = null;

if (!empty($_POST)) {

    // Recupere des donnés
    $titre = $_POST['titre'];
    $rue = $_POST['rue'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $surface = $_POST['surface'];
    $prix = $_POST['prix'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    $sizeImg = $image['size'];

    $errors = [];

    if ($sizeImg != 0) {

        // Traitement image
        $fileTmp = $image['tmp_name']; 
        $extension = pathinfo($image['name'])['extension'];
        $fileName = slugify($titre) . '.' . $extension;
        $destination = __DIR__ . '/assets/img/annonces/' . $fileName;
        move_uploaded_file($fileTmp, $destination);
        $image = $fileName;

    } 

    // Verification le titre
    if (empty($titre)) {
        $errors['titre'] = 'Le titre est vide.';
    }

    if (!empty($titre) && strlen($titre) > 100) {
        $errors['titre'] = 'Le titre est trop long.';
    }

    // Verification l'adresse
    if (empty($rue)) {
        $errors['rue'] = 'L\'adresse est vide.';
    }

    if (empty($ville)) {
        $errors['ville'] = 'La ville est vide.';
    }

    // Verification le code postale
    if (empty($cp)) {
        $errors['cp'] = 'Le code postale est vide.';
    }

    if (!empty($cp) && preg_match('#^(0-9){5}$#',$cp)) {
        $errors['cp'] = "Le code postal est erroné";
    }

    // Verification le surface
    if (empty($surface)) {
        $errors['surface'] = 'Le surface est vide.';
    }

    if (!empty($surface) && !filter_var($surface, FILTER_VALIDATE_INT)) {
        $errors['surface'] = "Nombres entiers attendu.";
    }

    // Verification le prix
    if (empty($prix)) {
        $errors['prix'] = 'Le prix est vide.';
    }

    if (!empty($prix) && !filter_var($prix, FILTER_VALIDATE_INT)) {
        $errors['prix'] = "Nombres entiers attendu.";
    }

    // Verification la description
    if (empty($description)) {
        $errors['description'] = "La description est vide.";
    }

    if (!empty($description) && strlen($description) < 20) {
        $errors['description'] = "La description est trop court.";
    }

    // Verification l'image
    if (empty($sizeImg)){
        $errors['image'] = "Vous n'avez pas encore mis un image.";
    }

    if (!empty($sizeImg) && $extension != "jpg") {
        $errors['image'] = "Le format d'image ne convient pas.";
    }

    // Functions
    if (empty($errors)) {

        addAnnonce($titre, $rue, $ville, $cp, $surface, $prix, $image, $type, $description);
        redirection('annonces.php');
    }

}

?>

<div class="container">

    <h1 class="display-4 text-center text-warning text-capitalize my-5">Créer une Annonce</h1>

    <form method="POST" enctype="multipart/form-data">

        <?php if (isset($errors['image'])) { ?>
            <div class="alert alert-danger">
                <?= $errors['image']?> 
            </div>
        <?php } ?>


        <!-- Champ type -->
        <div class="form-group">
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="type" value="location" checked>
                <label class="form-check-label">Location</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" class="form-check-input" name="type" value="vente">
                <label class="form-check-label">Vente</label>
            </div>
        </div><!-- form-group -->

        <!-- Champ titre -->
        <div class="form-group">
            <input type="text" class="form-control <?= isset($errors['titre']) ? 'is-invalid' : '' ?>" name="titre" placeholder="Titre de votre annonce..." value="<?= $titre ?>">

            <div class="invalid-feedback">
                <?= isset($errors['titre']) ? $errors['titre'] : '' ?>
            </div><!-- invalid-feedback -->
        </div><!-- form-group -->

        <!-- Champ adress -->
        <div class="form-group d-flex justify-content-between">
            <div>
                <input type="text" class=" form-control <?= isset($errors['rue']) ? 'is-invalid' : '' ?>" name="rue" placeholder="Rue" value="<?= $rue ?>">

                <div class="invalid-feedback">
                    <?= isset($errors['rue']) ? $errors['rue'] : '' ?>
                </div><!-- invalid-feedback -->   
            </div>

            <div>
                <input type="text" class="form-control <?= isset($errors['ville']) ? 'is-invalid' : '' ?>" name="ville" placeholder="Ville" value="<?= $ville ?>">

                <div class="invalid-feedback">
                    <?= isset($errors['ville']) ? $errors['ville'] : '' ?>
                </div><!-- invalid-feedback -->   
            </div>

            <div>
                <input type="text" class="form-control <?= isset($errors['cp']) ? 'is-invalid' : '' ?>" name="cp" placeholder="Code Postal" value="<?= $cp ?>">

                <div class="invalid-feedback">
                    <?= isset($errors['cp']) ? $errors['cp'] : '' ?>
                </div><!-- invalid-feedback -->   
            </div>
        </div><!-- form-group -->

        <!-- Champ description -->
        <div class="form-group">
            <textarea class="form-control <?= isset($errors['description']) ? 'is-invalid' : '' ?>" name="description" rows="10" placeholder="Description de mon annonce...">
                <?= $description ?>
            </textarea>
            
            <div class="invalid-feedback">
                    <?= isset($errors['description']) ? $errors['description'] : '' ?>
                </div><!-- invalid-feedback -->   
        </div><!-- form-group -->

        <!-- Champ surface - prix -->
        <div class="form-group d-flex justify-content-between">
            <div>
                <div class="input-group">
                    <input type="text" class="form-control <?= isset($errors['surface']) ? 'is-invalid' : '' ?>" name="surface" placeholder="Surface" value="<?= $surface ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">m<sup>2</sup></div>
                    </div>
                </div><!-- input-group -->
                <div class="invalid-feedback">
                    <?= isset($errors['surface']) ? $errors['surface'] : '' ?>
                </div><!-- invalid-feedback -->
            </div>   
            
            <div>
                <div class="input-group">
                    <input type="text" class="form-control <?= isset($errors['prix']) ? 'is-invalid' : '' ?>" name="prix" placeholder="Prix" value="<?= $prix ?>">
                    <div class="input-group-append">
                        <div class="input-group-text">&euro;</sup></div>
                    </div>
                </div><!-- input-group -->
                <div class="invalid-feedback">
                    <?= isset($errors['prix']) ? $errors['prix'] : '' ?>
                </div><!-- invalid-feedback -->
            </div>
        </div><!-- form-group -->

        <!-- Champ image -->
        <div class="form-group">
            <input type="file" class="form-file-control" name="image">
        </div><!-- row -->

        <!-- Button -->
        <div class="form-group ">
            <button type="submit" class="btn btn-secondary form-control">
                Publier
            </button>
        </div><!-- row -->
    
    </form><!-- form -->

</div><!-- container -->
    
<?php 

require_once(__DIR__.('/partials/footer.php'));

?>