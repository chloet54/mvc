<?php
    require '../functions/bdd.php';
    require '../class/class.php';

    $userManager = new UserManager($bdd);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>
    


<nav class="navbar navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="../../index.php">Accueil</a>
  </div>
</nav>

    <div class="container col-md-4 text-center pt-5">
        <div class="row">
            <form class="box" action="" method="post">
                <h2 class="font box-title pb-3">S'inscrire</h2>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Nom utilisateur" required>
                    <label for="floatingInput">Nom:</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="surname" id="floatingInput" placeholder="Prénom utilisateur" required>
                    <label for="floatingInput">Prénom:</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="mail" class="form-control" name="mail" id="floatingInput" placeholder="name@example.com" required>
                    <label for="floatingInput">Adresse mail:</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" name="date" id="floatingInput" placeholder="Prénom utilisateur" required>
                    <label for="floatingInput">Date d'anniversaire:</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Mot de passe" required>
                    <label for="floatingPassword">Mot de passe</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" name="verifPassword" id="floatingPassword" placeholder="Vérification du mot de passe" required>
                    <label for="floatingPassword">Vérification du mot de passe</label>
                </div>

                <button class="btn btn-outline-dark col-sm-12 mt-3" type="submit" name="submit">S'inscrire</button>

            </form>
  
        </div>
    </div>

    <?php
        if(isset($_POST['submit'])){
            if($_POST['password']!=''){
                if(($_POST['password']==$_POST['verifPassword'])){
                    $post=  [   'nom_utilisateur'=>$_POST['name'],
                                'prenom_utilisateur'=>$_POST['surname'],
                                'mail_utilisateur'=>$_POST['mail'],
                                'avatar_utilisateur'=>NULL,
                                'date_naissance_utilisateur'=>$_POST['date'],
                                'password_utilisateur'=>password_hash($_POST['password'],PASSWORD_BCRYPT)
                            ];
                    $user=new User();
                    $user->hydrate($post);
            
                    $userManager->add($user);
                    $_SESSION['mail_utilisateur']=$user->mail_utilisateur();
                    $_SESSION['id_user']=$user->id_user();
                    header("Location: logout.php");
                }else{
                    echo '<h2>Les mot de passe ne correspondent pas</h2>';
                }
            }else{
                echo '<h2>Créez un nouveau compte</h2>';
            }
        }
    ?>

</body>
</html>