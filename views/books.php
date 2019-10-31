<?php $title = "Liste des livres"; ?>
<?php ob_start(); ?>
<h1>Liste des livres</h1>
<p>Bienvenue sur la page de la liste des livres</p>
<?php var_dump($books); ?>
<?php $content = ob_get_clean(); ?>
<?php require('public/index.php'); ?>
