<!-- Page d'accueil -->
<h1 class="text-center mt-4">Inscription</h1>
<div class="container-fluid">

<div class="row">
    <div class="col"></div>
    <div class="col-8 p-3 ">


    <!-- Formulaire d'inscription -->
    <form class="form-group">
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" class="form-control" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" class="form-control" placeholder="Prénom">
        </div>

        <div class="form-group">
            <label for="email">Adresse email</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailInfo" placeholder="Entrez votre mail">
            <small id="emailInfo" class="form-text text-muted">Nous ne partagerons jamais votre adresse avec des tiers.</small>
        </div>
        <div class="form-group">
            <label for="departement">Département</label>
            <?php
            $dptMgr = new DepartementManager($pdo);
            $dpts = $dptMgr->getAllDepartments($pdo);
            ?>
            <select id="departement" class="custom-select">
                <option selected disabled>Choisissez votre département</option>
                <?php
                foreach ($dpts as $key => $value) { ?>

                <option value="<?php echo $value->getIdDepartement(); ?>"><?php echo $value->getNom(); ?></option>
                
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="sports">Sport</label>
            <select id="sports" class="custom-select">
                <option selected disabled>Choisissez votre sport</option>
                <option value="1">Ain</option>
                <option value="2">Aisne</option>
                <option value="3">Allier</option>
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


        <button class="btn btn-primary" type="submit">S'inscrire</button>

        </form>


    </div>

    
    <div class="col"></div>
</div>

</div>
