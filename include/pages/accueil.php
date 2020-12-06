<!-- Page d'accueil -->
<h1 class="text-center mt-4">Accueil</h1>

<div class="row w-100">
    <div class="col"></div>
    <div class="col-9 p-3 ">

        <?php if (empty($_POST) && !isset($_GET['deconnexion'])) { ?>
            <!-- Liste des sports de la DB -->
            <label>Sports :</label>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sport</th>
                    <th scope="col">Pratiquant·e·s</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $prtqMngr = new PratiqueManager($pdo);
                    $sportsReputes = $prtqMngr->topSports();

                    foreach ($sportsReputes as $key => $value) { ?>
                    <tr>
                        <th scope="row"><?php echo $key + 1; ?></th>
                        <td><?php echo $value->getNomSport() ?></td>
                        <td><?php echo $value->getnbParticipant() ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php if (!isset($_SESSION['pers'])) { ?>
                <!-- Partie connexion -->
                <form class="form-group" method="post" action="index.php?page=0">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input required name="mail" type="email" class="form-control"
                               placeholder="Entrez votre adresse mail" aria-label="Mail"
                               aria-describedby="basic-addon1">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input required name="motdepasse" type="password" class="form-control"
                               id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
                    </div>

                    <button type="submit" class="btn btn-primary">Connexion</button>

                    <!-- Redirection inscription -->
                    <label class="ml-2 mr-2">
                        Pas encore inscrit ?
                        <a href="index.php?page=1" class="btn btn-sm btn-secondary">Inscription</a>
                    </label>

                </form>
            <?php } ?>

        <?php } elseif (!isset($_GET['deconnexion'])) {
            // Connexion
            $mail = $_POST['mail'];
            $pwd = $_POST['motdepasse'];
            $persMgr = new PersonneManager($pdo);

            $pers = $persMgr->connexion($mail, $pwd);

            if ($pers) {
                $_SESSION['pers'] = $pers;
                print '<p class="text-center">Bienvennue ' . ($_SESSION['pers'])->getPrenom() . ' !</p>';
                header('refresh:2;url=index.php?page=3');
            } else { ?>
                <h2 class="text-center">Mail / Mot de passe incorect</h2>


                <div class="text-center">
                    <a href="index.php">Retour à l'accueil</a>
                </div>

            <?php }

        } else {
            // Deconnexion
            session_destroy(); ?>

            <h2 class="text-center">Vous avez été deconnecté</h2>
            <p class="text-center">Redirection en cours...</p>
            <?php
            header('refresh:2;url=index.php');
        }

        ?>


    </div>


    <div class="col"></div>
</div>
