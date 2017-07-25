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
                    <div class="col col-md-2"></div>
                    <div class="col col-md-6">
                <h1> Baixe o Ebook agora: </h1>
                <h2> GROWTH HACKING: O que é e como aplicar na minha estratégia</h2>
                </div>
            </div> 
        </header>

        <section id="cadastro-full" style="display: none;">
            <?php new RegisterForm('ebook'); ?>
                <div id="ebook-agradecimento" style="display: none; text-align:center;">
                <p>EBOOK ENVIADO PARA SEU E-MAIL!</p>
                <br>
                <p>Confira no seu e-mail o link para download do Ebook.</p>
                <br>
                <p style="font-weight:regular; font-size:12px;">Caso não veja o e-mail na sua caixa de entrada, confira se não está na caixa de spam ou promoções.</p>
                <hr style="border-width:1px; border-color:#6afac5;">

                <p>Nosso Blog diariamente tem conteúdos novos e exclusivos sobre Marketing Digital.<p>
                <p style="text-align:center;">Vai perder essa oportunidade?</p>
                
                <center><button onclick="location.href = '/';" type="button" class="btn btn-default" style="width: 100%;font-weight: bold;color: #512772;background-color: #6afac5;border-width: 0px;border-radius: 0px;height: 34px">ACESSE O BLOG</button></center>   
            </div>
        </section>
        <section id="landing-content" style="margin-top:-200px; color:#000;">
            <div class="container">
                <div class="row">
                    <div class="col col-md-2"></div>
                    <div class="col col-md-6" style="font-size:16px; color:#000;">
                        <img src="img/mockup_ebook.jpg"></img>
                        <p>
                            Growth Hacking: aprenda como encontrar e explorar brechas para o crescimento da sua empresa.
                        </p>
                        <p>Se você quer entender mais sobre os processos envolvidos para analisar e redefinir suas estratégias, aumentando seu resultado de forma rápida, baixe este material gratuitamente
                        </p>
                        <p>O Marketing na Veia é o seu novo canal para doses diárias de Marketing Digital!
                            Neste Ebook você aprenderá mais sobre:
                        </p>
                        <li>
                             Growth Hacking
                        </li>
                        <li>
                            Funil AARRR 
                        </li>
                        <li>
                             Teste e mensuração de hipóteses
                        </li>
                    </div>    
                    <div class="col col-md-4">
                        <div id="ebook-cbox" style="margin-left: 50px;">
                            <?php new RegisterForm('ebook'); ?>
                            <div id="ebook-agradecimento" style="display: none; text-align:center; color:#fff;">
                                <p style="color:#fff;">EBOOK ENVIADO PARA SEU E-MAIL!</p>
                                <br>
                                <p style="color:#fff;">Confira no seu e-mail o link para download do Ebook.</p>
                                <br>
                                <p style="color:#fff; font-weight:regular; font-size:12px;">Caso não veja o e-mail na sua caixa de entrada, confira se não está na caixa de spam ou promoções.</p>
                                <hr style="border-width:1px; border-color:#6afac5;">

                                <p style="color:#fff;">Nosso Blog diariamente tem conteúdos novos e exclusivos sobre Marketing Digital.<p>
                                <p style="text-align:center;color:#fff;">Vai perder essa oportunidade?</p>
                                
                                <center><button onclick="location.href = '/';" type="button" class="btn btn-default" style="width: 100%;font-weight: bold;color: #512772;background-color: #6afac5;border-width: 0px;border-radius: 0px;height: 34px">ACESSE O BLOG</button></center>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'footer.php' ?>
    </body>
</html>