<?php
    require 'public/functions/bdd.php';
    require 'public/class/class.php';
    $userManager = new UserManager($bdd); 
?>

<div class="corps">
    <h2 class="mb-5">Gestion utilisateurs</h2>
    <?php
        $users=$userManager->getAll();
    ?>
    <table class="table table-hover">
        <thead>
            <th>Identifiant</th>
            <th>avatar</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Mail</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </thead>
        <tbody>
            <?php
                foreach ($users as $value){
                    echo '
                        <tr>
                            <td>'.$value->id_user().'</td>
                            <td><img src="public/images/upload/'.$value->avatar().'" alt="avatar" class="avatar"></td>
                            <td>'.$value->nom_utilisateur().'
                            <td>'.$value->prenom_utilisateur().'</td>
                            <td>'.$value->mail_utilisateur().'</td>
                            <td>
                                <a href="index.php?action=formModif&id='.$value->id_user().'">
                                    <button class="btn btn-success">Modifier</button>
                                </a>
                            </td>
                            <td>
                                <a href="index.php?action=suppr&id='.$value->id_user().'">
                                <button class="btn btn-danger">Supprimer</button>
                               </a>
                            </td>
                        </tr>
                    ';
                }
            ?>
        </tbody>
    </table>
</div>
<?php

if(isset($_GET['message'])){
    echo '<div class="corps">';
    switch(isset($_GET['message'])){
        case '1':
            echo '<p>La modification a bien été prise en compte</p>';
        break;
        case '2':
            echo '<p>La modification n`\'a pas été prise en compte</p>';
        break;
        case '2':
            echo '<p>Une erreur est survenu lors du chargement</p>';
        break;
        case '2':
            echo '<p>Seul les types indiqué sont autorisés</p>';
        break;
        case '5':
            echo '<p>Choisissez une image</p>';
        break;
    }
    echo '</div>';
}