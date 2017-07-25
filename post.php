<!DOCTYPE html>
<?php
include 'db_connection.php';
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$id = $_GET['id'];

$db = new DbConnect();
$db->open();

$post = $db->getPost($id);

?>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<meta name="description" content="<?php echo substr($post['post_description'],0,140)?>">-->

  <title>Marketing na Veia - <?php echo $post['post_title'] . " " . $post['post_subtitle']?></title>

  <!-- Bootstrap Core CSS -->
  <!--<link href="lib/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="lib/css/bootstrap-theme.min.css" rel="stylesheet">-->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="img/img_thumb.png" type="image/x-png">

</head>
<?php include_once("analyticstracking.php") ?>
<body>
    <header class="intro-header" style="background-image: url('img/banner-post.png')">
        <?php include 'navbar.php'; ?>
        <div id="blog-head" class="site-heading container align-items-center">
            <div class="post-title" style="font-size:50px;color:white;font-weight:bold;"><?php echo $post['post_title']; ?></div>
            <div class="post-subtitle" style="font-size:26px;color:#512772;font-weight:bold;"><?php echo $post['post_subtitle']; ?></div>
            <p></p>
            <p style="color:#512772">Postado por <b><?php echo $post['post_author']; ?></b> em <?php echo strftime('%A, %d de %B de %Y', strtotime($post['post_date_created'])); ?></p>
        </div>
    </header>

    <section id="blog-text">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-lg-8">
                    <div id="corpo" class="post-text" style="font-size:18px">
                        <?php echo $post['post_description']?>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>


    </section>

    <?php include 'footer.php'; ?>
</body>

</html>

<?php
$db->close();
?>
