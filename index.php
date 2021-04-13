<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliotèque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="public/css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark py-5 mb-5">
        <div class="container-fluid">
            <a href="index.php" class="navbar-brand">
                <i class="fas fa-home">Accueil</i>
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
            
            <?php
				if(!isset($_SESSION['mail_utilisateur'])){
                            echo '
                            <ul class="navbar-nav">
                                <li class=nav-link>
                                    <a href="public/pages/signin.php" class="nav-link text-white">S\'idendifier</a>
                                </li>
                                <li class=nav-link>
                                    <a href="public/pages/register.php" class="nav-link text-white">S\'enregistrer</a>
                                </li>
                                
                                
                            </ul>
                        ';
                }else{
                        echo '  <ul class="navbar-nav">
                                    <li class=nav-link>
                                        <a href="index.php?action=listUser">Afficher les utlisateurs</a>
                                    </li>
                                    <li class=nav-link>
                                    <a href="index.php?action=listAuteur">Liste des Auteurs</a>
                                    </li>
                                    <li class=nav-link>
                                    <a href="public/pages/logout.php">Déconnexion</a>
                                    </li>
                                    
                                    
                                </ul>
                        ';
                }

?>
</div>
</div>
        </nav> 



<section class='container-fluid text-center my-5'>
<?php
    require 'controller/controller.auteur.php';
    if(isset($_GET['action'])){
        $action=$_GET['action'];
        switch ($action){
            case 'signin':
                include("public/pages/signin.php");
            break;
            case 'listAuteur':
                listAuthors();
            break;
            case 'auteur':{
                if(isset($_GET['id'])){
                    author();
                }else{
                    echo 'pas d\'identifiant selectionné';
                }
            break;
            }
            case 'listUser':
                include("public/pages/users.php");
            break;
            case 'formModif':
                include("public/pages/formModif.php");
            break;
            case 'registrer':
                include("public/pages/register.php");
            break;
            case 'suppr':
                include("public/pages/sup.php");
            break;
            case 'formEmail':
                include("public/pages/formEmail.php");
            break;
            default:
                echo'Error';
            break;
        }
    }else{
        if(isset($_SESSION['id_user'])){
            echo '  
                <div class="row">
                    <h3 class="col-12">
                        Vous pouvez maintenant accéder à la liste des auteurs
                        <br>
                        Bonne lecture !
                    </h3>
                </div>
            ';
        }else{
            echo '  
                    <div class="row">
                        <h2 class="col-12 mb-5 text-danger">
                            Bienvenue à la bibliotèque virtuelle
                        </h2>
                        <h3 class="mt-5">
                            Vous devez vous connecter pour accéder à notre site <br> ou <br> vous enregistrer
                        </h3>
                    </div>
                ';
        }
    }
?>  
    </section>      



    <footer class=" text-center text-lg-start mt-5">
    <div class="container p-4">
        <hr>
        <div class="row">
            <div class="col-lg-5 col-md-12 mb-4 mb-md-0">
                <h5 class="font text-uppercase">A propos de</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis cumque distinctio pariatur repellat a necessitatibus itaque ad beatae ducimus ab reprehenderit libero molestias, tempore earum molestiae? Impedit ab esse inventore? 
                </p>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="font text-uppercase">Liens</h5>
                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#" class="text-dark">Biblioteque.fr</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Facebook/Biblioteque.fr</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Twitter/Biblioteque.fr</a>
                    </li>
                    <li>
                        <a href="#" class="text-dark">Biblioteque.fr</a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                <h5 class="font text-uppercase mb-3">Contact</h5>
                
                <div class="form-floating mb-1">
                    <input type="pseudo" class="form-control" id="floatingInput" placeholder="Pseudo">
                    <label for="floatingInput">Pseudo</label>
                </div>

                <div class="form-floating mb-1">
                    <input type="mail" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Adresse mail</label>
                </div>

                <div class="form-floating mb-1">
                    <textarea class="form-control" placeholder="Laisser un message" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Message</label>
                </div>

                <a href='index.php' class=' font btn btn-outline-secondary col-sm-12'>Envoyer</a>
                
            </div>

        </div>

    </div>

  <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
        <a class="text-dark" href="index.html">Biblioteque.fr |</a>
        <a class="text-dark" href="GC.php">Gestion des cookies |</a>
        <a class="text-dark" href="ML.php">Mentions légales |</a>
        <a class="text-dark" href="DP.php">Données personnelles |</a>
        <a class="text-dark" href="CGU.php">Condition Générale d'Utilisation</a>
    </div>
</footer>

    <script src="https://kit.fontawesome.com/83f4286022.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> 
</body>
</html>    