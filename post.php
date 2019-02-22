<?php
require_once('config/config.php');
require_once('config/db.php');

//Check For Submit

if(isset($_POST['delete'])){
    //get from data
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
   
$query = "DELETE FROM `1016007889` WHERE id = {$delete_id}";
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

$result = $conn->query($query) or die ($conn->error);

// $result = mysqli_query($conn, $query);

$post = mysqli_fetch_assoc($result);
//   var_dump($posts);

mysqli_free_result($result);

mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <a href="<?php  echo ROOT_URL; ?>" class="btn btn-outline-primary mt-4">Back</a>
        <h1>
            <?php echo $post['title']; ?>
        </h1>
        <small class="card-body card-subtitle mb-2 text-muted">Creado el
            <?php echo $post['created_at']; ?> Por
            <?php echo  $post['author']; ?> </small>
        <p class="card-body card-text">
            <?php echo $post['body'] ?>
        </p>
        <hr>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="float-right" method="POST">
          <input type="hidden" name="delete_id" value="<?php echo $post['id'] ?>" >
          <input type="submit" name="delete" value="Delete" class="btn btn-outline-danger">
        </form>
        <a href="<?php echo ROOT_URL ?>editPost.php?id=<?php echo $post['id']; ?>" class="btn btn-outline-primary">Edit</a>
    </div>
<?php include('inc/footer.php'); ?> 
