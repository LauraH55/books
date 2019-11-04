<?php $title = "Librairie"; ?>
<?php ob_start(); ?>

<div class="row">
  <div class="container display-flex mt-5">
    <div class="col-4">
      <img src="public/<?php echo $book['imageLink']; ?>" alt="Image du livres">
    </div>
    <div class="table-responsive-md">
      <div class="col-8">

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="row">Titre</th>
            <td>Things Fall Apart</td>
          </tr>
          <tr>
            <th scope="row">Auteur</th>
            <td><?php echo $book ['author']; ?></td>
          </tr>
          <tr>
            <th scope="col">Country</th>
            <td scope="col"><?php echo $book['country']; ?></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Pages</th>
            <td><?php echo $book ['pages']; ?></td>
          </tr>
          <tr>
            <th scope="row">Parution</th>
            <td><?php echo $book ['year']; ?></td>
          </tr>
          <tr>
            <th scope="row">Lien</th>
            <td><a href="<?php echo $book ['link']; ?>">Wikipédia</a></td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>
  </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
