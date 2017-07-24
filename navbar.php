<?php 
$homepage = "/";
$currentpage = $_SERVER['REQUEST_URI'];
$link = "http://".$_SERVER['SERVER_NAME'];
if($currentpage== "/"|| $currentpage== "/index.php") {
    $link = "";
}

?>
<!-- Navigation -->
    <nav class="navbar navbar-default transparent" style="border: 0px;">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span style="color: #6afac5;">Menu</span> <i class="fa fa-bars" style="color: #6afac5;"></i>
          </button>
          <a id="logo" class="navbar-brand" href="<?php echo $link . "/#"?>"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a href="<?php echo $link . "/#"?>">Home</a>
            </li>
            <li>
              <a href="<?php echo $link . "/#sobre"?>">Sobre</a>
            </li>
            <li>
              <a href="<?php echo $link . "/#blog-posts"?>">Blog</a>
            </li>
            <li>
              <a href="<?php echo $link . "/#contato"?>">Contato</a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
    </nav>