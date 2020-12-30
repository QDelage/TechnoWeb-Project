/**
 * Méthode pour afficher le champ à modifier dans la page de modification du profil
 * @param {string} $champ : champ à afficher
 */
function modifierProfilAfficherChamp($champ){
    switch ($champ) {
        case "nom":
            document.getElementById("profilFormNom").style.display = "block";
            break;

        case "prenom":
            document.getElementById("profilFormPrenom").style.display = "block";
            break;
        case "description":
            document.getElementById("profilFormDescription").style.display = "block";
            break;

        case "departement":
            document.getElementById("profilFormDepartement").style.display = "block";
            break;

        case "mail":
            document.getElementById("profilFormMail").style.display = "block";
            break;

        case "mdp":
            document.getElementById("profilFormMDP").style.display = "block";
            break;
        case "sport":
            document.getElementById("profilFormAjouterSport").style.display = "block";
            break;
        default:
            break;
    }
}

/**
 * Méthode pour cacher le champ choisi dans la page de modification du profil
 * @param {string} $champ : champ à cacher
 */
function modifierProfilCacherChamp($champ){
    switch ($champ) {
        case "nom":
            console.log("ui");
            document.getElementById("profilFormNom").style.display = "none";
            break;

        case "prenom":
            document.getElementById("profilFormPrenom").style.display = "none";
            break;
        case "description":
            document.getElementById("profilFormDescription").style.display = "none";
            break;

        case "departement":
            document.getElementById("profilFormDepartement").style.display = "none";
            break;

        case "mail":
            document.getElementById("profilFormMail").style.display = "none";
            break;

        case "mdp":
            document.getElementById("profilFormMDP").style.display = "none";
            break;
        case "sport":
            document.getElementById("profilFormAjouterSport").style.display = "none";
            break;
    
        default:
            break;
    }
}