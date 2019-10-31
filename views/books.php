<?php $title = "Liste des livres"; ?>
<?php ob_start(); ?>

<div class="container">


  <h1>Liste des livres</h1>

  <ul>
    <?php
      foreach ($books as $book) {
        echo '<li>' . $book['title'] . '</li>';
      }
    ?>

  </ul>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
