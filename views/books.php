<?php $title = "Librairie"; ?>
<?php ob_start(); ?>

<div class="container">
  <div class="row">
    <?php foreach ($books as $book) { ?>
      <div class="col-md-3 describe">
        <div class="card mb-3 books">
          <div class="image">
            <img src="<?php echo $book['image'] ?$book['image']: "public/images/books/comingsoon.jpg"; ?>" class="card-img" alt="Image du livres">
          </div>
          <div class="card-body">
            <h5 class="card-title book-title">
              <a href="?action=book&id=<?php echo $book['id']; ?>">
                <?php  echo $book['title']; ?>
              </a>
            </h5>
            <ul class="book-list">
              <li class="fas fa-pencil-alt"> <?php echo $book['author']; ?></li>
              <li class="fa fa-calendar"> <?php echo $book['year']; ?></li>
            </ul>

          </div>
          <div class="card-footer text-muted text-center">
            <a style="text-align: center;" href="<?php echo $book['Wikipedia'];?>" class="btn btn-primary ">En savoir plus</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="row">
    <div class="col-md-12">
      <nav aria-label="Page navigation livres">
        <ul class="pagination">
          <li class="page-item disabled">
            <span class="page-link">Précédent</span>
          </li>
          <?php for ($i=1; $i <= $nombreDePages; $i++) { ?>
            <li class="page-item">
              <a href="?action=books&page=<?php echo $i; ?>" class="page-link" href="#"><?php echo $i; ?></a>
            </li>
          <?php } ?>
          <li class="page-item">
            <a class="page-link" href="#">Suivant</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>




<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
