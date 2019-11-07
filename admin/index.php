<?php

$db = new PDO('mysql:host=localhost;dbname=books', 'root');
$stmt = $db->prepare("SELECT * FROM authors ORDER BY name");
$stmt->execute();
$authors = $stmt->fetchAll();



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
    <form action="./" method="post">
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <label for="title">Titre du livre</label>
                <input name="title" maxlength="20" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Titre du livre...">
                <small id="titleHelp" class="form-text text-muted">Titre du livre entre 0 et 255 caractères.</small>
              </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="author">Auteur</label>
                  <select name="author_id" class="form-control" id="author_id">
                    <?php foreach ($authors as $author) { ?>
                      <option value="<?php echo $author['id']; ?>">
                        <?php echo $author ['name']; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="pages">Nombre de pages</label>
                  <input name="pages"
                  type="text"
                  step="1"
                  min="0"
                  class="form-control"
                  id="pages">
                </div>
           </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="wikipedia_link">Lien Wikipedia</label>
                  <input name="wikipedia_link"
                  type="text"
                  class="form-control"
                  id="wikipedia_link">
                </div>
                <div class="form-group">
                  <label for="year">Année de parution</label>
                  <input name="year"
                  type="number"
                  step="1"
                  min="0"
                  class="form-control"
                  id="year">
                </div>
                <div class="form-group">
                  <label for="language">Langue</label>
                  <input name="language"
                  type="text"
                  class="form-control"
                  id="language">
                </div>
               <div class="form-group">
                 <label for="country">Pays</label>
                 <input name="country"
                 type="text"
                 class="form-control"
                 id="country">
               </div>

            </div>
          </form>
        </div>
      </body>
      </html>
