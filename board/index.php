<?php
include '../db_connection.php';
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
header("Content-type: text/html; charset=utf-8");
session_start();

if(!isset($_SESSION['logged']) || !$_SESSION['logged']){
  header('location: login.php');
}


if(isset($_POST['post_author'])){

  $postTitle = $_POST['post_title'];
  $postSubtitle = $_POST['post_subtitle'];
  $postAuthor = $_POST['post_author'];
  $postText = $_POST['post_text'];
  $postPreview = $_POST['post_preview'];
  $db = new DbConnect();
  $db->open();
  $result = $db->insertPost($postTitle,$postSubtitle,$postText,$postAuthor,$postPreview);
  $db->close();

  if($result === 0){
    $msg = "Inserido com sucesso!";
  }
  else{
    $msg = "Algum campo está nulo ou deu problema com o banco. Me consulte ASS: Carrasco";
  }
  echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
}

if(isset($_GET['del_user'])){
  $db = new DbConnect();
  $db->open();
  $result = $db->deleteUser($_GET['del_user']);
  $db->close();

  if($result === 0){
    $msg = "Deletado com sucesso!";
  }
  else{
    $msg = "Deu ruim! Me consulte ASS: Carrasco";
  }
  echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
}

if(isset($_GET['del_post'])){
  $db = new DbConnect();
  $db->open();
  $result = $db->deletePost($_GET['del_post']);
  $db->close();

  if($result === 0){
    $msg = "Deletado com sucesso!";
  }
  else{
    $msg = "Deu ruim! Me consulte ASS: Carrasco";
  }
  echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
}

if(isset($_GET["export"])){

  $csv = "nome,email,idade,escolaridade,interesse,ip";
  $db = new DbConnect;

  $db->open();
  $result = $db->getUsers();

  if(!is_null($result)){

    while($row = mysqli_fetch_assoc($result)){
      $csv = $csv."\n".$row['user_name'].",".$row['user_email'].",".$row['user_age'].",".$row['user_schoolarship'].",".$row['user_interest'].",".$row['user_ip'];
    }
  }

  $db->close();
  echo $csv;
  return;
}

?>
<html lang="pt">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Nossa missão é entregar conteúdo de relevância e qualidade para ajudar profissionais de marketing a se manterem atualizados e contribuir para seu desenvolvimento pessoal e profissional.">
  <meta name="author" content="">

  <title>Marketing na Veia - A sua dose diária de conteúdo digital</title>

  <!-- Bootstrap Core CSS -->
  <!--<link href="lib/css/bootstrap.min.css" rel="stylesheet">-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--<link href="lib/css/bootstrap-theme.min.css" rel="stylesheet">-->
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="board.css" rel="stylesheet">
  <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
  <link rel="shortcut icon" href="../img/img_thumb.png" type="image/x-png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css"><link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" /><link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />

</head>
<body>

<div class="container"><h2>Board</h2></div>
<div id="exTab3" class="container"> 
<ul  class="nav nav-pills">
      <li class="active">
        <a  href="#leads" data-toggle="tab">Leads</a>
      </li>
      <li><a href="#post" data-toggle="tab">Post</a>
      </li>
      </li>
    </ul>

      <div class="tab-content clearfix">
        <div class="tab-pane active" id="leads">
          <h2>SHOWING THE LEADS<h2>
          <div class="span3">
          <table class="table table-striped">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Idade</th>
                <th>Escolaridade</th>
                <th>Interesse</th>
                <th>Deletar?</th>
            </tr>
            </thead>

            <tbody>
        <?php 
          $db = new DbConnect;

          $db->open();
          $result = $db->getUsers();

          if(!is_null($result)){

            while($row = mysqli_fetch_assoc($result))
              {
        ?>
            <tr>
                <td class="filterable-cell"><?php echo $row['user_name'] ?></td>
                <td class="filterable-cell"><?php echo $row['user_email'] ?></td>
                <td class="filterable-cell"><?php echo $row['user_age'] ?></td>
                <td class="filterable-cell"><?php echo $row['user_schoolarship'] ?></td>
                <td class="filterable-cell"><?php echo $row['user_interest'] ?></td>
                <td class="filterable-cell"><a href="?del_user=<?php echo $row['user_id']?>"><i class="fa fa-times-circle" style="color:red;"aria-hidden="true"></i></a></td>
            </tr>
        <?php 
              }
            }
            $db->close();
        ?>
            </tbody>
            </table>
            </div>
            <button type="button" id="csv-export" class="btn btn-default">Download CSV</button>
          </div>
          <div class="tab-pane" id="post">
            <h3>Lista dos Posts</h3>
            <div class="span3">
              <table class="table table-striped">
                <thead>
                <tr>
                    <th>Titulo Post</th>
                    <th>Autor</th>
                    <th>Deletar?</th>
                </tr>
                </thead>

                <tbody>
            <?php 
              $db = new DbConnect;

              $db->open();
              $result = $db->getPosts(1000);

              if(!is_null($result)){

                while($row = mysqli_fetch_assoc($result))
                  {
            ?>
                <tr>
                    <td class="filterable-cell"><?php echo $row['post_title'] ?></td>
                    <td class="filterable-cell"><?php echo $row['post_author'] ?></td>
                    <td class="filterable-cell"><a href="?del_post=<?php echo $row['post_id']?>"><i class="fa fa-times-circle" style="color:red;"aria-hidden="true"></i></a></td>
                </tr>
            <?php 
                  }
                }
                $db->close();
            ?>
                </tbody>
                </table>
            </div>
            <form action="index.php" id="create-post" method="POST" role="form">
              <legend>Criar novo Post</legend>
              <div class="form-group">
                <label for="">Título da Postagem</label>
                <input type="text" class="form-control" name="post_title" placeholder="" required="true">
              </div>
             <div class="form-group">
                <label for="">Subtítulo(se houver)</label>
                <input type="text" class="form-control" name="post_subtitle" placeholder="" required="true">
              </div>
             <div class="form-group">
                <label for="">Autor</label>
                <input type="text" class="form-control" name="post_author" placeholder="" required="true">
              </div>
              <div class="form-group">
                <label for="">Preview do texto (que aparece na home)</label>
                <input type="text" class="form-control" name="post_preview" placeholder="" required="true">
              </div>
              <div class="form-group">
                <textarea name="post_text" id="post_text" required="true">Escreva o texto aqui</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
  </div>  
<!-- Bootstrap Core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--<script src="lib/js/jquery-3.2.1.min.js"></script>-->
  <!--<script src="lib/js/bootstrap.min.js"></script>-->
  <script src="../js/functions.js"></script>
  <script src="board.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0//js/froala_editor.pkgd.min.js"></script>

</body>
</html>