<?php



session_start();

if (isset($_SESSION['id'])) {
  session_destroy();
}

$db = new PDO('mysql:host=localhost;dbname=books', 'root');

var_dump($_POST);

if (isset($_POST['login'])) {
  $login = (string) $_POST ['login'];
  $motdepasse = (string) $_POST ['motdepasse'];

if (filter_var($login, FILTER_VALIDATE_EMAIL) && $motdepasse) {

  $stmt =$db->prepare('SELECT * FROM users WHERE email = :email');
  $stmt->bindParam(':email' , $login, PDO::PARAM_STR);
  $stmt->execute();

  $user = $stmt->fetch();

  if($user && password_verify($motdepasse, $user['password'])) {
    $_SESSION['id'] = $user ['id'];
    $_SESSION['name'] = $user ['name'];
     header('Location: ./profil.php');

  }

  //var_dump(password_verify($motdepasse, ));
  }

}



 ?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1 class="mt-3 mb-3">Se connecter</h1>
      <form action="./" method="post">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group mt-3">
              <label for="login">Adresse mail</label>
                <input required name="login" type="email" class="form-control" id="login" aria-describedby="emailHelp" placeholder="Adresse email">
                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email</small>
              </div>
              <div class="form-group">
                <label for="motdepasse">Mot de passe</label>
                <input required name="motdepasse" type="password" class="form-control" id="motdepasse" placeholder="motdepasse">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Se souvenir de moi</label>
              </div>
              <button type="submit" class="btn btn-primary">Soumettre</button>
          </div>
        </div>
    </div>
      </form>
  </body>
</html>
