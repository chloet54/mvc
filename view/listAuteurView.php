<table class="table table-hover">
    <thead>
        <tr>
            <th>Identifiant</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Identifiant PAYS</th>
            <th>En savoir plus</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($authors as $value){
                echo '
                    <tr>
                        <td> '.$value->id_a().'</td>
                        <td> '.$value->nom_a().'</td>
                        <td> '.$value->prenom_a().'</td>
                        <td> '.$value->date_naissance_a().'</td>
                        <td> '.$value->id_p().'</td>
                        <td> <button type="button" class="btn btn-info"><a class="text-white" href="index.php?action=auteur&id='.$value->id_a().'">En savoir plus</a></button> </td>
                        
                        
                    </tr>
                ';
            }

        ?>
    </tbody>
</table>