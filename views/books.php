<nav class="navbar navbar-light" style="background-color: #FFE4E1;">
  <a style="color: #696969; class="navbar-brand">Libraire en ligne</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Recherche">
    <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Recherche</button>
  </form>
</nav>
<?php $title = "Librairie"; ?>
<?php ob_start(); ?>

<div class="container">




  <div class="row">
    <?php foreach ($books as $book) { ?>
      <div class="col-md-3 describe">
        <div class="card mb-3 books">
          <div class="image">
            <img src="public/<?php echo $book['imageLink']; ?>" class="card-img" alt="Image du livres">
          </div>
          <div class="card-body">
            <h5 class="card-title book-title"><?php echo $book['title']; ?></h5>
            <ul class="book-list">
              <li class="fas fa-pencil-alt"> <?php echo $book['author']; ?></li>
              <li class="fa fa-calendar"> <?php echo $book['year']; ?></li>
            </ul>

          </div>
          <div class="card-footer text-muted text-center">
            <a style="text-align: center;" href="<?php echo $book['link'];?>" class="btn btn-primary ">Description</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
