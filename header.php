<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">

    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/index.css">
    <title>My blog</title>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary ">
        <div class="container">
            <a class="navbar-brand " href="Accueil.php">Mon Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Accueil.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="articles.php">Articles</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link ">À propos</a>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION['connect'])) {
                        if ($_SESSION['connect'] == 'ok') {
                            echo '
                            
                        
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Auteur
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="formModifierProfil.php">profile</a></li>
                            <li><a class="dropdown-item" href="admin.php">Mon Article</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="Accueil.php?deconnecter=deconnecter">déconnecte</a></li>
                        </ul>
                    </li>
                    ';
                            if (isset($_GET["deconnecter"]) == "deconnecter") {
                                session_destroy();
                                header('location:Accueil.php');
                            }
                        }
                    }


                    ?>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success me-2" type="submit">Search</button>
                </form><?php
                        if (isset($_SESSION['connect'])) {
                            if ($_SESSION['connect'] == 'ok') {
                                echo '  <img class="profile-navbar-img me-2" id="card_profil" src="./imageProfile/' . $_SESSION['image'] . '" alt="Profile Image">';
                            }
                        } else {
                            echo '<div class="login">
        <a href="formDeInscription.php" class="Sign_up btn"> Sign up </a>
        <a href="formLogin.php" class="Sign_in btn">Sign in</a>
      </div>
    </div>';
                        }
                        ?>
            </div>
        </div>

    </nav>
    <?php
    if (isset($_SESSION['connect'])) {
        if ($_SESSION['connect'] == 'ok') {
            if (isset($_SESSION["prenom"]) and isset($_SESSION["nom"])) {
                $prenom = $_SESSION["prenom"];
                $nom = $_SESSION["nom"];
            } else {
                echo "profil";
            }
            echo '
    <div class="card-profil" style="display: none;" id="card_block">
        <img class="profile-img" src="./imageProfile/' . $_SESSION['image'] . '" alt="Profile Image">
        <h2 class="name">' . $prenom . ' ' . $nom . '</h2>
        <p class="job-title"><a href="formModifierProfil.php">Voir Profile </a> </p>
        <div class="contact-info">
            <a href="formDeInscription.php">creer compte</a>
            <a href="Accueil.php?deconnecter=deconnecter">déconnecter</a>
        </div>
    </div>';
        }
    }
    ?>