<!-- Page d'accueil -->
<h1 class="text-center mt-4">Inscription</h1>

<div class="row">
    <div class="col"></div>
    <div class="col-6 border p-3 ">

        </table>

        <form class="form-group">
            <div class="row">
                <!-- Colonne de gauche -->
                <div class="col">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" class="form-control" placeholder="Nom">
                    </div>

                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailInfo" placeholder="Entrez votre mail">
                        <small id="emailInfo" class="form-text text-muted">Nous ne partagerons jamais votre adresse avec des tiers.</small>
                    </div>
                    
                </div>

                <!-- Colonne de droite -->
                <div class="col">
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" id="prenom" class="form-control" placeholder="Nom">
                    </div>

                    <div class="form-group">
                        <label for="departement">Département</label>
                        <select id="departement" class="custom-select">
                            <option selected>Choisissez votre département</option>
                            <option value="1">Ain</option>
                            <option value="2">Aisne</option>
                            <option value="3">Allier</option>
                        </select>
                    </div>
                </div>

            </div>
            <button class="btn btn-primary" type="submit">S'inscrire</button>

        </form>


    </div>

    
    <div class="col"></div>
</div>
