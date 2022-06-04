
<!-- show.php -->

<?php require 'lib/functions.php'; ?>
<?php require 'layout/header.php'; ?>
<?php require 'layout/navbar.php'; ?>

<?php 
    $id = $_GET['id'];
    $fruit = getFruit($id);
?>

<h1>Meet <?php echo $fruit['name']; ?></h1>
    

<?php require 'layout/footer.php'; ?>