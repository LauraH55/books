<?php $title = "Librairie"; ?>
<?php ob_start(); ?>

<div class="container">


  <h1>Librairie en ligne</h1>

  <ul>
    <?php
      foreach ($books as $book) {
        ?>
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <div class="image">
                <img src="public/<?php echo $book['imageLink']; ?>" class="card-img" alt="Image du livres">
              </div>
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <img src="" alt="">
                <h5 class="card-title"><?php echo $book['title']; ?></h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="<?php echo $book['link'];?>" class="btn btn-primary">Description</a>
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
