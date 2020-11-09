<h1 class="text-center mt-4">Profil</h1>
<div class="container-fluid">

<div class="row">
    <div class="col"></div>
    <div class="col-5 p-3 text-center">
        
        <img class="img-circle mb-4" src="img/profils/default.png"><br />

        <label>Nom : <?php 
        print $_SESSION['pers']->getNom(); ?>
        </label><br /><br />

        <label>Prénom : <?php 
        print $_SESSION['pers']->getPrenom(); ?>
        </label><br /><br />

        <label>Département : <?php
        $dptMgr = new DepartementManager($pdo);
        $dpt = $dptMgr->getDepartement($_SESSION['pers']->getIdDepartement());
        print $dpt->getNom(); ?>
        </label><br /><br />

        <label>Mail : <?php 
        print $_SESSION['pers']->getMail(); ?>
        </label><br /><br />

        <label>Mot de passe :
        *******
        </label><br /><br />

    </div>
    <div class="col"></div>
</div>