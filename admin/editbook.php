<?php

$db = new PDO('mysql:host=localhost;dbname=books', 'root');

$id= isset($_GET['id']) ? (int)$_GET ['id'] : null;


$stmt = $db->prepare("SELECT * FROM authors ORDER BY name");
$stmt->execute();
$authors = $stmt->fetchAll();


if (isset($_POST['book'])) {

  $id = isset($_POST['id']) ? (int) $_POST ['id'] : null;
  $title = (string) $_POST['title'];
  $description = (string) $_POST['description'];
  $authorId = (int) $_POST['author_id'];
  $pages = (int) $_POST['pages'];
  $wikipediaLink = (string) $_POST['wikipedia_link'];
  $year = (int) $_POST['year'];
  $language = (string) $_POST['language'];
  $country = (string) $_POST['country'];

  if(!$title) {
    throw new Exception('Invalid title')
  }

  if (strlen($title) > 255) {
    $title = substr($title, 0, 255);
  }

  if (!preg_match('/^(http|https):\/\/([a-z]{2})\.wikipedia\.org\/([a-zA-Z0-9-_\/%:]+)?/i', $wikipediaLink )) {
    $wikipediaLink = "";
  }

  if($id) {
    $stmt = $db->prepare('UPDATE books
      SET title = :title,
          description = :description,
          author_id = :author_id,
          pages = :pages,
          wikipedia_link = :wikipedia_link,
          year = :year,
          language = :language,
          country = :country
      WHERE
        id= :id
    ');
    $stmt-> bindParam(':id', $id, PDO::PARAM_INT);



  } else {



    $stmt = $db->prepare( 'INSERT INTO `books` (
      `title`,
      `description`,
      `author_id`,
      `pages`,
      `wikipedia_link`,
      `year`,
      `language`,
      `country`
      )
      VALUES (
        :title,
        :description,
        :author_id,
        :pages,
        :wikipedia_link,
        :year,
        :language,
        :country
      )');
  }

  $stmt-> bindParam(':title', $title, PDO::PARAM_STR);
  $stmt-> bindParam(':description', $description, PDO::PARAM_STR);
  $stmt-> bindParam(':author_id', $authorId, PDO::PARAM_INT);
  $stmt-> bindParam(':pages', $pages, PDO::PARAM_INT);
  $stmt-> bindParam(':wikipedia_link', $wikipediaLink, PDO::PARAM_STR);
  $stmt-> bindParam(':year', $year, PDO::PARAM_INT);
  $stmt-> bindParam(':language', $language, PDO::PARAM_STR);
  $stmt-> bindParam(':country', $country, PDO::PARAM_STR);

  $stmt-> execute ();

  if (!$id) {
    $id = $db->lastInsertId();
    header('Location: ' .$_SERVER["REQUEST_URI"] . '?id=' .$id);
  }

}

if ($id) {
  $stmt = $db->prepare("SELECT * FROM books WHERE id=:id");
  $stmt-> bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $book = $stmt->fetch();
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
      <h1 class="mb-3 mt-3"> <?php echo !isset($book) ? "Ajouter un livre" : "Editer : " . $book['title']; ?></h1>
      <form action="./<?php echo isset($book) ? '?id=' . $book['id'] : '' ?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="title">Titre du livre</label>
              <input  required name="title"  value="<?php echo isset($book) ? $book['title'] : ''; ?>"  maxlength="20" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Titre du livre...">
              <small id="titleHelp" class="form-text text-muted">Titre du livre entre 0 et 255 caractères.</small>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" <?php echo isset($book) ? $book['description'] : ''; ?> class="form-control" id="description" rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="author_id">Auteur</label>
              <select name="author_id" class="form-control" id="author_id">
                <?php foreach ($authors as $author) { ?>
                  <option <?php echo (isset($book) && $book['author_id'] === $author['id']) ? 'selected' : ''; ?> value="<?php echo $author['id']; ?>">
                    <?php echo $author['name']; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
                  <label for="pages">Nombre de pages</label>
                  <input name="pages"
                  value="<?php echo isset($book) ? $book['pages'] : ''; ?>"
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
              value="<?php echo isset($book) ? $book['wikipedia_link'] : ''; ?>"
              type="text"
              class="form-control"
              id="wikipedia_link">
            </div>
            <div class="form-group">
              <label for="year">Année de parution</label>
              <input name="year"
              value="<?php echo isset($book) ? $book['year'] : ''; ?>"
              type="number"
              step="1"
              min="0"
              class="form-control"
              id="year">
            </div>
            <div class="form-group">
              <label for="language">Langue</label>
              <input name="language"
              value="<?php echo isset($book) ? $book['language'] : ''; ?>"
              type="text"
              class="form-control"
              id="language">
            </div>
            <div class="form-group">
             <label for="country">Pays</label>
             <input name="country"
             value="<?php echo isset($book) ? $book['country'] : ''; ?>"
             type="text"
             class="form-control"
             id="country">
           </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" value="<?php echo isset($book) ? $book['id'] : ''; ?>" name="id">
            <button name="book" type="submit" class="btn btn-info">Envoyer</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
