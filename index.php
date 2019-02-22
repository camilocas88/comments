<?php
require_once('config/config.php');
require_once('config/db.php');

session_start();

if(!isset($_SESSION['access_token'])){
    header("Location: login.php");
    exit();
}

if(isset($_GET['logout'])){
    unset($_SESSION['access_token']);
    header("Location: login.php");
    exit();
}

$query = 'SELECT * FROM `1016007889` ORDER BY created_at DESC';

$result = mysqli_query($conn, $query);

$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
//   var_dump($posts);

mysqli_free_result($result);

mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
    <div class="container">
    <a href="?logout" class="btn btn-outline-danger float-right mt-4">Logout</a>
        <h1> Comentarios</h1>
        <?php foreach ($posts as $post): ?>
        <div class="card mt-4">
            <h3 class="card-body card-title">
                <?php echo $post['title']; ?>
            </h3>
            <small class="card-body card-subtitle mb-2 text-muted">Creado el
                <?php echo $post['created_at']; ?> by
                <?php echo  $post['author']; ?> </small>
            <p class="card-body card-text">
                <?php echo $post['body'] ?>
            </p>
            <div class="card-body">
                <a class="btn btn-outline-primary " href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $post['id']; ?>">Leer Mas</a>

            </div>
        </div>
        <?php endforeach ?>
    <a href="<?php echo ROOT_URL; ?>addPost.php" class="btn btn-outline-success float-right mt-4">Add</a>

    </div>
<?php include('inc/footer.php'); ?> 