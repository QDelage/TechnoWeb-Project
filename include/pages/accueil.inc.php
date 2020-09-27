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
        <form>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    
    <div class="col"></div>
</div>
