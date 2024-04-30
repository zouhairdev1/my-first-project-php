<?php
include 'header.php';
if (!isset($_SESSION['connect'])) {
        
    header('location:Accueil.php');
 
}
?>

<div class="myinfo">
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Mon profile
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <img class="profile-navbar-img me-4" id="card_profil" src="./imageProfile/<?php echo $_SESSION['image']; ?>" alt="Profile Image" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
                        <div class="inf">
                            <div class="row nom d-flex">
                                <div class="col-4">nom:</div>
                                <div class="col-8"><?php echo $_SESSION['nom']; ?></div>
                            </div>
                            <div class="row prenom d-flex">
                                <div class="col-4">prenom:</div>
                                <div class="col-8"><?php echo $_SESSION['prenom']; ?></div>
                            </div>
                            <div class="row email d-flex ">
                                <div class="col-4">email:</div>
                                <div class="col-8"><?php echo $_SESSION['email']; ?></div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Modifier profile
                    </div>
                    <div class="card-body">
                        <form action="modifierProfil.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prenom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $_SESSION['prenom']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $_SESSION['nom']; ?>">
                                <div class="invalid-feedback">
                                    Please provide a valid zip.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="formFileLg" class="form-label">choisi image votre profile</label>
                                <input class="form-control" id="formFileLg" type="file" name="photo">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Confirmer</button>
                            </div>
                    </div>
                    </form>


                </div>
            </div>
        </div>




        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Neauvelle Image Votre Profile</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="modifierProfil.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">choisi image votre profile</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file" name="photo">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary">Confirmer</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    

   <?php include 'footer.php'; ?>