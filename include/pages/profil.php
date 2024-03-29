<h1 class="text-center mt-4">Profil</h1>
<div class="container-fluid">

    <?php
    // Pour éviter les problèmes, il a été décidé de ne modifier qu'un seul champ à la fois
    // La modification d'un profil étant rare, celà ne devrait pas trop impacter le client
    if (isset($_SESSION["buffid"])) {
        $_POST["id"] = $_SESSION["buffid"];
        unset($_SESSION["buffid"]);
    }
    ?>

    <div class="row">
        <div class="col"></div>
        <div class="col-8 p-3 text-center">

            <?php
            $pmMgr = new PersonnesMatchManager($pdo);
            $match = $pmMgr->getMatchEntre($_SESSION['pers']->getidPersonne(), $_POST['id']);
            ?>

            <?php
            if (empty($_POST['id']) && empty($_POST['like'])) {
                print '<h2>Erreur 403 : Accès interdit</h2>';
                print '<p>Le lien que vous avez suivi doit être corrompu, ou le profil recherché n\'existe pas / plus.</p>';
                print '<p>Redirection vers l\'accueil en cours...</p>';
                header('refresh:2;url=index.php');
            } else {
                $prsnMngr = new PersonneManager($pdo);
                $personne = $prsnMngr->getPersonne($_POST['id']); ?>


                <img id="ImgProfil" class="img-circle mb-4 d-none d-sm-inline"
                     src="img/profils/<?php print $personne->getPhoto(); ?>"><br/>
                <img id="ImgProfilSmall" class="img-circle mb-4 d-sm-none"
                     src="img/profils/<?php print $personne->getPhoto(); ?>"><br/>


                <label>Nom : <?php
                    echo htmlspecialchars($personne->getNom(),  ENT_QUOTES, 'UTF-8')
                    ?>
                </label>
                <br/><br/>


                <label>Prénom : <?php
                    echo htmlspecialchars($personne->getPrenom(),  ENT_QUOTES, 'UTF-8');
                    ?>
                </label>
                <br/><br/>


                <label>Département : <?php
                    $dptMgr = new DepartementManager($pdo);
                    $dpt = $dptMgr->getDepartement($personne->getIdDepartement());
                    $dpts = $dptMgr->getAllDepartments();
                    echo htmlspecialchars($dpt->getNom(),  ENT_QUOTES, 'UTF-8');
                    ?>
                </label>
                <br/><br/>
                <label>Description : <?php
                    echo htmlspecialchars($personne->getDescription(),  ENT_QUOTES, 'UTF-8');
                    ?>
                </label>
                <br/><br/>
                <br/><br/>

                <?php

                if ($match) {
                    if ($match->getIdPersonne1() == $_SESSION['pers']->getidPersonne() && !$match->isReciproque()) {
                        print '<p>Vous avez déjà liké cette personne</p>';
                    } else {
                        print '<p>Vous plaisez à cette personne !</p>';
                    }

                    if ($match->isReciproque()) {
                        print '<p>Vous vous plaisez mutuellement !</p>';
                    } else if ($match->getIdPersonne1() == $_SESSION['pers']->getidPersonne()) {
                        print '<p>Vous attendez la réponse de l\'autre personne</p>';
                    }
                } else {
                    print '<p>En attente...</p>';
                    if (isset($_POST["like"])) {
                        $pmMgr->createMatchEntre($_SESSION['pers']->getidPersonne(), $_POST['id']);
                        $_SESSION["buffid"] = $_POST["id"];
                        header('refresh:;url=index.php?page=4');
                    }
                }
                ?>

                <form method="post" action="index.php?page=4" <?php
                // Si on a déjà liké cette personne (en premier, ou en second)
                if ($match != false) {
                    if (isset($match) && ($match->getIdPersonne1() == $_SESSION['pers']->getidPersonne() || $match->isReciproque())) {
                        print ' hidden ';
                    }
                }
                ?>>
                    <!-- Pour garder l'ID sur la page réactualisée -->
                    <label>Vous aimez cette personne ?</label><br/>
                    <input hidden name="id" value="<?php print $_POST['id']; ?>">

                    <button type="submit" name="like" value="<?php print $_POST['id']; ?>" class="btn btn-success">
                        Liker
                    </button>

                </form>

            <?php } ?>

        </div>
        <div class="col"></div>
    </div>