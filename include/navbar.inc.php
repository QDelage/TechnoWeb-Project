<nav class="navbar navbar-light">
    <a id="nomSite" class="navbar-brand" href="index.php?page=0">
        <img id="logo" src="img/logo.png" class="d-inline-block align-top" alt="logo">
        <h1 id="TitreSite">Sporty'Meet</h1>
    </a>
    <button id="navButton" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <i class="fa fa-2 fa-bars" aria-hidden="true"></i>
    </button>

    
    <div class="container-fluid">
        <div class="navbar-header"></div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php if (!isset($_SESSION['pers'])) {
                // Si on n'est pas connecté ?>
                <li class="active"><a href="index.php">Accueil / Connexion</a></li>
                <li><a href="index.php?page=1">Inscription</a></li>

                <?php } else { 
                // Si on est connecté?>
                <li><a href="index.php?page=3">Profil</a></li>
                <li><a href="index.php?page=2">Recherche</a></li>
                <li><a href="index.php?page=0&deconnexion=true">Deconnexion</a></li>

                <?php } ?>

            </ul>
        </div>
    </div>
    <?php
    print_r($_SESSION);
    ?>
</nav>