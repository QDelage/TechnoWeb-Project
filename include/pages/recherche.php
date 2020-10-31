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
                        <?php
                        foreach ($sprs as $key => $value) { ?>

                            <option value="<?php echo $value->getIdSport(); ?>"><?php echo $value->getNom(); ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="niveau">Niveau</label>
                    <select id="niveau" class="custom-select" name = "niveau">
                        <option selected disabled>Choisissez votre niveau</option>
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
                        <?php
                        foreach ($dpts as $key => $value) { ?>

                            <option value="<?php echo $value->getIdDepartement(); ?>"><?php echo $value->getNom(); ?></option>

                        <?php } ?>
                    </select>
                </div>

                <button class="btn btn-primary" type="submit">Rechercher</button>
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
                    <p>Personne ne correspond à votre recherche</p>
                    <?php
                } else {
                    foreach ($recherche as $personne) {
                        ?>
                        <p><?php echo $personne->getNom() . " " . $personne->getPrenom() ?></p>
                        <?php
                    }
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

