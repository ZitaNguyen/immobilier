<footer>
    <div class="bg-light mt-5 py-5">
        <div class="container d-flex justify-content-between">
            <div class="mt-1">
                <h5>Immobilier</h5>
                <small class="d-block">
                        &copy; <?= date('Y') ?>
                </small>
            </div>

            <div class="nav">
                <a class="nav-item nav-link text-dark" href="#">Les annonces</a>
                <a class="nav-item nav-link text-dark" href="#">Créer une annonce</a>
            </div>


    </div><!-- container -->
</footer>

<!-- JS Bootstrap -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<!-- CKEditor CDN -->
<script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace( 'description' );
</script>

</body>
</html>