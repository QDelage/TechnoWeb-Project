<h1 class="text-center mt-4">Matchs</h1>
<div class="container-fluid">


<div class="row">
    <div class="col"></div>
    <div class="col-8 p-3 text-center">

        <h2>Les personnes qui ont likées votre profil sont :</h2>
        <?php 
        $pmMgr = new PersonnesMatchManager($pdo);
        $pMgr = new PersonneManager($pdo);
        $matchs = $pmMgr->getMatchsEnAttente($_SESSION['pers']->getidPersonne());
        if ($matchs) {
        ?>

        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php
        
            foreach ($matchs as $key => $value) { 
                $personne = $pMgr->getPersonne($value->getIdPersonne1());
                ?>
                <tr>
                        <td><?php echo htmlspecialchars($personne->getPrenom(),  ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?php echo htmlspecialchars($personne->getNom(),  ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <form method="post" action="index.php?page=4">
                            <button name="id" value="<?php print $personne->getidPersonne(); ?>" class="btn btn-light">Profil</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        </table>
        <?php 
        }else {
            print '<p>Personne n\'a liké votre profil... Pour le moment !</p>';
        } ?>
    </div>
    <div class="col"></div>
</div>