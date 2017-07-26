<?php
include '../db_connection.php';
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
header("Content-type: text/html; charset=utf-8");
session_start();

if(isset($_POST['user_login'])){
   $db = new DbConnect();
  $db->open();
  $result = $db->authenticate($_POST['user_login'],$_POST['user_pw']);
  $db->close();
  var_dump($result);
  if($result){
    $_SESSION['logged'] = true;
    $msg = "Logado com sucesso!";
    //header('location: index.php');

  }
  else{
    $msg = "Deu ruim! Me consulte ASS: Carrasco";
  }
  echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
}
if(isset($_SESSION['logged']) && $_SESSION['logged']){
  header('location: index.php');
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

  <<form action="login.php" method="POST" role="form">
    <legend>Form title</legend>
  
    <div class="form-group">
      <label for="">Login</label>
      <input type="text" class="form-control" name="user_login" placeholder="Input field">
    </div>
    <div class="form-group">
      <label for="">Senha</label>
      <input type="password" class="form-control" name="user_pw" placeholder="Input field">
    </div>
  
    
  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>


  


  

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