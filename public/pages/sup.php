<?php
    require 'public/functions/bdd.php';
    require 'public/class/class.php';
?>

<?php
    $login = $_SESSION['id_user'];
    $id=$_GET['id'];
    $userManager = new UserManager($bdd);
    $myUser=$userManager->get($id);
?>
    <div class="container-fluid bg-light">
<?php
        if($login==$id)
        {
?>    
            <div class="row bg-info">
                <h3 class="col-12">Voulez-vous VOUS supprimer?<h3>
            </div>
            <div class="row">
                <a href="../../index.php?action=suppr&rep=oui&id=<?php echo $_GET["id"] ?>" class="col-6">oui</a> 
                <a href="../index.php?action=suppr&rep=non&id=<?php echo $_GET["id"] ?>" class="col-6">non</a>
            </div>
<?php
            if(isset($_GET["rep"])){
                switch($_GET["rep"]){
                    case "oui":
                        $userManager->delete($myUser);
                        header('Location: ../public/pages/deconnexion.php');
                    break;
                    case "non":
                        header('Location: ../index.php?action=listUser');
                    break;
                }
            }
        }else{
?>
            <div class="row">
                <h3 class="col-12">Voulez vous supprimer l'utilisateur <?php echo $myUser->nom_utilisateur()." - ".$myUser->prenom_utilisateur(); ?>?<h3> 
            </div>
            <div class="row">
                <a href="http://localhost/mvc/index.php?action=suppr&rep=oui&id=<?php echo $_GET["id"] ?>" class="col-6">oui</a> 
                <a href="http://localhost/mvc/index.php?action=suppr&rep=non&id=<?php echo $_GET["id"] ?>" class="col-6">non</a>
            </div>
<?php
            if(isset($_GET["rep"])){
                switch($_GET["rep"]){
                    case "oui":
                        $userManager->delete($myUser);
                        header('Location: http://localhost/mvc/index.php?action=listUser');
                    break;
                    case "non":
                        header('Location: http://localhost/mvc/index.php?action=listUser');
                    break;
                }
            }
        }    
?>
</div>