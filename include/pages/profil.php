<h1 class="text-center mt-4">Profil</h1>
<div class="container-fluid">

<?php
// Pour éviter les problèmes, il a été décidé de ne modifier qu'un seul champ à la fois
// La modification d'un profil étant rare, celà ne devrait pas trop impacter le client
?>

<div class="row">
    <div class="col"></div>
    <div class="col-8 p-3 text-center">

        <?php 
        if (empty($_POST['id'])) {
            print '<h2>Erreur 403 : Accès interdit</h2>';
            print '<p>Le lien que vous avez suivi doit être corrompu, ou le profil recherché n\'existe pas / plus.</p>';
            print '<p>Redirection vers l\'accueil en cours...</p>';
            header('refresh:2;url=index.php');
        } else {
            $prsnMngr = new PersonneManager($pdo);
            $personne = $prsnMngr->getPersonne($_POST['id']); ?>


        <img id="ImgProfil" class="img-circle mb-4 d-none d-sm-inline" src="img/profils/<?php print $personne->getPhoto(); ?>"><br />
        <img id="ImgProfilSmall" class="img-circle mb-4 d-sm-none" src="img/profils/<?php print $personne->getPhoto(); ?>"><br />



        <label>Nom : <?php 
        print $personne->getNom(); ?>
        </label>
        <br /><br />


        <label>Prénom : <?php 
        print $personne->getPrenom(); ?>
        </label>
        <br /><br />


        <label>Département : <?php
        $dptMgr = new DepartementManager($pdo);
        $dpt = $dptMgr->getDepartement($personne->getIdDepartement());
        $dpts = $dptMgr->getAllDepartments();
        print $dpt->getNom(); ?>
        </label>
        <br /><br />

        <?php }
        ?>
    </div>
    <div class="col"></div>
</div>