<br>
<table class="table table-hover">
    <tr>
        <th>Nom:</th>
        <th>Prénom:</th>
        <th>Date de naissance:</th>
        <th>Identifiant pays:</th>
    </tr>
    <tr>
        <td><?php echo $author->nom_a(); ?></td>
        <td><?php echo $author->prenom_a(); ?></td>
        <td><?php echo $author->date_naissance_a(); ?></td>
        <td><?php echo $author->id_p(); ?></td>
    </tr>
</table>