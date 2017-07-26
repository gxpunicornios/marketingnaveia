<!DOCTYPE html>
<?php
include '../db_connection.php';
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
header("Content-type: text/html; charset=utf-8");
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

</head>
<body>



  <h1>SHOWING THE LEADS</h1>
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
        <td class="filterable-cell"><a href="#" onclick=""><i class="fa fa-times-circle" style="color:red;"aria-hidden="true"></i></a></td>
    </tr>
<?php 
      }
    }
?>
    </tbody>
    </table>
    </div>
    
    
  
<!-- Bootstrap Core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--<script src="lib/js/jquery-3.2.1.min.js"></script>-->
  <!--<script src="lib/js/bootstrap.min.js"></script>-->
  <script src="../js/functions.js"></script>
  <script src="board.js"></script>

</body>
</html>