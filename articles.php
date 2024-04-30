<?php
include("connection_DB.php");
include 'header.php';
$sql = "SELECT id_article,titre,contenue,`image`,date_creation,prenom,nom,photo FROM article INNER JOIN user ON article.auteur=user.id_user ORDER BY article.date_creation DESC";
$result = mysqli_query($connection, $sql);
if ($result) {
    echo '<div class="articles pt-5 pb-5">
    <div class="container">

        <div class="row">';
    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
            echo ' <div class="col-lg-4 col-md-6 mb-5">
            <div class="card" style="height:30rem;">
                <img src="./imageArticle/' . $row['image'] . '" class="card-img-top" height="192px" alt="...">
                <div class="card-body position-relative">
                    <h5 class="card-title">' . $row['titre'] . '</h5>
                    <p class="card-text">' . mb_substr($row['contenue'], 0, 50) . '...</p>
                    <a href="article.php?id_article='.$row['id_article'].'" class="btn btn-primary">Lire plus</a>
                    <div class="position-absolute bottom-0">
                    <div class="text-start mt-3 fs-5 ">
                    <img src="./imageProfile/'.$row['photo'].'" class="auteurP ">'.' '.$row['prenom'].' '.$row['nom'].'
                    </div>
                    <div class=" text-end fs-6 "><i class="fa-regular fa-calendar"></i>'.$row['date_creation'].'</div>
                    </div>

                </div>
            </div>
        </div> ';
        }
    }
    echo '</div> </div> </div>';
}
include 'footer.php';
?>


