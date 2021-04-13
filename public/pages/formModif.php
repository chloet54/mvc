<?php
    require 'public/functions/bdd.php';
    require 'public/class/class.php';

    $id=$_GET['id'];
    $userManager = new UserManager($bdd);
    $myUser=$userManager->get($id);
?>
<?php
    if(isset($_GET["err"])){
?>
        <section class="container-fluid bg-danger my-3">
            <div class="row">    
<?php
                switch($_GET["err"]){
                    case "1":
                        echo "<h3 class='col-12 text-center'>Les mots de passe ne correspondent pas</h3>";
                    break;

                    case "2":
                        echo "<h3 class='col-12 text-center'>Erreur de mot de passe</h3>";
                    break;

                    case "3":
                        echo "<h3 class='col-12 text-center'>Veuillez saisir tous les champs \"mot de passe\"</h3>";
                    break;

                    case "4":
                        echo "<h3 class='col-12 text-center'>Veuillez indiquer votre adresse e-mail</h3>";
                    break;

                    case "5":
                        echo "<h3 class='col-12 text-center'>Veuillez indiquer votre prénom</h3>";
                    break;

                    case "6":
                        echo "<h3 class='col-12 text-center'>Veuillez indiquer votre nom</h3>";
                    break;
                }
?>
            </div>
        </section>
<?php
    }
?>

<div class="container col-8">
    <div class="row">
        <h2 class="text-center">Modification</h2>
    </div>

<fieldset>
    <form action="public/functions/modif.php?id=<?php echo $id; ?>" method="post" class="row g-2">
        <div class="col-12 my-2">
            <input class="form-control" type="hidden" value="<?php echo $myUser->id_user(); ?>">
        </div>

        <div class="form-floating mb-3">
            <input id="nom" name="nom" id="nom" type="text" value="<?php echo $myUser->nom_utilisateur(); ?>" class="form-control" id="floatingInput">
            <label for="floatingInput">Nom:</label>
        </div>

        <div class="form-floating mb-3">
            <input id="prenom" name="prenom" type="text" value="<?php echo $myUser->prenom_utilisateur(); ?>" class="form-control" id="floatingInput">
            <label for="floatingInput">Prénom:</label>
        </div>

        <div class="form-floating mb-3">
            <input id="mail" name="mail" type="text" value="<?php echo $myUser->mail_utilisateur(); ?>" class="form-control" id="floatingInput">
            <label for="floatingInput">Adresse mail:</label>
        </div>

        <div class="form-floating mb-3">
            <input id="date" name="date" type="text" value="<?php echo $myUser->date_naissance_utilisateur(); ?>" class="form-control" id="floatingInput">
            <label for="floatingInput">Date de naissance:</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="oldPassword" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Entrez votre mot de passe actuel</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Nouveau mot de passe</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="verifPassword" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Nouveau mot de passe</label>
        </div>

        <div>
            <button type="submit" name="submit" class="btn btn-success col-lg-12">Envoyer</button>
        </div>
    </form>
</fieldset>
    
    



<fieldset>
    <form action="public/functions/modifAvatar.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <div class="input-group my-5">
            <input type="file" name='img' id="img" class="form-control">
        </div>
        <div  class="col-lg-12 m-2">
            <button type="submit" name="submitAvatar" class="btn btn-success">Enregistrer</button>
        </div>
    </form>

</fieldset>

</div>