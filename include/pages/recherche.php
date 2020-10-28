<h1 class="text-center mt-4">Recherche</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col"></div>

        <div class="col-9 p-3 ">

            <form class="form-group">
                <div class="form-group">
                    <label for="sport">Sport</label>
                    <?php
                    $sprsMgr = new SportManager($pdo);
                    $sprs = $sprsMgr->getAllSports($pdo);
                    ?>
                    <select id="sport" class="custom-select">

                        <option selected disabled>Choisissez votre sport</option>
                        <?php
                        foreach ($sprs as $key => $value) { ?>

                            <option value="<?php echo $value->getIdSport(); ?>"><?php echo $value->getNom(); ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="niveau">Niveau</label>
                    <select id="niveau" class="custom-select">
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
                    <select id="departement" class="custom-select">
                        <?php
                        foreach ($dpts as $key => $value) { ?>

                            <option value="<?php echo $value->getIdDepartement(); ?>"><?php echo $value->getNom(); ?></option>

                        <?php } ?>
                    </select>
                </div>
        </div>
        <div class="col"></div>
    </div>
</div>
</div>
</form>