
    <?php




    include 'header.php';
    if (!isset($_SESSION['connect'])) {
      header('location:Accueil.php');
    }
    include 'connection_DB.php';
    $id = $_SESSION['id'];
    $sql = "SELECT id_article,titre,contenue,`image`,date_creation FROM article INNER JOIN user ON article.auteur=user.id_user WHERE id_user=$id ORDER BY article.date_creation DESC";
    $result = mysqli_query($connection, $sql);
    if ($result) {
      echo ' <div class="container"> 
        <div class="myarticles pt-5 pb-5">
        <h2>My Articles</h2>
        
        
        <a href="formAjouterArticle.php" class="btn btn-primary mb-4 float-end">Ajouter Article<i class="fa-solid fa-plus ms-3"></i>
        </a>  
        <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Image</th>
      <th scope="col">Titre</th>
      <th scope="col">Contenue de Article</th>
      <th scope="col">date de creation</th>
      <th scope="col">Action</th>
    </tr>
  </thead>';
      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_array($result)) {
          echo ' <tbody>
    <tr>
      <th scope="row">' . $row['id_article'] . '</th>
       <td> <img class="article-photo" src="./imageArticle/' . $row['image'] . '"/></td>
     <td>' .  mb_substr($row['titre'], 0, 20) . '...</td>
      <td>' . mb_substr($row['contenue'], 0, 50) . '...<a href="#">Lire plus</a></td>
      <td>' . $row['date_creation'] . '</td>
      <td>
      <a href="formModifierArticle.php?id_article=' . $row['id_article'] . '">
      <i class="fa-solid fa-pencil modify-icon me-3"></i>
      </a>
      <a href="article.php?id_article='.$row['id_article'].'">
      <i class="fa-solid fa-eye show-icon me-3"></i>
      </a>
      <a href="supprimerArticle.php?id_article='.$row['id_article'].'"  onclick="return confirm(\'etes vous sur que vous voulez supprimer cet article\')">
      <i class="fa-solid fa-trash-can delete-icon"></i>
      </a>
      </td>
    </tr>
    
  </tbody>';
        }
      }
      echo '</table> </div> </div>';
    }
    include 'footer.php';
    ?>


