<?php
include "header.php";
if (!isset($_SESSION['connect'])) {
    header('location:Accueil.php');
}

?>
<div class="nouveau-article pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ms-auto me-auto">

                <div class="card">
                    <div class="card-header">
                        Ajouter article
                    </div>

                    <div class="card-body">


                        <form action="ajouterArticle.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">title</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="enter the title of the article" name="titre">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">content</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="contenue"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="formFileLg" class="form-label">image de l'article</label>
                                <input class="form-control form-control-lg" id="formFileLg" type="file" name="imageArticle">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
include 'footer.php'; 
?>