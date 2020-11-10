<h1 class="text-center mt-4">Recherche</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col"></div>

        <div class="col-9 p-3 ">

            <form class="form-group" method="POST" action="index.php?page=2">
                <div class="form-group">
                    <label for="sport">Sport</label>
                    <?php
                    $sprsMgr = new SportManager($pdo);
                    $sprs = $sprsMgr->getAllSports($pdo);
                    ?>
                    <select id="sport" class="custom-select" name ="sport">

                        <option selected disabled >Choisissez votre sport</option>
                        <option value="">Tous</option>
                        <?php
                        foreach ($sprs as $key => $value) { ?>

                            <option value="<?php echo $value->getIdSport(); ?>"<?php

                            if (!empty($_POST) && isset($_POST['sport']) && $_POST['sport'] == $value->getIdSport()) {
                                print " selected";
                            }

                            ?>><?php echo $value->getNom(); ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="niveau">Niveau</label>
                    <select id="niveau" class="custom-select" name = "niveau">
                    <option selected disabled>Choisissez votre niveau</option>
                        <option value="">Tous</option>
                        <option value="1">Débutant</option>
                        <option value="2">Intermédiaire</option>
                        <option value="3">Confirmé</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="departement">Departement</label>
                    <?php
                    $dptMgr = new DepartementManager($pdo);
                    $dpts = $dptMgr->getAllDepartments($pdo);
                    ?>
                    <select id="departement" class="custom-select" name = "departement">

                        <option selected disabled>Choisissez votre département</option>
                        <option value="">Tous</option>
                        <?php
                        foreach ($dpts as $key => $value) { ?>

                            <option value="<?php echo $value->getIdDepartement(); ?>"<?php

                            if (!empty($_POST) && isset($_POST['departement']) && $_POST['departement'] == $value->getIdDepartement()) {
                                print " selected";
                            }

                            ?>><?php echo $value->getNom(); ?></option>

                        <?php } ?>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit">Rechercher</button>
                <input class="btn btn-warning" type="reset">
            </form>
            <?php if (!empty($_POST)) {
                if (!isset($_POST["sport"])) {
                    $_POST["sport"] = null;
                }
                if (!isset($_POST["niveau"])) {
                    $_POST["niveau"] = null;
                }
                if (!isset($_POST["departement"])) {
                    $_POST["departement"] = null;
                }
                $prsnMngr = new PersonneManager($pdo);
                $recherche = $prsnMngr->recherche($_POST["sport"], $_POST["niveau"], $_POST["departement"]);


                if ($recherche == false) {
                    ?>
                    <p>Personne ne correspond à votre recherche...</p>
                    <?php
                } else {
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
                    foreach ($recherche as $personne) {
                        ?>
                    <tr>
                        <td><?php echo $personne->getPrenom();?></td>
                        <td><?php echo $personne->getNom();?></td>
                        <td>
                            <form method="post" action="index.php?page=4">
                                <button name="id" value="<?php print $personne->getidPersonne(); ?>" class="btn btn-light">Profil</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    </table>
                    <?php
                }

                ?>
                <?php
            }

            ?>


        </div>
        <div class="col"></div>
    </div>
</div>
</div>

