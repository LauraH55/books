<?php $title = "Liste des livres"; ?>
<?php ob_start(); ?>

<div class="container">


  <h1>Liste des livres</h1>

  <ul>
    <?php
      foreach ($books as $book) {
        ?>
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="..." class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?php echo $book['title']; ?></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>
        <?php
      }
    ?>

  </ul>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
