<h1 class="text-center mt-4">Profil</h1>
<div class="container-fluid">

<?php
// Pour éviter les problèmes, il a été décidé de ne modifier qu'un seul champ à la fois
// La modification d'un profil étant rare, celà ne devrait pas trop impacter le client
?>

<div class="row">
    <div class="col"></div>
    <div class="col-5 p-3 text-center">

        <?php if(empty($_POST)){ ?>
        
        <img class="img-circle mb-4" src="img/profils/<?php print $_SESSION['pers']->getPhoto(); ?>"><br />

        <label>Nom : <?php 
        print $_SESSION['pers']->getNom(); ?>
        </label>
        <!-- Bouton pour afficher le formulaire de modification de CET élément -->
        <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('nom');">Modifer</button>
        <br /><br />
        <form id="profilFormNom" class="hide mb-4" method="post" action="index.php?page=3">
            <!-- Formulaire pour modifier le nom -->
            <label>Nouveau nom : </label>
            <input name="nom" type="text">

            <input class="btn btn-primary btn-sm" type="submit" value="OK">
            <button onclick="modifierProfilCacherChamp('nom');" class="btn btn-danger btn-sm" type="button">X</button>
        </form>

        <label>Prénom : <?php 
        print $_SESSION['pers']->getPrenom(); ?>
        </label>
        <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('prenom');">Modifer</button>
        <br /><br />
        <form id="profilFormPrenom" class="hide mb-4" method="post" action="index.php?page=3">
            <!-- Formulaire pour modifier le prénom -->
            <label>Nouveau prénom : </label>
            <input name="prenom" type="text">

            <input class="btn btn-primary btn-sm" type="submit" value="OK">
            <button onclick="modifierProfilCacherChamp('prenom');" class="btn btn-danger btn-sm" type="button">X</button>
        </form>

        <label>Département : <?php
        $dptMgr = new DepartementManager($pdo);
        $dpt = $dptMgr->getDepartement($_SESSION['pers']->getIdDepartement());
        $dpts = $dptMgr->getAllDepartments();
        print $dpt->getNom(); ?>
        </label>
        <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('departement');">Modifer</button>
        <br /><br />
        <form id="profilFormDepartement" class="hide mb-4" method="post" action="index.php?page=3">
            <!-- Formulaire pour modifier le département -->
            <label>Nouveau département : </label>
            <select required id="departement" name="departement" class="custom-select w-50">
                <option selected disabled>Choisissez votre département</option>
                <?php
                foreach ($dpts as $key => $value) { ?>

                <option value="<?php echo $value->getIdDepartement(); ?>"><?php echo $value->getNom(); ?></option>
                
                <?php } ?>
            </select>

            <input class="btn btn-primary btn-sm" type="submit" value="OK">
            <button onclick="modifierProfilCacherChamp('departement');" class="btn btn-danger btn-sm" type="button">X</button>
        </form>

        <label>Mail : <?php 
        print $_SESSION['pers']->getMail(); ?>
        </label>
        <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('mail');">Modifer</button>
        <br /><br />
        <form id="profilFormMail" class="hide mb-4" method="post" action="index.php?page=3">
            <!-- Formulaire pour modifier le prénom -->
            <label>Nouvelle adresse mail : </label>
            <input name="mail" type="mail">

            <input class="btn btn-primary btn-sm" type="submit" value="OK">
            <button onclick="modifierProfilCacherChamp('mail');" class="btn btn-danger btn-sm" type="button">X</button>
        </form>

        <label>Mot de passe :
        *******
        </label>
        <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('mdp');">Modifer</button>
        <br /><br />
        <form id="profilFormMDP" class="hide mb-4" method="post" action="index.php?page=3">
            <!-- Formulaire pour modifier le prénom -->
            <label>Nouvelle adresse mail : </label>
            <input name="password" type="password">

            <input class="btn btn-primary btn-sm" type="submit" value="OK">
            <button onclick="modifierProfilCacherChamp('mdp');" class="btn btn-danger btn-sm" type="button">X</button>
        </form>

        <?php } else { 
            $persMgr = new PersonneManager($pdo);
            $dptMgr = new DepartementManager($pdo);
            $pers = $_SESSION['pers']; // Passage par référence, donc la modification est faite aussi en session
            ?>

            <?php 
            if (isset($_POST['nom'])) {
                $pers->setNom($_POST['nom']);
            }

            if (isset($_POST['prenom'])) {
                $pers->setPrenom($_POST['prenom']);
            }

            if (isset($_POST['departement'])) {
                $pers->setIDDepartement($_POST['departement']);
            }

            if (isset($_POST['mail'])) {
                $pers->setMail($_POST['mail']);
            }

            $persMgr->update($pers);
            ?>


        <?php } ?>
    </div>
    <div class="col"></div>
</div>