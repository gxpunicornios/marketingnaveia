<!DOCTYPE html>
<?php
include 'db_connection.php';
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$db = new DbConnect();
$db->open();

//$post = $db->getPost($id);


$post = "";
if(!isset($_GET['id']) || empty($_GET['id'])){
    if(!isset($_GET['seo']) || empty($_GET['seo'])){
        $post = $db->getLpById(1);
    }
    else{
        $post = $db->getPostBySeo($_GET['seo']);
    }
}
else
{
    $post = $db->getPost($_GET['id']);
}

?>
<html lang="pt">
<head>
  <base href="/" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<meta name="description" content="<?php echo substr($post['post_description'],0,140)?>">-->

  <title>Marketing na Veia - <?php echo $post['post_title'] . " " . $post['post_subtitle']?></title>

  <!-- Bootstrap Core CSS -->
  <!--<link href="lib/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="lib/css/bootstrap-theme.min.css" rel="stylesheet">-->
  <link rel="shortcut icon" href="img/img_thumb.png" type="image/x-png">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Libre+Franklin" rel="stylesheet">
  <link href="css/posts.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>
<?php include_once("analyticstracking.php") ?>

<?php 
$banner = !empty($post['post_banner']) ? $post['post_banner'] : "banner-post.png";
?>
<body>
    <header class="intro-header" style="background-image: url('img/<?php echo $banner ?>')">
        <?php include 'navbar.php'; ?>
        <div id="blog-head" class="site-heading container align-items-center">
            <div class="post-title" style="font-size:70px;color:white;font-weight:bold;font-family: 'Libre Franklin', sans-serif;line-height: 1;"><?php echo $post['post_title']; ?></div>
            <div class="post-subtitle" style="font-size:26px;color:#512772;font-weight:bold;"><?php echo $post['post_subtitle']; ?></div>
            <p></p>
            <p style="color:#512772">Postado por <b><?php echo $post['post_author']; ?></b> em <?php echo strftime('%A, %d de %B de %Y', strtotime($post['post_date_created'])); ?></p>
        </div>
    </header>

<?php

if($post["post_lp_id"] > 0){

  $db = new DbConnect();
  $db->open();
  $result = $db->getLpTitle($post["post_lp_id"]);

?>

    <section id="cta">
      <div class="container">
        <div class="row">
          <div class="col col-md-4"></div>
          <div class="col col-md-4"></div>
          <div class="col col-md-4">

            <div id="cadastro-box" data-spy="affix" align="center">
                <center>
                <p style="margin-bottom: 25px; text-align: center">Baixe AGORA o ebook!!</p>
                <p> <?php echo $result['lp_h2']?></p>
                <button onclick="location.href = 'ebook.php?id=<?php echo $post['post_lp_id']?>'" type="button" class="btn btn-default" style="width: 100%;font-weight: bold;color: #512772;background-color: #6afac5;border-width: 0px;border-radius: 0px;height: 34px">BAIXAR AGORA</button>
                <p></p>
                </center>
            </div>

          </div>
        </div>
      </div>
    </section>
<?php 
  }

?>

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
