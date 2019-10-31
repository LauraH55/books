<?php $title = "Liste des livres"; ?>
<?php ob_start(); ?>
<h1>Liste des livres</h1>

<ul>
  <?php
    foreach ($books as $book) {
      echo '<li>' . $book['title'] . '</li>';
    }
  ?>

</ul>


<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
