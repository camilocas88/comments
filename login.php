<?php
require_once('config/facebookConfig.php');
require_once('config/config.php');
require_once('config/db.php');

if (isset($_SESSION['access_token'])) {
    header("Location: index.php");
    exit();
}

$redirectTo = 'http://localhost:8080/lalicorera/callback.php';
$data = ['email'];
$fullURL = $handler->getLoginUrl($redirectTo, $data)

?>
<?php include('inc/header.php'); ?>

<div class="container" style="margin-top:100px">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">
            <h1>Ingresa fon tu usuario de Facebook</h1>
            <input type="button" onclick="window.location = '<?php echo $fullURL ?>'" class="btn btn-primary" value="Login">
        </div>
    </div>

</div>


<?php include('inc/footer.php'); ?> 