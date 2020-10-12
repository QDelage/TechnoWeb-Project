<!-- Page d'accueil -->
<h1 class="text-center mt-4">Inscription</h1>
<div class="container-fluid">

<div class="row">
    <div class="col"></div>
    <div class="col-8 border p-3 ">


        <form class="form-group">
            
            <table class="w-100">
                <tr>
                    <td class="w-50">
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" class="form-control" placeholder="Nom">
                        </div>
                    </td>
                    <td class="w-50">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" class="form-control" placeholder="Nom">
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-group">
                            <label for="email">Adresse email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailInfo" placeholder="Entrez votre mail">
                            <small id="emailInfo" class="form-text text-muted">Nous ne partagerons jamais votre adresse avec des tiers.</small>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <label for="departement">Département</label>
                            <select id="departement" class="custom-select">
                                <option selected>Choisissez votre département</option>
                                <option value="1">Ain</option>
                                <option value="2">Aisne</option>
                                <option value="3">Allier</option>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="form-group">
                            <label for="sports">Sport</label>
                            <select id="sports" class="custom-select">
                                <option selected>Choisissez votre département</option>
                                <option value="1">Ain</option>
                                <option value="2">Aisne</option>
                                <option value="3">Allier</option>
                            </select>
                        </div>
                    </td>

                    <td>
                        <div class="form-group">
                            <label for="niveau">Niveau</label>
                            <select id="niveau" class="custom-select">
                                <option selected>Choisissez votre département</option>
                                <option value="1">Ain</option>
                                <option value="2">Aisne</option>
                                <option value="3">Allier</option>
                            </select>
                        </div>
                    </td>
                </tr>
            </table>


            <button class="btn btn-primary" type="submit">S'inscrire</button>

        </form>


    </div>

    
    <div class="col"></div>
</div>

</div>
