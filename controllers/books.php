<?php
require('models/books.php');

function listBooks($page)
{
  $limit = 20;
  $offset = ($page - 1) * $limit;

  $count= countBooks();

  $nombreDePages = ceil($count / $limit);

  $books = getBooks($offset, $limit);
  require('views/books.php');
}

function showBook ($id)
{
  $book = getBook($id);

  require('views/book.php');
}
