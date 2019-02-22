<?php
require_once('config/config.php');
require_once('config/db.php');

//Check For Submit

if(isset($_POST['submit'])){
  //get from data #endregion
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  $author = mysqli_real_escape_string($conn, $_POST['author']);

  $conn->query("INSERT INTO `1016007889`(title, author, body) VALUES('$title', '$author', '$body')") or die ($conn->error);
  header('Location: '.ROOT_URL.'');
}


?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <h1>Adicionar Comentarios</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
          <label>Titulo</label>
          <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
          <label>Autor</label>
          <input type="text" name="author" class="form-control">
        </div>
        <div class="form-group">
          <label>Comentarios</label>
          <textarea type="text" name="body" class="form-control"></textarea>
        </div>
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
        </form>
    </div>
<?php include('inc/footer.php'); ?> 