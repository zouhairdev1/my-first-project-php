<?php
include 'connection_DB.php';
include 'header.php';
if (isset($_GET['id_article'])) {
    if (!empty($_GET['id_article'])) {
        $id_ar = $_GET['id_article'];
        $sql = "SELECT titre,contenue,`image`,date_creation,prenom,nom,photo FROM article INNER JOIN user ON article.auteur=user.id_user WHERE id_article=" . $id_ar;
        $result = mysqli_query($connection, $sql);
        if ($result) {
            $row = mysqli_fetch_array($result);
            echo '
            <div class="container">
                <div class="row mt-3">
                    <div class="col-8   card">
                        <h1 class="text-center">' . $row['titre'] . '</h1>
                        <p class="lh-sm font-monospace text-wrap">
                            ' . $row['contenue'] . '
                        </p>
                        <div class="">
                    <div class="text-start mt-3 fs-5 ">
                    <img src="./imageProfile/'.$row['photo'].'" class="auteurP ">'.' '.$row['prenom'].' '.$row['nom'].'
                    </div>
                    <div class=" text-end fs-6 "><i class="fa-regular fa-calendar "></i>'.$row['date_creation'].'</div>
                    </div>
                    </div>
                    <div class="col-4">
                        <img src="./imageArticle/' . $row['image'] . '" class="card-img-top" alt="...">
                    </div>

                </div>
            </div>
            ';
        }
    }
}
?>

<?php include 'footer.php';  ?>