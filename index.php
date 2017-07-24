<!DOCTYPE html>
<?php 
include 'db_connection.php';
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

?>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Marketing na Veia</title>

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


<header class="intro-header" style="background-image: url('img/banner-lo2.jpg')">
    <?php include 'navbar.php'; ?>
    <div class="site-heading container align-items-center">
      <div>
        <h1>MARKETING<br>NA VEIA</h1>
        <hr class="meio">
        <p class ="subheading">A sua dose diária<br>de conteúdo digital</p>
      </div>
    </div>
  </header>

  <section id="cadastro">
    <div class="container">
      <div class="row">
        <div class="col col-md-4"></div>
        <div class="col col-md-4"></div>
        <div class="col col-md-4">
          <div id="cadastro-box" data-spy="affix">
            <form id="register" method="post">
              <p>Todo dia conteúdo exclusivo sobre Marketing Digital. Vai perder essa oportunidade?
                <br><span>Fique tranquilo, não vamos mandar spam</span>
              </p>
              <div class="input-group">
                <input class="form-control" type="text" name="nome" placeholder="Nome Completo" required>
              </div>
              <div class="input-group">
                <input class="form-control" type="email" name="email" placeholder="Email" required>
              </div>
              <div class="input-group">
                <input class="form-control" type="text" name="idade" placeholder="Idade" required>
              </div>
              <div class="input-group">
                <select class="form-control" name="escolaridade" required>
                  <option value="" disabled selected>Qual sua Escolaridade?</option>
                  <option value="1">Ensino Fundamental</option>
                  <option value="2">Ensino Médio</option>
                  <option value="3">Ensino Superior (cursando ou completo)</option>
                </select>
              </div>
              <span>Preencha todos os campos!</span>
              
              <input type="submit" class="form-control submit" value="Quero Receber">
              <p></p>
              <div class="alert none" style="font-size: 10px;height: 45px;padding: 10px;">
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </section>

  <section id="cadastro-full" style="display: none;">
    <form id="register" method="post">
      <p>Todo dia conteúdo exclusivo sobre Marketing Digital. Vai perder essa oportunidade?
        <br><span>Fique tranquilo, não vamos mandar spam</span>
      </p>
      <div class="input-group">
        <input class="form-control" type="text" name="nome" placeholder="Nome Completo" required>
      </div>
      <div class="input-group">
        <input class="form-control" type="email" name="email" placeholder="Email" required>
      </div>
      <div class="input-group">
        <input class="form-control" type="text" name="idade" placeholder="Idade" required>
      </div>
      <div class="input-group">
        <select class="form-control" name="escolaridade" required>
            <option value="" disabled selected>Qual sua Escolaridade?</option>
            <option value="1">Ensino Fundamental</option>
            <option value="2">Ensino Médio</option>
            <option value="3">Ensino Superior (cursando ou completo)</option>
        </select>
      </div>
      <span>Preencha todos os campos!</span>
      <input type="submit" class="form-control submit" value="Quero Receber">
      <p></p>
      <div class="alert none">
        
      </div>
    </form>
  </section>


  <section id="sobre">
    <div class="container">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <h1>Sobre</h1>
        </div>
        <div class="col-lg-2"></div>
      </div>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <p>
            Nossa missão é entregar conteúdo de relevância e qualidade para ajudar profissionais de marketing a se manterem atualizados e contribuir para seu desenvolvimento pessoal e profissional. Somos voltados ao mercado dinâmico atual, tendo como foco a importância de soft e hard skills, formar conexões entre profissionais e proporcionar um ambiente de transformação para quem está sempre em busca de evolução.
            </p>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
  </section>


  <section id="blog-posts">
    <div class="container">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <?php 
          $db = new DbConnect();
          $db->open();
          $result = $db->getPosts(10);
          if(!empty($result)){
            while($row = mysqli_fetch_assoc($result))
            {
          ?>
 
          <div class="post">
            <a href="/post.php?id=<?php echo $row['post_id']?>">
              <h1 class="titulo">
                <?php echo $row['post_title'] . " " . $row['post_subtitle']?>
              </h1>
            </a>
            <h3 class="descricao">
              <?php echo substr($row['post_description'],0,90)?>
            </h3>
            <p class="referencia">Postado por <b><?php echo $row['post_author']; ?></b> em <?php echo strftime('%A, %d de %B de %Y', strtotime($row['post_date_created'])); ?></p>
          </div>
          <hr>
          <?php    
            }
          }
          ?>
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
</section>

  <section id="contato">
    <div class="container">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <h1>Contato</h1>
        </div>
        <div class="col-lg-2"></div>
      </div>
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <form>
            <p>Quer falar conosco? Entre em contato, através do formulário abaixo!</span>
            </p>
            <div class="input-group">
              <input class="form-control" type="text" name="name" placeholder="Nome Completo">
            </div>
            <div class="input-group">
              <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="input-group">
              <input class="form-control" type="text" name="assunto" placeholder="Assunto">
            </div>
            <div class="input-group">
              <textarea class="form-control" name="text-area" placeholder="Texto" style="height: 100px;"></textarea>
            </div>

            <span>Preencha todos os campos</span>
            <input type="submit" class="form-control submit" value="Enviar">
          </form>
        </div>
        <div class="col-lg-2"></div>
      </div>
    </div>
  </section>

  <?php include 'footer.php' ?>
</body>
</html>
