<?php $title = "Librairie"; ?>
<?php ob_start(); ?>

<div class="container">


  <h1 style="color: pink;">Librairie en ligne</h1>

  <div class="row">
    <?php foreach ($books as $book) { ?>
      <div class="col-md-3 describe">
        <div class="card mb-3 books">
          <div class="image">
            <img src="public/<?php echo $book['imageLink']; ?>" class="card-img" alt="Image du livres">
          </div>
          <div class="card-body">
            <h5 class="card-title"><?php echo $book['title']; ?></h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer text-muted">
            <a style="text-align: center;" href="<?php echo $book['link'];?>" class="btn btn-primary">Description</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
