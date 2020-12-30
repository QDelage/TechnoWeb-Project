<!-- Page d'accueil -->
<h1 class="text-center mt-4">Inscription</h1>
<div class="container-fluid">

<div class="row">
    <div class="col"></div>
    <div class="col-8 p-3 ">

    <?php if (empty($_POST)) { ?>
    <!-- Formulaire d'inscription -->
    <form class="form-group" method="POST" action="index.php?page=1">
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" required>
        </div>
        <div class="form-group">
            <label for="description">Decription</label>
            <textarea required id="Description" name="description" class="form-control" placeholder="Description de votre profil"></textarea>
        </div>
        <div class="form-group">
            <label for="motdepasse">Mot de passe</label>
            <input type="password" id="motdepasse" name="motdepasse" class="form-control" placeholder="Mot De Passe" required>
        </div>
        <div class="form-group">
            <label for="email">Adresse email</label>
            <input type="email" name="mail" class="form-control" id="email" aria-describedby="emailInfo" placeholder="Entrez votre mail" required>
            <small id="emailInfo" class="form-text text-muted">Nous ne partagerons jamais votre adresse avec des tiers.</small>
        </div>
        <div class="form-group">
            <label for="departement">Département</label>
            <?php
            $dptMgr = new DepartementManager($pdo);
            $dpts = $dptMgr->getAllDepartments();
            ?>
            <select required id="departement" name="departement" class="custom-select">
                <option selected disabled>Choisissez votre département</option>
                <?php
                foreach ($dpts as $key => $value) { ?>

                <option value="<?php echo $value->getIdDepartement(); ?>"><?php echo $value->getNom(); ?></option>
                
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="sport">Sport</label>
            <?php
            $sprsMgr = new SportManager($pdo);
            $sprs = $sprsMgr->getAllSports($pdo);
            ?>
            <select id="sport" class="custom-select" required name="sport">

                <option selected disabled>Choisissez votre sport</option>
                <?php
                foreach ($sprs as $key => $value) { ?>

                    <option value="<?php echo $value->getIdSport(); ?>"><?php echo $value->getNom(); ?></option>

                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="niveau">Niveau</label>
            <select required id="niveau" name="niveau" class="custom-select">
                <option selected disabled>Choisissez votre niveau</option>
                <option value="1">Débutant</option>
                <option value="2">Intermédiaire</option>
                <option value="3">Confirmé</option>
            </select>
        </div>


        <button class="btn btn-primary" type="submit">S'inscrire</button>

        </form>

        <?php } else {
            $valuesPersonne = array(
                "NOM" => $_POST["nom"],
                "PRENOM" => $_POST["prenom"],
                "ID_DEPARTEMENT" => $_POST["departement"],
                "MAIL" => $_POST["mail"],
                "MDPHASH" => $_POST["motdepasse"],
                "DESCRIPTION" =>$_POST["description"]
            );
            $pers = new Personne($valuesPersonne);
            $persInsert = new PersonneManager($pdo);
            $id = $persInsert->inscription($pers);
            $valuesPratique = array(
                    "ID_PERSONNE" =>$id,
                    "ID_SPORT"=> $_POST["sport"],
                    "NIVEAU"=> $_POST['niveau']
            );
            $pratique = new Pratique($valuesPratique);
            $pratiqueInsert = new PratiqueManager($pdo);
            $pratiqueInsert->ajout($pratique);

        ?>

        <h2>Inscription réussie</h2>

        <?php } ?>


    </div>

    
    <div class="col"></div>
</div>

</div>
