<?php
session_start();
    require '../functions/bdd.php';
    require '../class/class.php';

    $userManager = new UserManager($bdd);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Bibliothèque</title>
</head>
<body>
    
<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="../../index.php">Accueil</a>
  </div>
</nav>


<section class='container-fluid text-center my-5'>
    <div class="container mb-5 pb-5"></div>
    <div class="container col-md-4 text-center mt-5 pt-5">
        <div class="row">
            <form class="box" action="" method="post" name="login">
                <h1 class="font box-title mb-3">Connexion</h1>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="mail" id="floatingInput" placeholder="Mail">
                    <label for="floatingInput">Mail</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Mot de passe">
                    <label for="floatingPassword">Mot de passe</label>
                </div>

                <div class="mt-3">
                    <button class="btn btn-outline-dark col-sm-12" type="submit" name="submit">Connexion</button>
                </div>

            </form>

</section>

<?php
    if(isset($_POST['submit'])&& isset($_POST['mail'])){
        $user=$userManager->login($_POST['mail']);
        if(!$user){
            echo '<h3 class="text-danger text-center">L\'adresse e-mail n\'est pas reconnue</h3>';
        }else{
            if (password_verify($_POST['password'],$user->password_utilisateur())){
                $_SESSION['mail_utilisateur']=$user->mail_utilisateur();
                $_SESSION['id_user']=$user->id_user();
                header('Location: ../../index.php');
            }else{     
                    echo '<h3 class="text-danger text-center">Le mot de passe n\'est pas reconnu</h3>';
            }
        }
    }
?>

</body>
</html>