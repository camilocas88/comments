<?php
require_once('config/config.php');
require_once('config/db.php');

//Check For Submit

if(isset($_POST['submit'])){
  //get from data
  $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $body = mysqli_real_escape_string($conn, $_POST['body']);
  $author = mysqli_real_escape_string($conn, $_POST['author']);

  $query = "UPDATE `1016007889` SET 
                title='$title',
                author='$author',
                body='$body'
                    WHERE id = {$update_id}";
    // die($query);
  if(mysqli_query($conn, $query)){
    header('location: '.ROOT_URL.'');
  }else {
      echo 'ERROR: '. mysqli_error($conn);
  }
}

//get ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = 'SELECT * FROM `1016007889` WHERE id = '. $id;

$result = mysqli_query($conn, $query);

$post = mysqli_fetch_assoc($result);
//   var_dump($posts);

mysqli_free_result($result);

mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <h1>Adicionar Comentarios</h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="form-group">
          <label>Titulo</label>
          <input type="text" name="title" class="form-control" value='<?php echo $post['title']; ?>'>
        </div>
        <div class="form-group">
          <label>Autor</label>
          <input type="text" name="author" class="form-control" value='<?php echo $post['author']; ?>'>
        </div>
        <div class="form-group">
          <label>Comentarios</label>
          <textarea type="text" name="body" class="form-control"><?php echo $post['body']; ?>'</textarea>
        </div>
        <input type="hidden" name="update_id" value="<?php echo $post['id']; ?>">
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
        </form>
    </div>
<?php include('inc/footer.php'); ?> 