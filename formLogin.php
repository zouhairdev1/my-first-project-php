<?php
session_start();
if (isset($_SESSION['connect'])) {
    if ($_SESSION['connect'] == 'ok') {
        header('location:Accueil.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/form.css">
    <title>Document</title>
</head>

<body>
    <form action="login.php" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.

            </div>
        </div>
        <div class="mb-3">
            <label for="motDePasse" class="form-label">mot de passe</label>
            <input type="password" class="form-control" id="motDePasse" name="motDePasse">
        </div>
        <div><a href="formDeInscription.php">S'inscrire</a> <?php
                                                            if (isset($_GET['message'])) {
                                                                echo $_GET['message'];
                                                            }
                                                            ?></div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>