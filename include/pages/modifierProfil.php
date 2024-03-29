<h1 class="text-center mt-4">Profil</h1>
<div class="container-fluid">

    <?php
    // Pour éviter les problèmes, il a été décidé de ne modifier qu'un seul champ à la fois
    // La modification d'un profil étant rare, celà ne devrait pas trop impacter le client
    ?>

    <div class="row">
        <div class="col"></div>
        <div class="col-8 p-3 text-center">

            <?php if (empty($_POST)) { ?>

                <!-- On change l'affichage de l'image selon qu'on soit sur mobile ou PC -->
                <img id="ImgProfil" class="img-circle mb-4 d-none d-sm-inline"
                     src="img/profils/<?php print $_SESSION['pers']->getPhoto(); ?>"><br/>
                <img id="ImgProfilSmall" class="img-circle mb-4 d-sm-none"
                     src="img/profils/<?php print $_SESSION['pers']->getPhoto(); ?>"><br/>

                <div class="row">
                    <div class="col"></div>
                    <!-- On change l'affichage de la modif de l'image selon qu'on soit sur mobile ou PC -->
                    <div class="col-6 d-none d-sm-inline">
                        <form class="mb-5 w-100" method="post" action="index.php?page=3" enctype="multipart/form-data">
                            <div class="file-field w-100">
                                <div class="btn btn-primary btn-sm float-left w-100 mb-3">
                                    <span>Choisissez l'image</span>
                                    <input type="file" class="w-100" name="img" required>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <input class="btn btn-primary btn-sm" type="submit" value="Modifier" name="submit">
                        </form>
                    </div>

                    <div class="col-12 d-sm-none">
                        <form class="mb-5 w-100" method="post" action="index.php?page=3" enctype="multipart/form-data">
                            <div class="file-field w-100">
                                <div class="btn btn-primary btn-sm float-left w-100 mb-3">
                                    <span>Choisissez l'image</span>
                                    <input type="file" class="w-100" name="img" required>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <input class="btn btn-primary btn-sm" type="submit" value="Modifier" name="submit">
                        </form>
                    </div>
                    <div class="col"></div>
                </div>

                <label>Nom : <?php
                    echo htmlspecialchars($_SESSION['pers']->getNom(),  ENT_QUOTES, 'UTF-8'); ?>
                </label>
                <!-- Bouton pour afficher le formulaire de modification de CET élément -->
                <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('nom');">Modifer
                </button>
                <br/><br/>
                <form id="profilFormNom" class="hide mb-4" method="post" action="index.php?page=3">
                    <!-- Formulaire pour modifier le nom -->
                    <label>Nouveau nom : </label>
                    <input name="nom" type="text" id="inputNom" required>

                    <input class="btn btn-primary btn-sm" type="submit" value="OK">
                    <button onclick="modifierProfilCacherChamp('nom');" class="btn btn-danger btn-sm" type="button">X
                    </button>
                </form>

                <label>Prénom : <?php
                    echo htmlspecialchars($_SESSION['pers']->getPrenom(),  ENT_QUOTES, 'UTF-8'); ?>
                </label>
                <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('prenom');">
                    Modifer
                </button>
                <br/><br/>
                <form id="profilFormPrenom" class="hide mb-4" method="post" action="index.php?page=3">
                    <!-- Formulaire pour modifier le prénom -->
                    <label>Nouveau prénom : </label>
                    <input name="prenom" type="text" required>

                    <input class="btn btn-primary btn-sm" type="submit" value="OK">
                    <button onclick="modifierProfilCacherChamp('prenom');" class="btn btn-danger btn-sm" type="button">
                        X
                    </button>
                </form>

                <label>Description : <?php
                    echo htmlspecialchars($_SESSION['pers']->getDescription(),  ENT_QUOTES, 'UTF-8'); ?>
                </label>
                <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('description');">
                    Modifer
                </button>
                <br/><br/>
                <form id="profilFormDescription" class="hide mb-4" method="post" action="index.php?page=3">
                    <!-- Formulaire pour modifier la description -->
                    <label>Nouvelle description : </label>
                    <textarea name="description" type="text" required></textarea>

                    <input class="btn btn-primary btn-sm" type="submit" value="OK">
                    <button onclick="modifierProfilCacherChamp('description');" class="btn btn-danger btn-sm"
                            type="button">
                        X
                    </button>
                </form>


                <label>Département : <?php
                    $dptMgr = new DepartementManager($pdo);
                    $dpt = $dptMgr->getDepartement($_SESSION['pers']->getIdDepartement());
                    $dpts = $dptMgr->getAllDepartments();
                    print $dpt->getNom(); ?>
                </label>
                <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('departement');">
                    Modifer
                </button>
                <br/><br/>
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
                    <button onclick="modifierProfilCacherChamp('departement');" class="btn btn-danger btn-sm"
                            type="button">X
                    </button>
                </form>

                <label>Mail : <?php
                    echo htmlspecialchars($_SESSION['pers']->getMail(),  ENT_QUOTES, 'UTF-8'); ?>
                </label>
                <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('mail');">
                    Modifer
                </button>
                <br/><br/>
                <form id="profilFormMail" class="hide mb-4" method="post" action="index.php?page=3">
                    <!-- Formulaire pour modifier le prénom -->
                    <label>Nouvelle adresse mail : </label>
                    <input name="mail" type="mail" required>

                    <input class="btn btn-primary btn-sm" type="submit" value="OK">
                    <button onclick="modifierProfilCacherChamp('mail');" class="btn btn-danger btn-sm" type="button">X
                    </button>
                </form>

                <label>Mot de passe :
                    *******
                </label>
                <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('mdp');">Modifer
                </button>
                <form id="profilFormMDP" class="hide mb-4" method="post" action="index.php?page=3">
                    <!-- Formulaire pour modifier le prénom -->
                    <label>Nouveau mot de passe : </label>
                    <input name="password" type="password" required>

                    <input class="btn btn-primary btn-sm" type="submit" value="OK">
                    <button onclick="modifierProfilCacherChamp('mdp');" class="btn btn-danger btn-sm" type="button">X
                    </button>
                </form>

                <br/><br/>
                <label>
                    Sports :
                </label>

                <form id="profilFormsupressionSport" method="post" action="index.php?page=3">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Sport</th>
                            <th scope="col">Niveau</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pratiqueMngr = new PratiqueManager($pdo);
                        $pratiques = $pratiqueMngr->getSport($_SESSION["pers"]);
                        if (isset($pratiques)) {
                            foreach ($pratiques as $pratique) {
                                echo "<tr>";
                                echo "<td>" . $pratique->getNomSport() . "</td>";
                                if ($pratique->getNiveau() == 1) {
                                    echo "<td>Debutant</td>";
                                } else if ($pratique->getNiveau() == 2) {
                                    echo "<td>Intermediaire</td>";
                                } else {
                                    echo "<td>Confirmé</td>";
                                }
                                echo "<input name='idSport' value='" . $pratique->getidSport() . "' hidden><td><input type='submit' value='Supprimer'></td>";
                                echo "</tr>";
    
                            }
                        }

                        ?>
                        </tbody>
                    </table>
                </form>
                <label>Ajouter un sport
                </label>
                <button class="btn btn-sm btn-outline-secondary" onclick="modifierProfilAfficherChamp('sport');">Modifer
                </button>
                <form id="profilFormAjouterSport" class="hide mb-4" method="post" action="index.php?page=3">

                    <?php
                    $sprsMgr = new SportManager($pdo);
                    $sprs = $sprsMgr->getAllSports($pdo);
                    ?>
                    <label for="sport">Sport</label>
                    <select id="sport" class="custom-select" required name="sport">

                        <option selected disabled>Choisissez votre sport</option>
                        <?php
                        foreach ($sprs as $key => $value) { ?>

                            <option value="<?php echo $value->getIdSport(); ?>"><?php echo $value->getNom(); ?></option>

                        <?php } ?>
                    </select>
                    <label for="niveau">Niveau</label>
                    <select required id="niveau" name="niveau" class="custom-select">
                        <option selected disabled>Choisissez votre niveau</option>
                        <option value="1">Débutant</option>
                        <option value="2">Intermédiaire</option>
                        <option value="3">Confirmé</option>
                    </select>
                    <input class="btn btn-primary btn-sm" type="submit" value="OK">
                    <button onclick="modifierProfilCacherChamp('sport');" class="btn btn-danger btn-sm" type="button">X
                    </button>
                </form>

            <?php } else {
                $persMgr = new PersonneManager($pdo);
                $dptMgr = new DepartementManager($pdo);
                $pratiqueMngr = new PratiqueManager($pdo);
                $pers = $_SESSION['pers']; // Passage par référence, donc la modification est faite aussi en session
                ?>

                <?php
                if (isset($_POST['nom'])) {
                    $pers->setNom($_POST['nom']);
                    header('refresh:0;url=index.php?page=3');
                }

                if (isset($_POST['prenom'])) {
                    $pers->setPrenom($_POST['prenom']);
                    header('refresh:0;url=index.php?page=3');
                }

                if (isset($_POST['description'])) {
                    $pers->setDescription($_POST['description']);
                    header('refresh:0;url=index.php?page=3');
                }

                if (isset($_POST['departement'])) {
                    $pers->setIDDepartement($_POST['departement']);
                    header('refresh:0;url=index.php?page=3');
                }

                if (isset($_POST['mail'])) {
                    $pers->setMail($_POST['mail']);
                    header('refresh:0;url=index.php?page=3');
                }
                if (isset($_POST['password'])) {
                    $pers->setMDP($_POST['password']);
                    header('refresh:0;url=index.php?page=3');
                }
                if (isset($_POST['idSport'])) {
                    $pratiqueMngr->SupprimerSport($_POST['idSport'], $_SESSION["pers"]);
                    header('refresh:0;url=index.php?page=3');
                }
                if (isset($_POST['niveau'])) {
                    $valuesPratique = array(
                        "ID_PERSONNE" => $_SESSION["pers"]->getidPersonne(),
                        "ID_SPORT" => $_POST["sport"],
                        "NIVEAU" => $_POST['niveau']
                    );
                    $pratiqueAdd = new Pratique($valuesPratique);
                    $pratiqueMngr->ajout($pratiqueAdd);
                    header('refresh:0;url=index.php?page=3');
                }

                if (isset($_FILES['img'])) {
                    // On placera la photo dans le bon dossier, avec pour nom l'id de la personne
                    $target_dir = "img/profils/";
                    $names = explode(".", $_FILES['img']["name"]);
                    $uploadOk = 1;
                    if ($names[1] != "png" and $names[1] != "jpg" and $names[1] != "jpeg" and $names[1] != "gif") {
                        echo "Format non accepté. Veuillez fournir un fichier png, jpg, jpeg, ou gif.";
                        $uploadOk = 0;
                    }
                    $name = $_SESSION['pers']->getidPersonne() . "." . $names[1];
                    $target_file = $target_dir . basename($name);

                    // On vérifie s'il s'agit bien d'un fichier image
                    if (isset($_POST["submit"]) and $uploadOk == 1) {
                        $check = getimagesize($_FILES["img"]["tmp_name"]);
                        if ($check !== false) {
                            $uploadOk = 1;
                        } else {
                            echo "Le fichier n'est pas une image...";
                            $uploadOk = 0;
                        }
                        // Vérifie la taille du fichier, 500 kB max
                        if ($_FILES["img"]["size"] > 500000) {
                            echo "Désolé, votre fichier est trop gros...";
                            $uploadOk = 0;
                        }
                    }

                    if ($uploadOk == 0) {
                        echo "Désolé, votre photo n'a pas été téléversée.";
                        // Si tout va bien on téléverse le fichier
                    } else {
                        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                            echo "Le fichier " . htmlspecialchars(basename($_FILES["img"]["name"])) . " a été téléversé.";
                            $_SESSION['pers']->setPhoto($name);
                            header('refresh:0;url=index.php?page=3');
                        } else {
                            echo "Désolé, votre photo n'a pas pu être modifiée.";
                        }
                    }

                }


                $persMgr->update($pers);

                ?>


            <?php } ?>
        </div>
        <div class="col"></div>
    </div>