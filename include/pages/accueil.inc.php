<!-- Page d'accueil -->
<h1 class="text-center mt-4">Accueil</h1>

<div class="row">
    <div class="col"></div>
    <div class="col-6 border p-3 ">

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
            <tr>
            <th scope="row">1</th>
                <td>Football</td>
                <td>1490</td>
            </tr>
            <tr>
            <th scope="row">2</th>
                <td>BasketBall</td>
                <td>1320</td>
            </tr>
            <tr>
            <th scope="row">3</th>
                <td>Rugby</td>
                <td>1042</td>
            </tr>
        </tbody>
        </table>

        <form class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="email" class="form-control" placeholder="Entrez votre adresse mail" aria-label="Mail" aria-describedby="basic-addon1">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe">
            </div>

            <button type="submit" class="btn btn-primary">Connexion</button>
            
            <label class="m-2">Pas encore inscrit ? </label><button class="btn btn-sm btn-secondary">Inscription</button>

        </form>

        <br /> <br />

    </div>

    
    <div class="col"></div>
</div>
