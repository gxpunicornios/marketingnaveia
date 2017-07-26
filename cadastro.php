<!DOCTYPE html>
<?php
include 'db_connection.php';
include 'form-register.php';
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
header("Content-type: text/html; charset=utf-8");
?>
<html lang="pt">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Se você quer entender mais sobre os processos envolvidos para analisar e redefinir suas estratégias, aumentando seu resultado de forma rápida. Baixe este material gratuitamente.">
        <meta name="author" content="">

        <title>Marketing na Veia - Baixe seu Ebook sobre Growth Hacking agora!!!</title>

        <!-- Bootstrap Core CSS -->
        <!--<link href="lib/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--<link href="lib/css/bootstrap-theme.min.css" rel="stylesheet">-->
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

    </head>
    <?php include_once("analyticstracking.php") ?>
    <body>
        <header class="ebook-landing" style="background-image: url('img/banner_landing_lo1.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col cols-md-4"></div>
                    <div class="col cols-md-4" align="center" style="margin-bottom:50px;">
                        <img src="img/logo_mktnaveia_branco.png"></img>
                    </div>
                    <div class="col cols-md-4"></div>
                </div>
                <div class="row">
                    <div class="col col-lg-12" align="center">
                        <h1> Marketing na veia </h1>
                        <h2> A sua dose diária de conteúdo digital</h2>
                    </div>
                </div> 
        </header>

        <section id="cadastro-full" style="display:none">
            <?php new RegisterForm('cadastro'); ?>
        </section>

        <section id="cadastro">
            <div class="row">
                    <div class="col col-md-4"></div>
                    <div class="col col-md-4" align="center">
                        <div id="cadastro-cbox" style="transform: scale(1.2);">
                            <?php new RegisterForm('cadastro'); ?> 
                        </div>   
                    </div>
                </div> 
        </section>
        <?php include 'footer.php' ?>
        </body>